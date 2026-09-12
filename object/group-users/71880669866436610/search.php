<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

http_response_code(200);
header('Content-Type: application/json');

$name = isset($_GET['name']) ? trim($_GET['name']) : '';
$group = piggy_hardcoded_group();

$groups = array();
$groupName = trim($group['name']);
$needle = trim($name, '"');
if ($needle === '' || strtolower($groupName) === strtolower($needle)) {
    $groups[] = array(
        'id' => $group['id'],
        'name' => $groupName,
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
        'canDisband' => $group['canDisband']
    );
}

echo json_encode(array('groups' => $groups));