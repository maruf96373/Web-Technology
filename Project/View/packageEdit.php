<?php

if (!isset($_COOKIE['flag'])) {
    header('location: login.php');
}

require_once('../Model/packageadmin.php');
$packageId = isset($_REQUEST['packageId']) ? $_REQUEST['packageId'] : '';

$PackageEdit = packageEdit($packageId);
?>

<html>

<head>
    <title>Edit Room</title>
    <link rel="stylesheet" href="../Assets/Admin.css" />
</head>

<body id="b8">

    <fieldset id="b9">
        <img src="../Assets/logo.png" id="logo-image">
        <h3 id="b1"><u>Click & Stay</u></h3>

        <h4 id="b10">Find your next stay</h4>

        <a id="b4" href="PackageView.php">Back</a>
    </fieldset>
    <h3></h3>
    <form method="post" action="../Controller/PackageEditCheck.php">
    <?php for($i=0; $i<count($PackageEdit); $i++){?>  
            <table align="center" class="c1">


                <tr class="c1">
                    <td>Package Id:</td>
                    <td><input type="number" name="packageId" value="<?php echo $PackageEdit[$i]['packageId']; ?>" id="packageId" readonly /></td>
                </tr>
                <tr class="c1">
                    <td>Package Name:</td>

                    <td>
                        <div style="padding: 3px;">
                            <input type="text" name="packageName" value="<?php echo $PackageEdit[$i]['packageName']; ?>" onkeyup="validateName()" />
                        </div>
                    </td>
                </tr>
                <tr class="c1">
                    <td>Package Description:</td>
                    <td>
                        <div style="padding: 3px;">
                            <textarea name="packageDescription" rows="4" cols="50" onkeyup="validateDescription()"><?php echo $PackageEdit[$i]['packageDescription']; ?>"</textarea>
                        </div>
                    </td>
                </tr>

                <tr class="c1">
                    <td>Package Category:</td>
                    <td>
                        <div style="padding: 3px;">
                        <select name="packageCatagory" id="packageCatagory" onchange="validateCategory()">
                  
                                <option value="Single package" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Single package</option>
                                <option value="Couple package" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Couple package</option>
                                <option value="Family package" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Family package</option>
                                <option value="Accommodation Packages" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accomodation packages') echo 'selected="selected"'; ?>>Accommodation Packages</option>
                                <option value="Activity Packages" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Activity Packages</option>
                                <option value="Special Occasion Packages" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Special Occasion Packages</option>
                                <option value="Seasonal Packages" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Seasonal Packages</option>
                                <option value="Business Packages" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Business Packages</option>
                                <option value="Exclusive Packages" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Exclusive Packages</option>
                                <option value="Customizable Packages" <?php if ($PackageEdit[$i]['packageCatagory'] == 'Accommodation') echo 'selected="selected"'; ?>>Customizable Packages</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="c1">
                    <td>Price:</td>
                    <td>
                        <div style="padding: 3px;">
                            <input type="number" name="packagePrice" value="<?php echo $PackageEdit[$i]['packagePrice']; ?>" onkeyup="validatePrice()" />
                        </div>
                    </td>
                </tr>
              
            
                <tr class="c1">
                    <td colspan="2" style="text-align: center;">
                        <div style="padding: 15px;">
                            <button type="submit" id="b7" name="update" value="update" onclick="validateEdit()">Update</button>
                        </div>
                    </td>
                </tr>

            </table>
        <?php } ?>
    </form>

    <script>
       

        function validateName() {
            let packageName = document.getElementsByName('packageName')[0].value;
            let obj = document.getElementsByTagName('h3')[1];

            if (packageName.length < 5 || packageName.length > 30) {
                obj.innerHTML = "Package Name must be 5 to 29 characters long";
                obj.style.color = 'red';
            } else {
                obj.innerHTML = "Valid package Name";
                obj.style.color = 'black';
            }
        }

       
        function validateDescription() {
            let packageDescription = document.getElementsByName('packageDescription')[0].value;
            let obj = document.getElementsByTagName('h3')[1];

            if (packageDescription.length < 10 || packageDescription.length > 50) {
                obj.innerHTML = "Package Description must be 10 to 49 characters long";
                obj.style.color = 'red';
            } else {
                obj.innerHTML = "Valid package Description";
                obj.style.color = 'black';
            }
        }

        function validateCategory() {
            let packageCatagory = document.getElementsByName('packageCatagory')[0].value;
            let obj = document.getElementsByTagName('h3')[1];

            if (packageCatagory === "") {
                obj.innerHTML = "Please select a package category.";
                obj.style.color = 'red';
            } else {
                obj.innerHTML = "Selected package category: " + packageCatagory;
                obj.style.color = 'black';
            }
        }

        function validatePrice() {
            let packagePrice = document.getElementsByName('packagePrice')[0].value;
            let obj = document.getElementsByTagName('h3')[1];

            if (packagePrice <= 0 || packagePrice < 1000 || isNaN(packagePrice)) {
                obj.innerHTML = "Price must be greater than 0 and at least 1000 or more";
                obj.style.color = 'red';
            } else {
                obj.innerHTML = "Valid price";
                obj.style.color = 'black';
            }
        }

            function validateEdit(){
                
                
                   alert ( "are u sure u want to update it?");
            }
        
   </script>

</body>

</html>