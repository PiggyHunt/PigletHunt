<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/object/_shared.php';

http_response_code(200);
header('Content-Type: application/json');

$body = file_get_contents('php://input');
$req = json_decode($body, true);
if (!is_array($req)) {
    $req = array();
}

$roomId = isset($req['roomId']) && is_string($req['roomId']) ? $req['roomId'] : 'room_001';
$content = isset($req['content']) && is_string($req['content']) ? $req['content'] : '';
$gamerTag = '71880669866436610';

$message = array(
    'messageId' => 'msg_' . number_format(microtime(true) * 1000000, 0, '.', ''),
    'roomId' => $roomId,
    'gamerTag' => $gamerTag,
    'content' => $content,
    'censoredContent' => null,
    'timestampMillis' => microtime(true) * 1000
);

piggy_pubnub_publish($roomId, $message);

echo json_encode(array('message' => $message), JSON_NUMERIC_CHECK);