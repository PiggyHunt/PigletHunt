<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'subscribeKey' => 'demo',
    'gameNotificationChannel' => 'game-notify-demo',
    'gameGlobalNotificationChannel' => 'game-global-demo',
    'playerChannel' => 'player-demo-001',
    'playerForRealmChannel' => 'player-realm-demo',
    'customChannelPrefix' => 'custom-',
    'authenticationKey' => ''
];

echo json_encode($data);