<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    "offers" => [
      [
        "id" => "starter_pack",
        "title" => "Starter Pack",
        "currency" => "USD",
        "price" => 4.99,
        "items" => [
          [
            "id" => "gems",
            "amount" => 500
          ]
        ]
      ]
    ]
];

echo json_encode($data);