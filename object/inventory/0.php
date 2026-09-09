<?php
http_response_code(200);
header('Content-Type: application/json');

$scope = isset($_GET['scope']) ? $_GET['scope'] : '';

$data = [
    'scope' => $scope,
    'currencies' => [],
    'items' => []
];

echo json_encode($data);