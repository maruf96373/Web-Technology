<?php
if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
    exit;
}
?>

<html>
<head>
    <title>Add Package</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">
<fieldset id="b9">
    <img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
    <a id="b11" href="PackageView.php">All Packages</a>
    <a id="b4" href="FacilityView.php">Back</a>
</fieldset>

<h3 id="error-message"></h3>
<form method="post" action="../Controller/PackageAddCheck.php" enctype="multipart/form-data">
    <table align="center" class="c1">
        <tr class="c1">
            <td>Package Id:</td>
            <td><input type="number" name="packageId" id="packageId" onkeyup="validateId()"></td>
        </tr>
        <tr class="c1">
            <td>Package Name:</td>
            <td><input type="text" name="packageName" id="packageName" onkeyup="validateName()"></td>
        </tr>
        <tr class="c1">
            <td>Package Description:</td>
            <td><textarea name="packageDescription" id="packageDescription" onkeyup="validateDescription()"></textarea></td>
        </tr>
        <tr class="c1">
            <td>Package Category:</td>
            <td>
                <select name="packageCatagory" id="packageCatagory" onchange="validateCategory()">
                    <option value="">Select</option>
                    <option value="Single package">Single package</option>
                    <option value="Couple package">Couple package</option>
                    <option value="Family package">Family package</option>
                    <option value="Accommodation Packages">Accommodation Packages</option>
                        <option value="Activity Packages">Activity Packages</option>
                        <option value="Special Occasion Packages">Special Occasion Packages</option>
                        <option value="Seasonal Packages">Seasonal Packages</option>
                        <option value="Business Packages">Business Packages</option>
                        <option value="Exclusive Packages">Exclusive Packages</option>
                        <option value="Customizable Packages">Customizable Packages</option>
                </select>
            </td>
        </tr>
        <tr class="c1">
            <td>Price:</td>
            <td><input type="number" name="packagePrice" id="packagePrice" onkeyup="validatePrice()"></td>
        </tr>
        <tr class="c1">
            <td>Picture:</td>
            <td><input type="file" name="proPic" id="proPic" accept="image/*" onchange="validateFilename()"></td>
        </tr>
        <tr class="c1">
            <td colspan="2" style="text-align: center;">
                <button type="submit" id="b7">Add</button>
            </td>
        </tr>
    </table>
</form>

<script>
    
    function validateId() {
        let packageId = document.getElementById('packageId').value;
        let obj = document.getElementById('error-message');
        if (packageId === "") {
        obj.innerHTML = "Id cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
        if (packageId.length !== 3 || parseInt(packageId) <= 0) {
            obj.innerHTML = "Package Id must be 3 digits long and greater than 0";
            obj.style.color = 'red';
            return false;
        } 
        else{
    let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/PackageAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.packageId === "valid") {
              obj.innerHTML = "Id Valid";
              obj.style.color = 'black';
              return true;
            } else {
              obj.innerHTML = "This Id is already taken. Please choose a different Id";
              obj.style.color = 'red';
              return false;
            }
          }
        };
     
        xhttp.send('packageId='+packageId);
      }

  }
  

    function validateName() {
        let packageName = document.getElementById('packageName').value;
        let obj = document.getElementById('error-message');
        if (packageName === "") {
        obj.innerHTML = "Name cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
        if (packageName.length < 5 || packageName.length > 30) {
            obj.innerHTML = "Package Name must be 5 to 29 characters long";
            obj.style.color = 'red';
            return false;
        } else{
          
    let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/PackageAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.packageName === "valid") {
              obj.innerHTML = "Name Valid";
              obj.style.color = 'black';
              return true;
            } else {
              obj.innerHTML = "This Name is already taken. Please choose a different Name";
              obj.style.color = 'red';
              return false;
            }
          }
        };
     
        xhttp.send('packageName='+packageName);
      }

  }
  
    
    function validateDescription() {
        let packageDescription = document.getElementById('packageDescription').value;
        let obj = document.getElementById('error-message');
        if (packageDescription === "") {
        obj.innerHTML = "Description cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
        if (packageDescription.length < 10 || packageDescription.length > 50) {
            obj.innerHTML = "Package Description must be 10 to 49 characters long";
            obj.style.color = 'red';
            return false;
        }else{
            obj.innerHTML = "Valid Description";
            obj.style.color = 'black';
            return true;
        
  }
  
}

    function validateCategory() {
        let packageCategory = document.getElementById('packageCategory').value;
        let obj = document.getElementById('error-message');

        if (packageCategory === "") {
            obj.innerHTML = "Please select a package category.";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Valid Catagory";
            obj.style.color = 'black';
            return true;
        }
    }

    function validatePrice() {
        let packagePrice = document.getElementById('packagePrice').value;
        let obj = document.getElementById('error-message');
        if (packagePrice=== "") {
        obj.innerHTML = "Price cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
        if (packagePrice <= 0 || packagePrice < 1000) {
            obj.innerHTML = "Price must be greater than 0 and at least 1000 or more";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Valid price";
            obj.style.color = 'black';
            return true;
        }
    }

    function validateFilename() {
        let fileInput = document.getElementById('proPic');
        let obj = document.getElementById('error-message');

        if (!fileInput.files || !fileInput.files.length) {
            obj.innerHTML = "Please select a picture";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Valid picture";
            obj.style.color = 'black';
            return true;
        }
    }
</script>

</body>
</html>
