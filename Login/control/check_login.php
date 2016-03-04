<?php
require_once '../../Common/network/http.php';

$guid = $_POST['guid'];
if (empty($guid)) {
    header("Location: http://123.56.133.116/TestRobot/Login/view/login.html");
    return;
}

$json = array(
    'cmd' => 'cl_login_request',
    'guid' => $guid,
);
$post_data=json_encode($json);
$res = PostMsg(1, $post_data);

echo $res;
?>
