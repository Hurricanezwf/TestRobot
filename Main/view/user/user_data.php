<?php
require_once '../../../Common/php/check_session.php';
require_once '../../../Common/php/show_data.php';

$ssid = $_GET['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}

// send msg to get new user data
?>

<!DOCTYPE HTML>
<html>
<head>
    <link href="/TestRobot/Common/css/common.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
    <?php
        $user_data = $_SESSION['user_data'];
        ShowUserData($user_data);
    ?>
</body>
<html>
