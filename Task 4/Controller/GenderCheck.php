<?php
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
    echo "Selected gender: " . $gender;
} else {
    echo "Please select a gender.";
}
?>