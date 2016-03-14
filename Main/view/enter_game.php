<?php
require_once '../../Common/php/check_session.php';
require_once '../../Common/php/show_data.php';

$ssid = $_GET['ssid'];
if (!is_session_valid($ssid)) {
    echo "session已过期, 请重新登录!";
    exit;
}

?>

<!DOCTYPE HTML>
<html>
<head>
    <link href="/TestRobot/Common/css/common.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
    <hr><h3>USER_DATA_SUMMARY</h3>
    <?php
        $user_data = $_SESSION['user_data'];
        ShowUserData($user_data);
        /*foreach ($user_data as $key => $value) {
            $output = "<tr>";
            $output .= "<td>$key</td>";
            $output .= "<td>$value</td>";
            $output .= "</tr>";
            echo $output;
        }*/
    ?>


    <br><br><br>
    <hr><h3>ITEM_DATA_SUMMARY</h3>
    <?php
        $item_data = $_SESSION['item_data'];
        ShowItemData($item_data);
        /*foreach ($item_data as $item_single) {
            $output = "<tr>"; 
            $output .= "<td>$item_single->uid</td>";
            $output .= "<td>$item_single->tid</td>";
            $output .= "<td>$item_single->num</td>";
            $output .= "</tr>";
            echo $output;
        }*/
    ?>
    </table>
</body>
</html>
