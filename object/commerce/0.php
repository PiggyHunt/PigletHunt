<?php
http_response_code(200);
header('Content-Type: application/json');

$scope = isset($_GET['scope']) ? trim($_GET['scope']) : '';
$symbols = array_values(array_filter(array_map('trim', explode(',', $scope)), 'strlen'));
if (count($symbols) === 0) {
    $symbols = array('default_store');
}

$stores = array();
foreach ($symbols as $symbol) {
    $stores[] = array(
        'symbol' => $symbol,
        'title' => '',
        'listings' => array(),
        'secondsRemain' => 0,
        'nextDeltaSeconds' => 0
    );
}

echo json_encode(array('stores' => $stores));