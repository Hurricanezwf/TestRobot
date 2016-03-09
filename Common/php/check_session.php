<?php
function is_session_valid($ssid) {
    if (!session_id()) {
       session_start(); 
    }

    if (empty($ssid)) {
        return FALSE;
    }
    session_id($ssid);

    $user = $_SESSION['user'];
    if (empty($user)) {
        return FALSE;
    }

    return TRUE;
}
?>
