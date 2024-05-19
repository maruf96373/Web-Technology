function usernameValidate() {
    let username = document.getElementById('username').value;
    let obj = document.getElementsByTagName('p')[0];
    obj.innerHTML = "";

    if (username === "") {
      obj.innerHTML = "Username cannot be empty";
    } else {      
      if (username.length < 5) {
        obj.innerHTML = "Username must be at least 5 characters long";
        obj.style.color = 'red';
        return false;
      }

      let validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_";
      let hasValidChar = true;

      for (let i = 0; i < username.length; i++) {
        let char = username[i];
        if (validChars.indexOf(char) === -1) {
          hasValidChar = false;
          obj.innerHTML = "Username can only contain letters, numbers, and underscores";
          obj.style.color = 'red';
          return false;
          break;
        }
      }

      if (hasValidChar) {
        return true;
      } else {
        return false;
      }
    }
  }

  function passwordValidate() {
    let password = document.getElementById('password').value;
    let obj = document.getElementsByTagName('p')[0];
    obj.innerHTML = "";
    if (password === "") {
      obj.innerHTML = "Password field is empty";
      obj.style.color = 'red';
      return false;
    } else {
      if (password.length < 8) {
        obj.innerHTML = "Password must be at least 8 characters long";
        obj.style.color = 'red';
        return false;
      }

      let validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_@#*";
      let hasValidChar = true;

      for (let i = 0; i < password.length; i++) {
        let char = password[i];
        if (validChars.indexOf(char) === -1) {
          hasValidChar = false;
          obj.innerHTML = "Password can only contain letters, numbers, and underscores";
          obj.style.color = 'red';
          return false;
          break;
        }
      }

      if (hasValidChar) {
        obj.innerHTML = "Password Valid";
        obj.style.color = 'green';
        return true;
      } else {
        obj.innerHTML = "Invalid Password";
        obj.style.color = 'red';
        return false;
      }
    }
  }
