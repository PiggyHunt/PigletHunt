<?php
http_response_code(200);
header('Content-Type: application/json');

$data = [
    "ticketId" => "ticket_789",
    "status" => "waiting",
    "matchmaking" => [
      "queue" => "duel-queue",
      "players" => [0]
    ]
];

echo json_encode($data);