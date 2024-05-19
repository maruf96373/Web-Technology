<?php

 if(!isset($_COOKIE['flag'])){
     header('location: login.php');
 }
 require_once('../Model/facilityadmin.php');
 
 $facilityId = isset($_REQUEST['facilityId']) ? $_REQUEST['facilityId'] : ''; 
     
   $FacilityEdit=facilityEdit($facilityId);
   


   

    
    
 
?>
 
<html>
<head>
    <title>Edit Room</title>
    <link rel="stylesheet" href="../Assets/Admin.css"/>
</head>
<body id="b8">

<fieldset id="b9">
<img src="../Assets/logo.png" id="logo-image">
    <h3 id="b1"><u>Click & Stay</u></h3>
    <h4 id="b10">Find your next stay</h4>
    <a id="b4" href="FacilityView.php">Back</a>
</fieldset>
<h3></h3>
    <form method="post" action="../Controller/FacilityEditCheck.php" enctype="multipart/form-data">
        
           
            <table align ="center" class="c1">

            <?php for($i=0; $i<count($FacilityEdit); $i++){?>  
       
<tr class="c1">
  <td>Facility Id:</td>
  <td><input type="number"  name="facilityId" value="<?php echo $FacilityEdit[$i]['facilityId']; ?>"id="facilityId" readonly /></td>
</tr>
<tr class="c1">
  <td>Facility Name:</td>
  
  <td>
  <div style="padding: 3px;">
      <input type="text"  name="facilityName" value="<?php echo $FacilityEdit[$i]['facilityName']; ?>"id="facilityName" onkeyup="validateFacilityName()"/>
        </div>
  </td>
</tr>
<tr class="c1">
  <td>Facility Description:</td>
  <td>
    <div style="padding: 3px;">
      <textarea id="facilityDescription" name="facilityDescription" rows="4" cols="50" onkeyup="validateFacilityDescription()"><?php echo $FacilityEdit[$i]['facilityDescription']; ?></textarea>
    </div>
  </td>
</tr>

<tr class="c1">
  <td>Facility Catagory:</td>
  <td>
  <div style="padding: 3px;">
      <select  name="facilityCatagory" id="facilityCatagory" onchange="validateFacilityCategory()">
      <option value="Accommodation" <?php if ($FacilityEdit[$i]['facilityCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Accommodation</option>
                <option value="Recreation"  <?php if ($FacilityEdit[$i]['facilityCatagory'] == 'Recreation') echo 'selected="selected"'; ?>>Recreation</option>
                <option value="Dining" <?php if ($FacilityEdit[$i]['facilityCatagory'] == 'Dinning') echo 'selected="selected"'; ?>>Dining</option>
                <option value="Business"  <?php if ($FacilityEdit[$i]['facilityCatagory'] == 'Buisness') echo 'selected="selected"'; ?>>Business</option>
                <option value="Others"  <?php if ($FacilityEdit[$i]['facilityCatagory'] == 'Others') echo 'selected="selected"'; ?>>Others</option>
          
      </select>
    </div>
  </td>
</tr>
<tr class="c1">
                <td>Price:</td>
                <td>
                    <div style="padding: 3px;">
                        <input type="number" name="Fprice" value="<?php echo $FacilityEdit[$i]['Fprice']; ?>"  id="Fprice" onkeyup="validatePrice()" /> <br>
                    </div>
                </td>
            </tr>
<tr class="c1">
            <td>facility pic:</td><td>
    <input type="file" name="proPic" accept="image/*" id="proPic" onchange=" validateFilename()"  /></td>

             
           
                <img src="<?php echo $FacilityEdit[$i]['proPic']; ?>" alt="Room Picture" class="room-pic-img">
           
       
    
</tr>
            
                       
<tr class="c1">
<td colspan="2" style="text-align: center;">
                
                    <div style="padding: 15px;" >
                        <button type="submit" id="b7" name="update" value="update"onclick="validateEdit()">Update</button>
                        </div>
</td>
</tr>
</table>
                       
                    
<?php } ?>

                

    </form>
    <script>
 function validateFacilityName() {
    let facilityName = document.getElementById('facilityName').value;
    let obj = document.getElementsByTagName('h3')[1];

    if (facilityName.length < 2 || facilityName.length > 20) {
        obj.innerHTML = "Facility Name must be 2 to 20 characters long";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = "Valid facility Name";
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
    }
}

    
function validateFacilityDescription() {
    let facilityDescription = document.getElementById('facilityDescription').value;
    let obj = document.getElementsByTagName('h3')[1];

    if (facilityDescription.length < 5 || facilityDescription.length > 30) {
        obj.innerHTML = "Facility Description must be 5 to 29 characters long";
        obj.style.color = 'red';
        return false;
    } else {
        obj.innerHTML = "Valid facility Description";
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

    if (price <= 0 || price >= 500) {
        obj.innerHTML = "Price must be greater than 0 and at least 500";
        obj.style.color = 'red';
    } else {
        obj.innerHTML = "Valid Price";
        obj.style.color = 'black';
        return true;
    }
}
function validateEdit(){
    
    
       alert ( "are u sure u want to update it?");
}
</script>
</body>

</html>