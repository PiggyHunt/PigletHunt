<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/commerce/store_data.php';

http_response_code(200);
header('Content-Type: application/json');

$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'POST';
if ($method !== 'POST') {
    http_response_code(405);
    echo json_encode(array('error' => 'MethodNotAllowed'));
    return;
}

$purchaseId = isset($_GET['purchaseId']) ? $_GET['purchaseId'] : '';
if (!is_string($purchaseId) || $purchaseId === '') {
    http_response_code(400);
    echo json_encode(array('error' => 'BadRequest'));
    return;
}

$parts = explode(':', $purchaseId);
$listingSymbol = $parts[0];
$storeSymbol = isset($parts[1]) ? $parts[1] : '';

$listings = piggy_store_listings($storeSymbol);
$found = null;
foreach ($listings as $listing) {
    if ($listing['symbol'] === $listingSymbol) {
        $found = $listing;
        break;
    }
}

if ($found === null) {
    http_response_code(400);
    echo json_encode(array('error' => 'ListingNotFound'));
    return;
}

$offer = $found['offer'];
$price = $offer['price'];
if (!isset($price['type']) || $price['type'] !== 'currency') {
    http_response_code(400);
    echo json_encode(array('error' => 'PaymentRequired'));
    return;
}

$currencyId = $price['symbol'];
$amount = isset($price['amount']) ? (float)$price['amount'] : 0;

$obtainItems = isset($offer['obtainItems']) ? $offer['obtainItems'] : array();

$st = piggy_load_state();
$owned = isset($st['owned']) && is_array($st['owned']) ? $st['owned'] : array();

$balance = piggy_balance($currencyId);
if ($amount > 0 && $balance < $amount) {
    http_response_code(400);
    echo json_encode(array('error' => 'InsufficientCurrency'));
    return;
}

foreach ($obtainItems as $oi) {
    if (isset($oi['contentId']) && !in_array($oi['contentId'], $owned, true)) {
        $owned[] = $oi['contentId'];
    }
}

$currencies = isset($st['currencies']) && is_array($st['currencies']) ? $st['currencies'] : array();
if ($amount > 0) {
    $currencies[$currencyId] = $balance - $amount;
}

$st['owned'] = array_values(array_unique($owned));
$st['currencies'] = $currencies;
piggy_save_state($st);

echo '{}';