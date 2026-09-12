<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

http_response_code(200);
header('Content-Type: application/json');

$body = file_get_contents('php://input');
$req = json_decode($body, true);
if (!is_array($req)) {
    $req = array();
}

$group = piggy_hardcoded_group();
$name = isset($req['name']) && is_string($req['name']) ? $req['name'] : $group['name'];
$tag = isset($req['tag']) && is_string($req['tag']) ? $req['tag'] : $group['tag'];

echo json_encode(array(
    'group' => array(
        'id' => $group['id'],
        'name' => $name,
        'tag' => $tag
    )
));