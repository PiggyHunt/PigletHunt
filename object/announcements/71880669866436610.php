<?php
http_response_code(200);
header('Content-Type: application/json');

$uri = rtrim($_SERVER['REQUEST_URI'], '/');
$method = $_SERVER['REQUEST_METHOD'];

if (preg_match('#/(read|claim)$#', $uri)) {
    echo '{}';
    return;
}

if ($method === 'DELETE') {
    echo '{}';
    return;
}

$data = [
    'announcements' => [
        [
            'id' => 'announce_welcome',
            'channel' => '',
            'startDate' => '2026-09-12T00:00:00',
            'endDate' => '2027-09-12T00:00:00',
            'secondsRemaining' => 31536000,
            'title' => 'Welcome!',
            'summary' => 'Thanks for downloading Piglet Hunt',
            'body' => 'A little welcome present is sent to you.',
            'attachments' => [
                ['symbol' => 'currency.soft_currency', 'count' => 5000, 'type' => 'currency']
            ],
            'isRead' => false,
            'isClaimed' => false
        ]
    ]
];

echo json_encode($data);