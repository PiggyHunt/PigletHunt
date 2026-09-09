<?php
$logFile = __DIR__ . '/404.log';
$requestUri = $_SERVER['REQUEST_URI'];
$entry = "URI: $requestUri\n";
file_put_contents($logFile, $entry, FILE_APPEND);
exit();
?>