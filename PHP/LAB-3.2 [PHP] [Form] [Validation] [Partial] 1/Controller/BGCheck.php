<?php
if (isset($_POST['BG']) && !empty($_POST['BG'])) {
    $bg = $_POST['BG'];
    echo "Selected Blood Group: " . $bg;
} else {
    echo "Please select a valid Blood Group.";
}
?>