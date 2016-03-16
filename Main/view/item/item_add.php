<?php
require_once '../../../Common/php/check_session.php';

$ssid = $_GET['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/TestRobot/Common/css/banneralert.css"></link>
    <script type="text/javascript" src="../../../Common/js/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src="/TestRobot/Common/js/banneralert.min.js"></script>
</head>
<body>
    <form method="post" action="/TestRobot/Main/control/item/add_item.php">
        道具类型:
        <select id="item_tid" name="item_tid">
        <?php
            $file_path = "../../../Common/csv/item.csv";
            if (file_exists($file_path) && is_readable($file_path)) {
                $file = fopen($file_path, "rb");
                fgetcsv($file); //过滤掉csv的标题
                while (!feof($file))
                {
                    $item = fgetcsv($file);
                    if ($item) {
                        echo "<option value='$item[0]'>$item[0]</option>";
                    }
                }
                fclose($file);
            }
        ?>
        </select>

        &nbsp;&nbsp;&nbsp;添加数量:
        <input id="item_num" type="text" name="item_num" />
        <input type='hidden' name='ssid' />
        <input id="item_add" type="button" value="添加" />
    </form>
</body>

<script>
   $("#item_add").click(function(){
       var tid = $("#item_tid").val();
       var num = $("#item_num").val();
       if (num == null) {
           alert("please enter add number!"); 
       } else if (isNaN(num) || num<=0 || num > 99999) {
           alert("add number should be (0, 99999]!");
       } else {
           $("#item_num").val("");
           $.post("/TestRobot/Main/control/item/add_item.php",
                {
                    item_tid : tid,
                    item_num : num,
                    ssid     : <?php echo "\"$ssid\"";?>
                },
                function(data, status){
                    $("body").showbanner({
                        content : data,
                        position: "bottom",
                        duration: 999999999
                    }); 
                }
           );
       }
   });
</script>

</html>
