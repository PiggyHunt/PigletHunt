<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

http_response_code(200);
header('Content-Type: application/json');

$st = array();
$f = piggy_docroot() . '/state/matchmaking_match.json';
if (file_exists($f)) {
    $st = json_decode(file_get_contents($f), true);
    if (!is_array($st)) {
        $st = array();
    }
}

$matchId = isset($st['matchId']) && is_string($st['matchId']) ? $st['matchId'] : 'match_1';
$matchType = isset($st['matchType']) && is_string($st['matchType']) ? $st['matchType'] : 'Duel';
$players = isset($st['players']) && is_array($st['players']) ? $st['players'] : array('71880669866436610');
$players = array_values(array_filter(array_map('strval', $players)));

$infected = array();
$survivors = array();
if (count($players) > 0) {
    $shuffled = $players;
    shuffle($shuffled);
    $infected = array($shuffled[0]);
    $survivors = array_values(array_slice($shuffled, 1));
}

echo json_encode(array(
    'matchId' => $matchId,
    'status' => 'Running',
    'created' => date('c'),
    'matchType' => array(
        'id' => $matchType,
        'maxWaitDurationSecs' => null
    ),
    'teams' => array(
        array(
            'name' => 'Team 1',
            'players' => $infected
        ),
        array(
            'name' => 'Team 2',
            'players' => $survivors
        )
    )
));