<head>
    <title></title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>


<body id="b8">
        <fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>

 
      
</fieldset>

        <fieldset>
        <form method="post" action="../Controller/RegCheck.php" enctype="">

            <div class="c1">

                <div>
                    <h3>
                        Sign Up
                    </h3>
                </div>
    
                <div class="input-box">
                    <input type="text" id="name" name="name" value="" onkeyup="nameValidate()" placeholder="Name" />
                </div>
    
                <div class="input-box">
                    <input type="text" id="email" name="email" value="" onkeyup="emailValidate()" placeholder="Email" />
                </div>
    
    
                <div class="input-box"> 
                    <input type="text" id="username" name="username" value="" onkeyup="usernameValidate()"  placeholder="Username" />
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="password" value="" onkeyup="passwordValidate()" placeholder="Password" />
                </div>
                <div class="input-box">
                    <input type="password" id="cpassword" name="cpassword" value="" onkeyup="cpasswordValidate()" placeholder="Confirm Password" />
                </div>
                <div class="input-box dob-fields"> 
                 <input type="text" id="dd" size="2px" name="dd" value="" placeholder="dd" onkeyup="dob()" >
                  <input type="text" id="mm" size="2px" name="mm" value=""placeholder="mm"  onkeyup="dob()" > 
                   <input type="text" id="yyyy" size="4px" name="yyyy" value="" placeholder="yyyy" onkeyup="dob()" > 
                </div>
                <div class="input-box gender-options">Gender: 
                Male  <label>
     <input type="radio" id="male" name="gender" value="Male" onclick="genderValidate()" >
    </label>
    Female <label>
      <input type="radio" id="female" name="gender" value="Female" onclick="genderValidate()"> 
    </label>
    Other<label>
     <input type="radio" id="other" name="gender" value="Other" onclick="genderValidate()"> 
    </label>
</div>
       
                  <div>
                    <input type="submit" name="submit" class="submit" value="Register Now" onclick="registration()"/>
                </div>

                <div class="login-link">
                    <p>Already have an Account? <a href="Login.php" id="a">Login</a></p>
                </div>
                <div class="login-link">
                    <p></p>
                </div>

            </div>
        
        </fieldset>
    
    
    
    </form>
    <script src="../Assets/registration.js"></script>  
</body>
</html>
