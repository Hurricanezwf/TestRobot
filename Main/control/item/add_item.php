<?php
require_once '../../../Common/php/check_session.php';
require_once '../../../Common/network/http.php';
require_once '../../../Common/php/sort.php';

$ssid = $_POST['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}

$item_tid = $_POST['item_tid'];
$item_num = $_POST['item_num'];

$json = array(
    'cmd'      => 'cg_create_item_request',
    'item_tid' => $item_tid,
    'add_num'  => $item_num,    
);
$post_data = json_encode($json);
$res = PostMsg($post_data);

$dt = json_decode($res);
$reply = "";
if ($dt->reply_code > 0) {
    $reply = "add item[$item_tid] to user failed! Message:" . $dt->msg;
} else {
    $cmd = $dt->cmd;
    if ($cmd == "gc_create_item_reply") {
        $data = $dt->data;
        $reply  = "add item[$item_tid] success! \n";
        $reply .= "item_uid => $data->uid \n";
        $reply .= "item_tid => $data->tid \n";
        $reply .= "item_num => $data->num \n";

        // update item_data
        $item_data = $_SESSION['item_data'];
        $is_new_item = true;
        foreach ($item_data as $item_single) {
            if ($item_single->uid == $data->uid) {
                $item_single->num = $data->num; 
                $is_new_item = false;
                break;
            }
        }
        if ($is_new_item) {
            $item_data[] = $data;
        }
        usort($item_data, "SortItemData");
        $_SESSION['item_data'] = $item_data;
    } else {
        $reply = "invalid reply cmd[$cmd]";
    }
}

echo $reply;
?>
