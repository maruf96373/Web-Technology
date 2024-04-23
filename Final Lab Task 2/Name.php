<!DOCTYPE html>
<html>
<head>
  <title>Name</title>
</head>
<body>
  <form method="post" action="" enctype="" >
    <table>
      <tr align="left">
        <fieldset style="width: 300px;">
          <legend><b>NAME</b></legend>
          <div style="padding: 3px;">
            <input type="text" name="Name" id="name" value=""/>
            <p></p>
          </div>
          <hr>
          <div style="padding: 3px;">
            <input type="button" name="submit" value="Submit" onclick="validateName()" />
          </div>
        </fieldset>
      </tr>
    </table>
  </form>
  <script>
    function validateName() {
        let name=document.getElementById('name').value;
        let obj = document.getElementsByTagName('p')[0]; 
        if (!name.trim()) {
        obj.innerHTML = "*Name cannot be empty";
        obj.style.color = 'red';
        return false;
      }

      const words = name.split(/\s+/);
      if (words.length < 2) {
        obj.innerHTML = "*Name must contain at least two words";
        obj.style.color = 'red';
        return false;
      }

      for (const word of words) {
        const charCode = word[0].charCodeAt(0);
        if (charCode < 65 || charCode > 90 && charCode < 97 || charCode > 122) {
          obj.innerHTML = "*All words must start with a letter.";
          obj.style.color = 'red';
          return false;
        }
      }
      const allowedChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.- ';
      if (!name.split('').every(char => allowedChars.includes(char))) {
        obj.innerHTML = "*Input can only contain letters (a-z, A-Z), periods (.), dashes (-), and spaces.";
        obj.style.color = 'red';
        return false;
      }

      obj.innerHTML = "Valid name";
      obj.style.color = 'green';
      return true;
    }
  </script>
</body>
</html>
