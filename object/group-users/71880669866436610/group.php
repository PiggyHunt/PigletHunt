<?php
http_response_code(200);
header('Content-Type: application/json');

$body = file_get_contents('php://input');
$req = json_decode($body, true);

$name = (isset($req['name']) && is_string($req['name'])) ? $req['name'] : 'PIGGY-CUSTOMGAME-XXXXXX';

$data = [
  'group' => [
    'id' => 0,
    'name' => $name,
    'tag' => null
  ]
];

echo json_encode($data);