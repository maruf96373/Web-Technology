
<?php
if(!isset($_COOKIE['flag'])){
    header('location: login.php');
}
?>
<html >
<head>
    
    <title>Facility Management</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">

<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click&Stay</u></h3>
    
    <h4 id="b10">Find your next stay</h4>
  
  
                <a id="b11" href="FacilityView.php">See All Facilities</a>
                
                
                <a id="b4" href="StaffView.php">Back</a></div></b>
                
</fieldset>

<h3></h3>
<form method="post" action="../Controller/FacilityAddCheck.php"enctype="multipart/form-data" >
    <table align="center" class="c1">
        <tr class="c1">
            <td>Facility Id:</td>
            <td><input type="number" name="facilityId" id="facilityId" onkeyup="validatefacilityId()"></td>
           
        </tr>
        <tr class="c1">
            <td>Facility Name:</td>
            <td>
                <div style="padding: 3px;">
                    <input type="text" name="facilityName" id="facilityName" onkeyup="validateFacilityName()">
                </div>
            </td>
            
        </tr>
        <tr class="c1">
            <td>Facility Description:</td>
            <td>
                <div style="padding: 3px;">
                    <textarea name="facilityDescription" rows="4" cols="50" id="facilityDescription" onkeyup="validateFacilityDescription()"></textarea>
                </div>
            </td>
           
        </tr>
        <tr class="c1">
            <td>Facility Category:</td>
            <td>
                <div style="padding: 3px;">
                    <select name="facilityCatagory" id="facilityCatagory" onchange="validateFacilityCategory()">
                        <option value="">Select</option>
                        <option value="Accommodation">Accommodation</option>
                        <option value="Recreation">Recreation</option>
                        <option value="Dining">Dining</option>
                        <option value="Business">Business</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr class="c1">
                        <td>Price :</td>
                        <td>
                            <div style="padding: 3px;">
                                <input type="number" name="Fprice" id="Fprice" onkeyup="validatePrice()"/>
                            </div>
                        </td>
                     
                    </tr>
                    <tr class="c1">
    <td>Picture:</td>    
    <td>
        <div style="padding: 3px;">
            <input type="file" id="proPic" name="proPic" accept="image/*" onchange="validateFilename()" />
        </div>
        
    </td>
</tr>

                    
        <tr class="c1" >
        <td colspan="2" style="text-align: center;">
            <div style="padding: 3px;">
            <button type="submit" id="b7">Add</button></div>
            </td>
        </tr>
    </table>

   
    </form>

<script>
    function validateFacilityName() {
    let facilityName = document.getElementById('facilityName').value;
    let obj = document.getElementsByTagName('h3')[1];
    if (facilityName === "") {
        obj.innerHTML = "Name cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
    if (facilityName.length < 2 || facilityName.length > 20) {
        obj.innerHTML = "Facility Name must be 2 to 20 characters long";
        obj.style.color = 'red';
        return false;
    } else{
    let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/FacilityAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.facilityName === "valid") {
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
     
        xhttp.send('facilityName='+facilityName);
      }

  }
  

    function validatefacilityId() {
    let facilityId = document.getElementById('facilityId').value;
    let obj = document.getElementsByTagName('h3')[1];
    if (facilityId === "") {
        obj.innerHTML = "Id cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
    if (facilityId.length !== 3 || parseInt(facilityId) <= 0) {
        obj.innerHTML = "Facility Id must be 3 digits long and greater than 0";
        obj.style.color = 'red';
        return false;
    }
    else{
    let xhttp = new XMLHttpRequest();
      xhttp.open('POST', '../Controller/FacilityAddCheck.php', true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhttp.onreadystatechange = function() {
          if (xhttp.readyState === 4 && xhttp.status === 200) {
            const response = JSON.parse(xhttp.responseText);   
            if (response.facilityId === "valid") {
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
     
        xhttp.send('facilityId='+facilityId);
      }

  }
  

function validateFacilityDescription() {
    let facilityDescription = document.getElementById('facilityDescription').value;
    let obj = document.getElementsByTagName('h3')[1];
    if (facilityDescription === "") {
        obj.innerHTML = "Description cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
    if (facilityDescription.length < 5 || facilityDescription.length > 30) {
        obj.innerHTML = "Facility Description must be 5 to 29 characters long";
        obj.style.color = 'red';
        return false;
    }
    else {
        obj.innerHTML = "Valid Description";
        obj.style.color = 'black';
        return true;
    }

}

    function validateFacilityCategory() {
        let facilityCategory = document.getElementById('facilityCatagory').value;
        let obj = document.getElementsByTagName('h3')[1];

        if (facilityCategory === "") {
            obj.innerHTML = "Please select a facility category.";
            obj.style.color = 'red';
            return false;
        } else {
            obj.innerHTML = "Selected facility category: " + facilityCategory;
            obj.style.color = 'black';
            return true;
        }
    }
    function validatePrice() {
    let price = document.getElementById('Fprice').value;
    let obj = document.getElementsByTagName('h3')[1];
    if (price === "") {
        obj.innerHTML = "price cannot be empty";
        obj.style.color = 'red';
        return false;
    } 
    if (price <= 0 || price >= 500) {
        obj.innerHTML = "Price must be greater than 0 and at least 500";
        obj.style.color = 'red';
    } else {
        obj.innerHTML = "Valid Price";
        obj.style.color = 'black';
        return true;
    }
}
function validateFilename() {
    let fileInput = document.getElementById('proPic');
    let obj = document.getElementsByTagName('h3')[1];


    if (!fileInput.files || !fileInput.files.length) {
        obj.innerHTML = "Please select a picture";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = " valid picture";
        obj.style.color = 'black';
        return true; 
    }
}

</script>

</body>
</html>
