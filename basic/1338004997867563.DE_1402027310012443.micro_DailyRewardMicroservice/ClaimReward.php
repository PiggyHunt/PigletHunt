<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'DataId' => 'daily_reward_daily_2026',
    'RewardId' => '0',
    'Status' => 0
];

echo json_encode($data);