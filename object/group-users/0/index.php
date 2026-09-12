<?php
http_response_code(200);
header('Content-Type: application/json');

echo json_encode(array(
    'gamerTag' => 71880669866436610,
    'member' => array(
        'guild' => array()
    ),
    'updated' => 0
));