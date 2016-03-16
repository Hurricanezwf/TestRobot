<?php
require_once '../../Common/network/http.php';
require_once '../../Common/config/config.php';
require_once '../../Common/php/sort.php';

if (!session_id()) {
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
if ($dt->reply_code > 0) {
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3; url=$LoginURL\"><br>";
    echo "Error Message:$dt->msg<br>";
    echo "Please try again 10 seconds later<br>";
    echo "redirect to login page after 3 seconds...<br>";
} else {
    $cmd = $dt->cmd;
    if ($cmd == "gc_enter_game_reply") {
        $_SESSION['user'] = $guid;

        $data = $dt->data;
        $item_data = $data->item_data;
        usort($item_data, "SortItemData");

        $_SESSION['user_data'] = $data->user_data;
        $_SESSION['item_data'] = $item_data;
        header("Location: $MainPageURL?ssid=$ssid");
    } else {
        printf("Error: unknown cmd[%s]!<br>", $cmd);
    }
}
?>
