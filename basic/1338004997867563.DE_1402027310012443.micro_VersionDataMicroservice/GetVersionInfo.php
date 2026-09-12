<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'StoreLink' => 'https://github.com/PiggyHunt/PigletHunt',
    'ForceUpdate' => false,
    'Maintenance' => false,
    'InvalidPlatform' => false,
    'AgreementVersion' => '1.0.7',
    'MaintenanceItems' => []
];

echo json_encode($data);