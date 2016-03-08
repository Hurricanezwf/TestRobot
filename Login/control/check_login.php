<?php
require_once '../../Common/network/http.php';
require_once '../../Common/config/config.php';

$guid = $_POST['guid'];
if (empty($guid)) {
    header("Location: $LoginURL");
    return;
}

$json = array(
    'cmd' => 'cl_login_request',
    'guid' => $guid,
);
$post_data=json_encode($json);
$res = PostMsg(1, $post_data);

$dt = json_decode($res);
if (0 != $dt->reply_code) {
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3; url=$LoginURL\"><br>";
    echo "Error Message:$dt->msg<br>";
    echo "redirect to login page after 3 seconds...<br>";
} else {
    $cmd = $dt->cmd;
    if ($cmd == "gc_enter_game_reply") {
        header("Location: $MainPageURL");
    }
}
?>
