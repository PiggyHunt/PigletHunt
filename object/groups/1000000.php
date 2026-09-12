<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

http_response_code(200);
header('Content-Type: application/json');

$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';

if ($method === 'PUT' || $method === 'DELETE') {
    echo '{}';
    return;
}

$group = piggy_hardcoded_group();

echo json_encode(array(
    'id' => $group['id'],
    'name' => $group['name'],
    'tag' => $group['tag'],
    'slogan' => $group['slogan'],
    'motd' => $group['motd'],
    'enrollmentType' => $group['enrollmentType'],
    'requirement' => $group['requirement'],
    'maxSize' => $group['maxSize'],
    'members' => $group['members'],
    'subGroups' => array(),
    'clientData' => $group['clientData'],
    'created' => $group['created'],
    'freeSlots' => $group['freeSlots'],
    'canDisband' => $group['canDisband'],
    'canUpdateEnrollment' => true,
    'canUpdateMOTD' => true,
    'canUpdateSlogan' => true,
    'donations' => array()
));