<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    'Style' => 'Normal',
    'AllowDownloadStyle' => 'Normal'
];

echo json_encode($data);