<?php
require_once '../../../Common/php/check_session.php';
require_once '../../../Common/php/show_data.php';

$ssid =$_GET['ssid'];
if (!is_session_valid($ssid)) {
    header("Location: /TestRobot/Login/view/login.php");
    exit;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <link href="/TestRobot/Common/css/common.css" rel="stylesheet" type="text/css"></link>
    <link href="/TestRobot/Main/view/css/item.css" rel="stylesheet" type="text/css"></link>
    <script type="text/javascript" src="/TestRobot/Common/js/jquery-2.2.1.min.js"></script>
    <script type="text/javascript" src="/TestRobot/Common/js/banneralert.min.js"></script>
</head>
<body>
    <div class="content">
        <input id="tid_filter" type="text" placeholder="item_tid过滤" />
        <hr><h3>ITEM_DATA</h3>
        <?php
            $item_data = $_SESSION['item_data']; // it is an array
            if (empty($item_data)) {
                echo "<p>Warning: item data at session is null!</p>";
            } else {
                echo "<table>";

                echo "<tr>";
                echo "<th>item_uid</th>";
                echo "<th>item_tid</th>";
                echo "<th>item_num</th>";
                echo "<th>operation</th>";
                echo "<th>description</th>";
                echo "</tr>";

                foreach ($item_data as $item_single) {
                    $output = "<tr>";
                    $output .= "<td>$item_single->uid</td>";
                    $output .= "<td>$item_single->tid</td>";
                    $output .= "<td>$item_single->num</td>";
                    $output .= "<td><a href='#'>使用</a></td>";
                    $output .= "<td>道具描述</td>";
                    $output .= "</tr>";
                    echo $output;
                }
                echo "</table>";
            }
        ?>
    </div>

    <div class="wrapper" style="display:none">
        <div class="dialog">
            <div class="close">×</div>
            <form class="form_style" method="POST">
                item_uid:<input type="text" class="input_style" id="item_uid" readonly="readonly" /><br>
                item_tid:<input type="text" class="input_style" id="item_tid" readonly="readonly" /><br>
                消耗数量:<input type="text" class="input_style" id="consume_item_num" autofocus="autofocus" /><br>
                <input type="button" class="btn_style" id="smt" value="ok" />
            </form>
            <p class="err_msg"></p>
        </div>
    </div>

</body>

<script type="text/javascript">
$("#tid_filter").keyup(function(){
    if (event.which == 13) {//捕获Enter键
        var spec_tid = $("#tid_filter").val();
        $("tr:has(td)").each(function(){
            var content = $(this).children().get(1).innerHTML;
            if (spec_tid != "" && content != spec_tid) {
                $(this).css("display", "none");
            } else {
               $(this).css("display", ""); 
            }
        });
    }
});

$("a").click(function(){
    var td_item_num = $(this).parent().prev();
    var td_item_tid = $(td_item_num).prev();
    var td_item_uid = $(td_item_tid).prev();

    $("#item_uid").val(td_item_uid.html());
    $("#item_tid").val(td_item_tid.html());
    $("#consume_item_num").attr("placeholder", "max is "+td_item_num.html());
    $("#consume_item_num").attr("min", 1);;
    $("#consume_item_num").attr("max", td_item_num.html());;
    $("#consume_item_num").val();
    $(".err_msg").html("");
        
    $(".wrapper").css("display", "");
});


$(".close").click(function(){
    $(".wrapper").css("display", "none");
});

$("#smt").click(HandleSubmit);
$("#consume_item_num").keyup(function(){
    if (event.which == 13) {//监听Enter按键
        HandleSubmit(); 
    }
});

function HandleSubmit() {
    $(".err_msg").html("");

    var consume_num = parseInt($("#consume_item_num").val());
    var max_consume_num = $("#consume_item_num").attr("max");
    if (isNaN(consume_num) || consume_num < 1 || consume_num > max_consume_num) {
        $(".err_msg").html("consume num error!");
        return;
    }

    $("#consume_item_num").val("");
    $(".wrapper").css("display", "none");
    var item_uid = $("#item_uid").val();
    $.post("/TestRobot/Main/control/item/cost_item.php",
        {
            item_uid : item_uid,
            cost_num : consume_num,
            ssid     : <?php echo "\"$ssid\"";?>  
        },
        function(data, status){
            alert(data);
            self.location = "/TestRobot/Main/view/item/item_data.php?ssid=<?php echo $ssid; ?>";
        }
    );
}
</script>
<html>
