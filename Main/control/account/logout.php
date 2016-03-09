<?php
require_once '../../../Common/network/http.php';
require_once '../../../Common/config/config.php';
require_once '../../../Common/php/check_session.php';

$ssid = $_GET['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}

$json = array(
    'cmd' => 'ca_logout_request',
);
$post_data = json_encode($json);
$res = PostMsg($post_data);

$dt = json_decode($res);
if (0 != $dt->reply_code) {
    echo "logout failed! Error Message: $dt->msg";
} else {
    session_destroy();
    header("Location: $LoginURL");
}
?>
