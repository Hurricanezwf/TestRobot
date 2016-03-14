<?php
require_once '../../../Common/php/check_session.php';
require_once '../../../Common/network/http.php';

$ssid = $_POST['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}

$item_tid = $_POST['item_tid'];
$item_num = $_POST['item_num'];

$json = array(
    'cmd' => 'cg_create_item_request',
    'item_tid' => $item_tid,
    'add_num' => $item_num,    
);
$post_data = json_encode($json);
$res = PostMsg($post_data);

$dt = json_decode($res);
$reply = "";
if ($dt->reply_code > 0) {
    $reply = "add item[$item_tid] to user failed!";
} else {
    $cmd = $dt->cmd;
    if ($cmd == "gc_create_item_reply") {
        $data = $dt->data;
        $reply  = "add item[$item_tid] success! \n";
        $reply .= "item_uid => $data->uid \n";
        $reply .= "item_tid => $data->tid \n";
        $reply .= "item_num => $data->num \n";
    } else {
        $reply = "invalid reply cmd[$cmd]";
    }
}

echo $reply;
?>
