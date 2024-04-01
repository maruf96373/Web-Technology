<?php
if (isset($_POST['check']) && count($_POST['check']) >= 2) {
    $check = $_POST['check'];
    echo "Selected Degree: " . implode(", ", $check);
} else {
    echo "Please Select at least two degree.";
}
?>