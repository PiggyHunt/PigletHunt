<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/commerce/store_data.php';

http_response_code(200);
header('Content-Type: application/json');

$scope = isset($_GET['scope']) ? trim($_GET['scope']) : '';
$symbols = array_values(array_filter(array_map('trim', explode(',', $scope)), 'strlen'));
if (count($symbols) === 0) {
    $symbols = array_keys($STORE_DATA);
}

$stores = array();
foreach ($symbols as $symbol) {
    $stores[] = array(
        'symbol' => $symbol,
        'title' => piggy_store_title($symbol),
        'listings' => piggy_store_listings($symbol),
        'secondsRemain' => 0,
        'nextDeltaSeconds' => 0
    );
}

echo json_encode(array('stores' => $stores));