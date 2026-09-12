<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

http_response_code(200);
header('Content-Type: application/json');

$scope = isset($_GET['scope']) ? $_GET['scope'] : '';

$currencies = array();
foreach (piggy_owned_currency_ids() as $cid) {
    $currencies[] = array(
        'id' => $cid,
        'amount' => (int)piggy_balance($cid),
        'properties' => array()
    );
}

$items = array();
$k = 1;
foreach (piggy_owned_items() as $contentId) {
    $items[] = array(
        'id' => $contentId,
        'items' => array(
            array(
                'id' => (string)(50000 + $k),
                'properties' => array(),
                'createdAt' => 0,
                'updatedAt' => 0
            )
        )
    );
    $k++;
}

echo json_encode(array(
    'scope' => $scope,
    'currencies' => $currencies,
    'items' => $items
));