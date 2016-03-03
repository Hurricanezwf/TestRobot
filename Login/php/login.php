<?php
require_once '../../Common/network/http.php';

$guid = $_POST['guid'];

$json = array(
    'guid' => $guid,
    'id' => '1992',
);
$post_data=json_encode($json);
$res = PostMsg(1, $post_data);
echo $res;
?>
