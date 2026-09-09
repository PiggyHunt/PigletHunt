<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    "txid" => 987654321
];

echo json_encode($data);