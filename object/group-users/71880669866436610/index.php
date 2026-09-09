<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
  'member' => false
];

echo json_encode($data);
