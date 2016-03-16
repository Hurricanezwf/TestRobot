<?php
require_once '../../../Common/php/check_session.php';
require_once '../../../Common/network/http.php';

$ssid = $_POST['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}

$item_uid = $_POST['item_uid'];
$cost_num = $_POST['cost_num'];

$json = array(
    'cmd'      => 'cg_cost_item_request',
    'item_uid' => $item_uid,
    'cost_num' => $cost_num,
);
$post_data = json_encode($json);
$res = PostMsg($post_data);

$dt = json_decode($res);
$reply = "";
if ($dt->reply_code > 0) {
    $reply = "cost item[$item_uid] failed! Message:" . $dt->msg;
} else {
    $cmd = $dt->cmd;
    if ($cmd == "gc_cost_item_reply") {
        $data = $dt->data;
        $reply  = "cost item[$item_uid] success! \n";
        $reply .= "item_uid => $data->uid \n";
        $reply .= "item_tid => $data->tid \n";
        $reply .= "item_num => $data->num \n";

        // update item_data
        $item_data = $_SESSION['item_data'];
        foreach ($item_data as $item_single) {
            if ($item_single->uid == $data->uid) {
                $item_single->num = $data->num;
                $_SESSION['item_data'] = $item_data;
                break;
            }
        }
    }
}
echo $reply;
?>
