<?php
require_once '../../../Common/php/check_session.php';

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
</head>
<body>
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
            echo "</tr>";

            foreach ($item_data as $item_single) {
                $output = "<tr>";
                $output .= "<td>$item_single->uid</td>";
                $output .= "<td>$item_single->tid</td>";
                $output .= "<td>$item_single->num</td>";
                $output .= "</tr>";
                echo $output;
            }
            echo "</table>";
        }
    ?>
</body>
<html>
