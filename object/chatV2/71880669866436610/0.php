<?php
http_response_code(200);
header('Content-Type: application/json');

echo json_encode(array(
    'rooms' => array(
        array(
            'id' => 'room_001',
            'name' => 'General',
            'keepSubscribed' => true,
            'players' => array(71880669866436610)
        )
    )
));
