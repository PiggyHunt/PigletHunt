<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
  'id' => 71880669866436610,
  'email' => 'greedycellhelp@gmail.com',
  'language' => '',
  'scopes' => [],
  'thirdPartyAppAssociations' => []
];

echo json_encode($data);