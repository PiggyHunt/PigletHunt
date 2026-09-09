<?php
http_response_code(200);
header('Content-Type: application/json');

$scope = isset($_GET['scope']) ? $_GET['scope'] : '';

$data = [
    'scope' => $scope,
    'currencies' => [
        [ // Piggy Tokens
            'id' => 'currency.soft_currency',
            'amount' => 1000000000,
            'properties' => []
        ],
        [ // Bacon
            'id' => 'currency.hard_currency',
            'amount' => 1000000000,
            'properties' => []
        ]
    ],
    'items' => []
];

echo json_encode($data);