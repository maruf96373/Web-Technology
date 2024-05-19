<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../Assets/customerStyle.css"/>
</head>
<body id="b8">
        <fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>

 
      
</fieldset>

        <fieldset >
        <form method="post" action="../Controller/LoginCheck.php" enctype="">
            <div class="c1">

                <div>
                    <h3>Login</h3>
                </div>
                
                <div class="input-box">
                    <input type="text" id="username" name="username" placeholder="Username" onkeyup="usernameValidate()" />
                </div>

                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Password" onkeyup="passwordValidate()"/>
                </div>

                <div >
                    <a href="ForgotPassword">Forgot Password</a>
                </div>

                <div >
                    <input type="submit" class="submit" name="submit" value="Submit" />
                </div>
                
                <div class="register-link">
                    <p>Don't have an account? <a href="Registration.php">Register</a></p>
                </div>
            </div>
        </fieldset>
    </form>
    <script src="../Assets/login.js"></script>  
</body>
</html>
