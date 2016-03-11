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
<body>
    <form action="/TestRobot/Main/control/item/add_item.php" method="POST">
        道具类型:
        <select name="item_tid">
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
        <input id="item_add" type="button" value="添加" />
    </form>
</body>

<script type="text/javascript" src="../../../Common/js/jquery-2.2.1.min.js"></script>
<script>
   $("#item_add").click(function(){
       var num = $("#item_num");
       if ($("#item_num").val() == "") {
           alert("please enter add number!"); 
       } else if (isNaN(num) || num<=0 ) {
           alert("add number should be a number and over zero!");
       } else {
           $("form").submit();
       }
   });
</script>

</html>
