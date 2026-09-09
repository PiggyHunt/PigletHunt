<?php
header('Connection: close');
if (!headers_sent()) {
    header('Cache-Control: no-store');
}
ob_start(function ($buffer) {
    if ($buffer !== '' && !headers_sent()) {
        header('Content-Length: ' . strlen($buffer));
    }
    return $buffer;
});