<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $action = $data['action'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $datetime = date('Y-m-d H:i:s');
    $logEntry = "[IP: $ip]\n$datetime - Action: $action\n\n";
    
    file_put_contents('access_log.txt', $logEntry, FILE_APPEND | LOCK_EX);
    http_response_code(200);
} else {
    http_response_code(405); // Method not allowed
}
?>