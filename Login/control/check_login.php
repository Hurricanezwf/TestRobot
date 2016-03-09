<?php
require_once '../../Common/network/http.php';
require_once '../../Common/config/config.php';

if (!isset($_SESSION)) {
    session_start();
}
$ssid = $_POST['ssid'];
if (empty($ssid)) {
    header("Location: $LoginURL");
    return;
}
session_id($ssid);

$guid = $_POST['guid'];
$json = array(
    'cmd' => 'cl_login_request',
    'guid' => $guid,
);
$post_data = json_encode($json);
$res = PostMsg($post_data);

$dt = json_decode($res);
if (0 != $dt->reply_code) {
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3; url=$LoginURL\"><br>";
    echo "Error Message:$dt->msg<br>";
    echo "redirect to login page after 3 seconds...<br>";
} else {
    $cmd = $dt->cmd;
    if ($cmd == "gc_enter_game_reply") {
        header("Location: $MainPageURL?ssid=$ssid");
    }
}
?>
