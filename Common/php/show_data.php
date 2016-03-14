<?php
function ShowUserData($user_data) {
    if (empty($user_data)) {
        echo "<p>Warning: user data is null!</p>";
    } else {
        echo "<table>";
        foreach ($user_data as $key => $val) {
            $output = "<tr>";
            $output .= "<th>" . $key . "</th>";
            $output .= "<td>" . $val . "</td>";
            $output .= "</tr>";
            echo  $output;
        }
        echo "</table>";
    } 
}


function ShowItemData($item_data) {
    if (empty($item_data)) {
        echo "<p>Warning: item data is null!</p>";
    } else {
        echo "<table>";
        echo "<tr>";
        echo     "<th>item_uid</th>";
        echo     "<th>item_tid</th>";
        echo     "<th>item_num</th>";
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
}
?>
