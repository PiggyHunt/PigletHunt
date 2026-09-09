<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'Id' => 'daily_reward_daily_2026',
    'CycleDurationInSeconds' => 86400,
    'StartTime' => '2021-01-01T12:00:00Z',
    'EndTime' => '2030-12-31T23:59:59Z',
    'SoftCurrencyIcon' => '',
    'HardCurrencyIcon' => '',
    'Rewards' => [
        ['Type' => 0, 'RewardValue' => '100'],
        ['Type' => 0, 'RewardValue' => '200'],
        ['Type' => 1, 'RewardValue' => '50'],
        ['Type' => 0, 'RewardValue' => '300'],
        ['Type' => 1, 'RewardValue' => '75'],
        ['Type' => 0, 'RewardValue' => '500'],
        ['Type' => 2, 'RewardValue' => 'Legendary Chest']
    ],
    'Ads' => [
        ['Type' => 0, 'RewardValue' => '50'],
        ['Type' => 0, 'RewardValue' => '50']
    ]
];

echo json_encode($data);