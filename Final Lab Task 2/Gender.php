
<html>
<head>
  <title>Gender Selection</title>
</head>
<body>
<form method="post" action="" enctype="" id="genderForm">
  <fieldset style="width: 300;">
  <legend><b>GENDER</b></legend>
 Male
    <input type="radio" name="gender" id="male" value="male">
    Female
    <input type="radio" name="gender" id="female" value="female">
    <br>
    <input type="button" value="Submit" onclick="checkGenderSelection()">
</fieldset >
  </form>
  <p id="result"></p>
  <script>
    function checkGenderSelection() {
      const genderForm = document.getElementById('genderForm');
      const genderElements = genderForm.elements['gender']; 

   
      let selected = false;
      for (let i = 0; i < genderElements.length; i++) {
        if (genderElements[i].checked) {
          selected = true;
          break; 
        }
      }

      const resultElement = document.getElementById('result');

      if (selected) {
        const selectedGender = genderElements.value;
        resultElement.textContent = "Selected gender: " + selectedGender;
      } else {
        resultElement.textContent = "Please select a gender.";
      }
    }
  </script>
</body>
</html>
