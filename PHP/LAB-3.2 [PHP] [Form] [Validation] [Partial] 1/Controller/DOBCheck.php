<?php

$dd = $_REQUEST['dd'];
$mm = $_REQUEST['mm'];
$yyyy = $_REQUEST['yyyy'];
if (empty($dd) || empty($mm) || empty($yyyy)) {
  echo "Date is invalid: Please fill in all fields.";
} else {
  if (!is_numeric($dd) || !is_numeric($mm) || !is_numeric($yyyy)) {
    echo "Date is invalid: Please enter numbers for day, month, and year.";
  } else {
    $dd = intval($dd);
    $mm = intval($mm);
    $yyyy = intval($yyyy);

    if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yyyy < 1953 || $yyyy > 1998) {
      echo "Date is invalid: Values are outside the allowed ranges.";
    } else {
      $maxDays = 31;
      if ($mm == 4 || $mm == 6 || $mm == 9 || $mm == 11) {
        $maxDays = 30;
      } else if ($mm == 2) {
        $maxDays = 28;
        if ($yyyy % 4 == 0 && ($yyyy % 100 != 0 || $yyyy % 400 == 0)) {
          $maxDays = 29;
        }
      }

      if ($dd > $maxDays) {
        echo "Date is invalid: Day is not valid for the selected month.";
      } else {
        echo "Date is valid!";
      }
    }
  }
}

?>
