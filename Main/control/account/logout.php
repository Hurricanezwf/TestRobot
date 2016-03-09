<?php
require_once '../../../Common/network/http.php';
require_once '../../../Common/config/config.php';

if (!isset($_SESSION)) {
    session_start();
}
$ssid = $_GET['ssid'];
if (empty($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    return;
}

$user = $_SESSION['user'];
if (empty($user)) {
    echo "<script>alert('user not login')</script>";
    header("Location: /TestRobot/Login/view/login.php");
    return;
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
