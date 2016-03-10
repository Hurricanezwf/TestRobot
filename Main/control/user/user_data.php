<?php
if (!session_id()) {
    session_start();
}

$user_data = $_SESSION['user_data'];
if (empty($user_data)) {
    echo "<p>Warning: user data at session is null!</p>";
    return;
} else {
    foreach ($user_data as $key=>$value) {
        echo $key . "=>" . $value . "<br>";
    }
}

?>
