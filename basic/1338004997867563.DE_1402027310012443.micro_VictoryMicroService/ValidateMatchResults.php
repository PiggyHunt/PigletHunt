<?php
http_response_code(200);
header('Content-Type: application/json');

$body = json_decode(file_get_contents('php://input'), true);
if (!is_array($body)) {
    $body = array();
}
$payload = isset($body['payload']) ? $body['payload'] : '';

$room = null;
$decoded = json_decode((string)$payload, true);
if (is_array($decoded)) {
    $room = isset($decoded[0]) ? $decoded[0] : $decoded;
}

$players = array();
if (is_array($room)
    && isset($room['State']['CustomProperties']['players'])
    && is_array($room['State']['CustomProperties']['players'])) {
    $players = $room['State']['CustomProperties']['players'];
}

$chunks = array();
foreach ($players as $p) {
    if (!is_array($p) || !isset($p['beamableId'])) {
        continue;
    }
    $bid = trim((string)$p['beamableId']);
    if ($bid === '' || !ctype_digit($bid)) {
        continue;
    }
    $chunks[] = '{"Bid":' . $bid . ',"SoftCurrency":100,"HardCurrency":0}';
}

if (empty($chunks)) {
    $chunks[] = '{"Bid":71880669866436610,"SoftCurrency":100,"HardCurrency":100}';
}

echo '{"PlayerRewards":[' . implode(',', $chunks) . ']}';