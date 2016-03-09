<!--?php
if (!session_id()) {
    session_start();
}

$ssid = session_id();
?-->
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">

    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"></link>
    <script type="text/javascript" src="../../Common/js/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</head>

<body>
    <div class="top_div"></div>
    <div class="middle_div">
        <div class="image">
            <div class="tou"></div>
            <div class="left_hand"></div>
            <div class="right_hand"></div>
        </div>
        <form action="../control/check_login.php" method="POST">
            <p class="account">
                <span class="account_logo"></span>
                <input class="ipt" type="text" id="guid" placeholder="请输入账号" name="guid" />
            </p>
            <p style="position: relative;">
                <span class="passwd_logo"></span> 
                <input class="ipt" id="passwd" type="password" placeholder="无需输入密码" name="passwd" />
            </p>
            <!--?php echo "<input type='hidden' name='ssid' value='$ssid' />"; ?-->
            <input class="sbm" type="button" id="login" value="login" />
        </form>
    </div>
    <div class="bottom_div"></div>
    <div class="footer">
        <p style="font-family:Comic Sans MS">BY HURRICANEZWF</p>
    </div>
</body>
</html>
