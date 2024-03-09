<?php

$email = $_REQUEST['Email'];

if ($email == "") {
    echo "Email Address Cannot be Empty";
} else {
    $isValid = true;
    $atPos = strpos($email, "@");

    if ($atPos === false || $atPos === 0 || $atPos === strlen($email) - 1) {
        $isValid = false;
        echo "Email must contain '@' symbol not at the beginning or end.";
    } else {
        $username = substr($email, 0, $atPos);
        $domain = strtolower(substr($email, $atPos + 1)); // Convert to lowercase for case-insensitive comparison

        if (!ctype_alnum($username) || ctype_digit($username[0])) {
            $isValid = false;
            echo "Username can only contain letters, numbers, and must start with a letter.";
        }

        $allowedDomainChars = 'abcdefghijklmnopqrstuvwxyz0123456789.-';

        for ($i = 0; $i < strlen($domain); $i++) {
            $char = $domain[$i];

            if (strpos($allowedDomainChars, $char) === false) {
                $isValid = false;
                echo "Domain must follow a-z, 0-9, -, and . format.";
                break;
            }
        }

        $lastDotPos = strrpos($domain, ".");
        $topLevelDomain = substr($domain, $lastDotPos + 1);

        $commonEmailProviders = ['com', 'net', 'org', 'gov', 'edu'];
        $commonOrgProviders = ['gmail', 'yahoo'];
    
        $domainWithoutTLD = substr($domain, 0, $lastDotPos);

        if ($lastDotPos === false || $lastDotPos < 2 || $lastDotPos === strlen($domain) - 1 || !ctype_alpha($topLevelDomain) || strlen($topLevelDomain) < 2 || !in_array($topLevelDomain, $commonEmailProviders) || !in_array($domainWithoutTLD, $commonOrgProviders)) {
            $isValid = false;
            echo "Domain must follow a-z, 0-9, -, and . format with a valid top-level domain.";
        }
    }

    if ($isValid) {
        echo "Valid Email Address";
    }
}
?>
