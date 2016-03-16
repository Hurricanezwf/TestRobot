<?php
function SortItemData($a, $b) {
    if ($a->tid == $b->tid) {
        return 0;
    }

    return ($a->tid > $b->tid) ? 1:-1;
}
?>
