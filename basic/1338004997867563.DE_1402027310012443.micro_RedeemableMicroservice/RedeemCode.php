<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'Status' => 0,
    'contentId' => [],
    'listingId' => [],
    'tokens' => [],
    'bacons' => []
];

echo json_encode($data);