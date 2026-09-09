<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    "id" => "manifest_001",
    "replacement" => false,
    "manifest" => [
      [
        "key" => "save_slot_1",
        "version" => 7,
        "checksum" => "2d4c2ab9ff...",
        "path" => "/saves/save_slot_1.json"
      ],
      [
        "key" => "profile",
        "version" => 12,
        "checksum" => "5de84fb1aa...",
        "path" => "/profiles/profile.json"
      ]
    ]
];

echo json_encode($data);