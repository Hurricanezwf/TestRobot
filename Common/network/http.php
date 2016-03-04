<?php
$TargetURL = "http://123.56.133.116:29999";

function PostMsg($cmd, $post_data) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $GLOBALS['TargetURL']);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);

    $data = curl_exec($curl);
    if (curl_errno($curl)) {
        $data = curl_error($curl);
    }
    curl_close($curl);

    return $data;
}

?>
