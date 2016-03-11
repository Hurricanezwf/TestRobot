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
        $item_data = $_SESSION['item_data'];
        if (empty($item_data)) {
            echo "<p>Warning: item data at session is null!</p>";
        } else {
            echo "<table>";
            foreach ($item_data as $key => $val) {
                $output = "<tr>";
                $output .= "<th>" . $key . "</th>";
                $output .= "<td>" . $val . "</td>";
                $output .= "</tr>";
                echo $output;
            }
            echo "</table>";
        }
    ?>
</body>
<html>
