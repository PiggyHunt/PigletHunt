<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    "success" => true,
    "timestamp" => 1723468800
];

echo json_encode($data);