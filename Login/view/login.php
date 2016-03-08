 <!DOCTYPE HTML>
 <html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">

    <title>login</title>
    <script type="text/javascript" src="../../Common/js/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</head>

<body>
    <p>登陆</p>
    <form action="../control/check_login.php" method="POST">
        ID:<input type="text" id="guid" name="guid" />
        <input type="button" id="login" value="login" />
    </form>
</body>
</html>
