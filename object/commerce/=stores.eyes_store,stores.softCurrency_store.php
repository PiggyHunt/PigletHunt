<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/commerce/store_data.php';

http_response_code(200);
header('Content-Type: application/json');

$script = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['PHP_SELF'];
$name = basename($script);
$name = preg_replace('/\.php$/i', '', $name);
$name = ltrim($name, '=');
$symbols = array_values(array_filter(array_map('trim', explode(',', $name)), 'strlen'));

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
