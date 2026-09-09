<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'subscribeKey' => 'sub-c-3ae5cf75-8ff9-4317-93dd-a4c5bc5d29b2',
    'gameNotificationChannel' => 'game-notify-DE_1402027310012443',
    'gameGlobalNotificationChannel' => 'game-global-DE_1402027310012443',
    'playerChannel' => 'player-71880669866436610',
    'playerForRealmChannel' => 'realm-DE_1402027310012443',
    'customChannelPrefix' => 'custom-',
    'authenticationKey' => 'sec-c-NTUzYTcxZjAtZjg2OS00MjgyLThkMGUtZTQ4Y2E4ZjE3OGE2'
];

echo json_encode($data);