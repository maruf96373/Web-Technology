<?php
$name = $_REQUEST['Name'];

if ($name == "") {
    echo "Name cannot be empty";
} else {
    $words = explode(" ", $name);

    function hasAtLeastTwoWords($words) {
        return (count($words) >= 2);
    }

    function startLetter($words) {
        foreach ($words as $word) {
            if (!ctype_alpha($word[0])) {
                return false;
            }
        }
        return true;
    }

    function validChar($words) {
        foreach ($words as $word) {
            for ($i = 0; $i < strlen($word); $i++) {
                $char = $word[$i];
                if (!ctype_alpha($char) && $char !== '.' && $char !== '-') {
                    return false;
                }
            }
        }
        return true;
    }

    if (!hasAtLeastTwoWords($words)) {
        echo "Name must contain at least two words";
    } elseif (!startLetter($words)) {
        echo "All words must start with a letter.";
    } elseif (!validChar($words)) {
        echo "Input can only contain letters (a-z, A-Z), periods (.), and dashes (-).";
    } else {
        echo "Valid name";
    }
}
?>
