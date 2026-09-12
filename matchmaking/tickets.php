<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
$stateFile = piggy_docroot() . '/state/matchmaking_match.json';

if ($method === 'DELETE') {
    $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    $ticketId = '';
    if (preg_match('#/tickets/([^/]+)$#', $uri, $m)) {
        $ticketId = urldecode($m[1]);
    }
    $st = array();
    if (file_exists($stateFile)) {
        $j = json_decode(file_get_contents($stateFile), true);
        if (is_array($j)) {
            $st = $j;
        }
    }
    $pool = isset($st['pool']) && is_array($st['pool']) ? $st['pool'] : array();
    if ($ticketId !== '') {
        $pool = array_values(array_filter($pool, function ($t) use ($ticketId) {
            return !(isset($t['ticketId']) && $t['ticketId'] === $ticketId);
        }));
    }
    $st['pool'] = $pool;
    @file_put_contents($stateFile, json_encode($st));
    http_response_code(200);
    header('Content-Type: application/json');
    echo '{}';
    exit;
}

$payload = json_decode(file_get_contents('php://input'), true);
if (!is_array($payload)) {
    $payload = array();
}

$players = isset($payload['players']) && is_array($payload['players'])
    ? array_values(array_filter(array_map('strval', $payload['players'])))
    : array('71880669866436610');
$matchTypes = isset($payload['matchTypes']) && is_array($payload['matchTypes'])
    ? array_values(array_filter(array_map('strval', $payload['matchTypes'])))
    : array('Duel');
$maxWait = isset($payload['maxWaitDurationSecs']) && is_numeric($payload['maxWaitDurationSecs'])
    ? (int)$payload['maxWaitDurationSecs'] : 300;
if ($maxWait <= 0) {
    $maxWait = 300;
}

$playerId = count($players) > 0 ? $players[0] : '71880669866436610';
$matchType = count($matchTypes) > 0 ? $matchTypes[0] : 'Duel';
$maxPlayers = 6;

$st = array();
if (file_exists($stateFile)) {
    $j = json_decode(file_get_contents($stateFile), true);
    if (is_array($j)) {
        $st = $j;
    }
}

if (isset($st['matchId']) && $st['matchId'] !== null && $st['matchId'] !== '') {
    $st = array('pool' => array());
}

$pool = isset($st['pool']) && is_array($st['pool']) ? $st['pool'] : array();
$found = false;
foreach ($pool as $t) {
    if (isset($t['playerId']) && $t['playerId'] === $playerId) {
        $found = true;
        break;
    }
}
$thisTicketId = 'ticket_' . number_format(microtime(true) * 10000000, 0, '.', '');
if (!$found) {
    $pool[] = array(
        'ticketId' => $thisTicketId,
        'playerId' => $playerId,
        'matchType' => $matchType
    );
}

$distinct = array();
foreach ($pool as $t) {
    if (isset($t['playerId']) && !in_array($t['playerId'], $distinct, true)) {
        $distinct[] = $t['playerId'];
    }
}
$distinct = array_slice($distinct, 0, $maxPlayers);
$count = count($distinct);
$ready = $count >= 2;//true;

if ($ready) {
    $st['matchId'] = 'match_' . number_format(microtime(true) * 10000000, 0, '.', '');
    $st['matchType'] = $matchType;
    $st['players'] = $distinct;
}
$st['pool'] = $pool;
@file_put_contents($stateFile, json_encode($st));

$created = time();
$expires = $created + $maxWait;
$ticket = array(
    'ticketId' => $thisTicketId,
    'status' => $ready ? 'Ready' : 'Searching',
    'created' => date('c', $created),
    'expires' => date('c', $expires),
    'players' => $distinct,
    'matchType' => $matchType,
    'matchId' => $ready ? $st['matchId'] : null
);

if ($ready) {
    $readyTicket = $ticket;
    $readyTicket['status'] = 'Ready';
    $context = 'matchmaking.update.' . $matchType;
    $envelope = array('context' => $context, 'messageFull' => json_encode($readyTicket));
    foreach (array('game-notify-demo', 'game-global-demo', 'player-demo-001', 'player-realm-demo') as $ch) {
        piggy_pubnub_publish($ch, $envelope);
    }
}

http_response_code(200);
header('Content-Type: application/json');
echo json_encode(array('tickets' => array($ticket)));