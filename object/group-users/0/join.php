<?php
http_response_code(200);
header('Content-Type: application/json');

$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'POST';

echo json_encode(array(
    'member' => ($method === 'POST')
));