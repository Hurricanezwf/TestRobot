<?php
require_once '../../../Common/network/http.php';
require_once '../../../Common/config/config.php';

$json = array(
    'cmd' => 'ca_logout_request',
);
$post_data = json_encode($json);
$res = PostMsg($post_data);

$dt = json_decode($res);
if (0 != $dt->reply_code) {
    echo "logout failed! Error Message: $dt->msg";
} else {
    header("Location: $LoginURL");
}
?>
