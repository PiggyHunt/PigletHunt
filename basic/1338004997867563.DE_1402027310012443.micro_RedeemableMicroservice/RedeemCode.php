<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/commerce/store_data.php';

http_response_code(200);
header('Content-Type: application/json');

$body = json_decode(file_get_contents('php://input'), true);
if (!is_array($body)) {
    $body = array();
}
$code = isset($body['code']) ? (string)$body['code'] : (isset($_POST['code']) ? (string)$_POST['code'] : (isset($_GET['code']) ? (string)$_GET['code'] : ''));
if ($code === '') {
    $code = 'DEBUG' . random_int(1000, 9999);
}

$st = piggy_load_state();
$owned = isset($st['owned']) && is_array($st['owned']) ? $st['owned'] : array();
$currencies = isset($st['currencies']) && is_array($st['currencies']) ? $st['currencies'] : array();

$soft = 5000;
$hard = 500;
foreach (array('currency.soft_currency', 'currency.hard_currency') as $cid) {
    if (!isset($currencies[$cid])) {
        $currencies[$cid] = piggy_default_balance($cid);
    }
}
$currencies['currency.soft_currency'] += $soft;
$currencies['currency.hard_currency'] += $hard;

$candidates = array();
global $STORE_DATA;
if (is_array($STORE_DATA)) {
    foreach ($STORE_DATA as $store) {
        if (!isset($store['listings']) || !is_array($store['listings'])) {
            continue;
        }
        foreach ($store['listings'] as $listing) {
            if (!isset($listing['offer']['obtainItems']) || !is_array($listing['offer']['obtainItems'])) {
                continue;
            }
            foreach ($listing['offer']['obtainItems'] as $ob) {
                if (isset($ob['contentId']) && $ob['contentId'] !== '') {
                    $candidates[] = $ob['contentId'];
                }
            }
        }
    }
}
$candidates = array_values(array_unique(array_filter($candidates)));
$already = array_merge(piggy_baseline_items(), $owned);
$free = array_values(array_diff($candidates, $already));

$grantedItem = '';
if (count($free) > 0) {
    $grantedItem = $free[random_int(0, count($free) - 1)];
    $owned[] = $grantedItem;
    $owned = array_values(array_unique($owned));
}

$st['owned'] = $owned;
$st['currencies'] = $currencies;
$st['redeemed'] = isset($st['redeemed']) && is_array($st['redeemed']) ? $st['redeemed'] : array();
$st['redeemed'][] = array('code' => $code, 'item' => $grantedItem, 'soft' => $soft, 'hard' => $hard, 'ts' => time());
piggy_save_state($st);

$data = array(
    'Status' => 0,
    'contentId' => $grantedItem !== '' ? array(array('value' => $grantedItem, 'status' => 0)) : array(),
    'listingId' => array(),
    'tokens' => array(array('value' => $soft, 'status' => 0)),
    'bacons' => array(array('value' => $hard, 'status' => 0))
);

echo json_encode($data);