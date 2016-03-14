<?php
require_once '../../Common/php/check_session.php';

$ssid = $_GET['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">

    <title>主界面</title>
    <link href="css/main.css" rel="stylesheet" type="text/css"></link>
    <script type="text/javascript" src="../../Common/js/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".data_show").attr("src", "/TestRobot/Main/view/enter_game.php?ssid=<?php echo $ssid; ?>");
        $("#query_user_data").click(function(){
            var url = "/TestRobot/Main/view/user/user_data.php?ssid=<?php echo $ssid; ?>"; 
            $(".data_show").attr("src", url);
        });

        $("#query_item_data").click(function(){
            var url = "/TestRobot/Main/view/item/item_data.php?ssid=<?php echo $ssid; ?>";
            $(".data_show").attr("src", url);
        });

        $("#add_item").click(function(){
            var url = "/TestRobot/Main/view/item/item_add.php?ssid=<?php echo $ssid; ?>";
            $(".data_show").attr("src", url);
        });
    });
</script>

</head>

<body id="bg">
<div class="container">

	<div class="leftsidebar_box">
		<div class="line"></div>
		<dl class="system_log">
			<dt>用户模块<img src="images/left/select_xl01.png"></dt>
			<dd><a id="query_user_data" href="#">查看用户信息</a></dd>
		</dl>
	
		<dl class="custom">
			<dt>道具模块<img src="images/left/select_xl01.png"></dt>
			<dd><a id="query_item_data" href="#">查看道具</a></dd>
            <dd><a id="add_item" href="#">添加道具</a></dd>
		</dl>
	
		<dl class="channel">
			<dt>渠道管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="#">渠道主页</a></dd>
			<dd><a href="#">渠道标准管理</a></dd>
			<dd><a href="#">系统通知</a></dd>
			<dd><a href="#">渠道商管理</a></dd>
			<dd><a href="#">渠道商链接</a></dd>
		</dl>
	
		<dl class="app">
			<dt>APP管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="#">App运营商管理</a></dd>
			<dd><a href="#">开放接口管理</a></dd>
			<dd><a href="#">接口类型管理</a></dd>
		</dl>
	
		<dl class="cloud">
			<dt>大数据云平台<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="#">平台运营商管理</a></dd>
		</dl>
	
		<dl class="syetem_management">
			<dt>系统管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="#">后台用户管理</a></dd>
			<dd><a href="#">角色管理</a></dd>
			<dd><a href="#">客户类型管理</a></dd>
			<dd><a href="#">栏目管理</a></dd>
			<dd><a href="#">微官网模板组管理</a></dd>
			<dd><a href="#">商城模板管理</a></dd>
			<dd><a href="#">微功能管理</a></dd>
			<dd><a href="#">修改用户密码</a></dd>
		</dl>
	
		<dl class="source">
			<dt>素材库管理<img src="images/left/select_xl01.png"></dt>
			<dd class="first_dd"><a href="#">图片库</a></dd>
			<dd><a href="#">链接库</a></dd>
			<dd><a href="#">推广管理</a></dd>
		</dl>
	
        <dl class="account">
			<dt>账号管理<img src="images/left/select_xl01.png"></dt>
            <dd class="first_dd">
                <?php echo "<a href='/TestRobot/Main/control/account/logout.php?ssid=$ssid'>退出登录</a>";?>
            </dd>
		</dl>
	
	</div>

    <div class="middle_content">
        <iframe class='data_show' src=''></iframe>
    </div>

</div>
</body>

</html>
