<?php
http_response_code(200);
header('Content-Type: application/json');

$body = file_get_contents('php://input');
$req = json_decode($body, true);

$roomId = (isset($req['roomId']) && is_string($req['roomId'])) ? $req['roomId'] : 'room_001';
$content = (isset($req['content']) && is_string($req['content'])) ? $req['content'] : '';
$gamerTag = 0;

$message = [
  'messageId' => 'msg_' . time(),
  'roomId' => $roomId,
  'gamerTag' => $gamerTag,
  'content' => $content,
  'censoredContent' => null,
  'timestampMillis' => microtime(true) * 1000
];

echo json_encode(['message' => $message]);