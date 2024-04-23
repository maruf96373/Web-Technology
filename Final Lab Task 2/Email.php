<html>
<head>
    <title>Email</title>
</head>
<body>
    <form method="" action="" enctype="">
        <Table>
            <tr align="left">
                <fieldset style="width: 300;">
                    <legend><b>EMAIL</b></legend>
                    <div style="padding: 3px;">
                        <input type="Email" name="Email" id="email" value="" />
                    </div>
                    <p id="email-validation"></p>
                    <hr>
                    <div style="padding: 3px;">
                        <input type="button" name="submit" value="Submit" onclick="validateEmail()" />
                    </div>
                </fieldset>
            </tr>
        </Table>
    </form>
    <script>
        function validateEmail() {
    let email = document.getElementById('email').value;
    let obj = document.getElementById('email-validation');
    obj.innerHTML = "";

    if (email === "") {
        obj.innerHTML = "*Email Address Cannot be Empty";
        obj.style.color = 'red';
        return false;
    }

    const atPos = email.indexOf("@");
    if (atPos === -1 || atPos === 0 || atPos === email.length - 1) {
        obj.innerHTML = "*Email must contain '@' symbol not at the beginning or end.";
        obj.style.color = 'red';
        return false;
    }

    const username = email.substring(0, atPos);
    const domain = email.toLowerCase().substring(atPos + 1);

    if (username.length === 0 || !isUsernameValid(username)) {
        obj.innerHTML = "Username can only contain letters, numbers, and must start with a letter.";
        obj.style.color = 'red';
        return false;
    }

    function isUsernameValid(username) {
        const firstChar = username.charAt(0);
        if (isNaN(firstChar * 1)) {
            const validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            for (let i = 1; i < username.length; i++) {
                const char = username.charAt(i);
                if (!validChars.includes(char)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }

    if (domain !== "gmail.com" && domain !== "yahoo.com") {
        obj.innerHTML = "Only Gmail and Yahoo email addresses are allowed.";
        obj.style.color = 'red';
        return false;
    }

    obj.innerHTML = "Valid Email Address";
    obj.style.color = 'green';
    return true;
}

    </script>
</body>
</html>