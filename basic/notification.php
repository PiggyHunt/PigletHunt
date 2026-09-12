<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

$data = [
    'subscribeKey' => 'sub-c-3ae5cf75-8ff9-4317-93dd-a4c5bc5d29b2',
    'gameNotificationChannel' => 'game-notify-demo',
    'gameGlobalNotificationChannel' => 'game-global-demo',
    'playerChannel' => 'player-demo-001',
    'playerForRealmChannel' => 'player-realm-demo',
    'customChannelPrefix' => 'custom-',
    'authenticationKey' => 'sec-c-NTUzYTcxZjAtZjg2OS00MjgyLThkMGUtZTQ4Y2E4ZjE3OGE2'
];

piggy_pubnub_grant(array($data['gameNotificationChannel'], $data['gameGlobalNotificationChannel'], $data['playerChannel'], $data['playerForRealmChannel'], 'room_001'), true);

http_response_code(200);
header('Content-Type: application/json');

echo json_encode($data);