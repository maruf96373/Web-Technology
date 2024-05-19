<?php
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}

?>
<html>
<head>
    <title>Staff Management - Search</title>
   
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">

<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
     <a id="b4"href="StaffView.php">Back</a></div>
         <a id="b11" href="AdminHome.php">Home</a></div>
</fieldset>

<fieldset id="b14" >
<h3></h3>
<form method="post" action="StaffSearchView.php">
    
        
        <form method="get" action="../Controller/StaffsearchCheck.php">
        <table border=0  cellspacing=0 align="center" class="c1">


            <label class="c1" for="staffId">Staff ID:</label>
            <input type="text" id="staffId" name="staffId"id="staffId" onkeyup="validateId()">
            <button type="submit">Search</button> </div>
</table>
</fieldset>        
   
        </form>
        <script>
   function validateId() {
    let staffId = document.getElementById('staffId').value;
    let obj = document.getElementsByTagName('h3')[1];

    if (staffId.length !== 2 || parseInt(staffId) <= 0) {
        obj.innerHTML = "Staff Id must be 2 digits long and greater than 0";
        obj.style.color = 'red';
    } else {
        obj.innerHTML = "Valid id";
        obj.style.color = 'black';
    }
}
</script>   
</body>
</html>
