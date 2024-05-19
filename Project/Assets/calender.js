function IdCheck() {
    let sid = document.getElementById('sid').value;
    let obj = document.getElementsByTagName('p')[0];
    obj.innerHTML = "";

    if (!sid) {
        obj.innerHTML = "Guest ID cannot be empty";
        obj.style.color = 'red';
        return false;
    }

    if (sid.length !== 6) {
        obj.innerHTML = "Invalid Guest ID format. It must be 6 characters long";
        obj.style.color = 'red';
        return false;
    }

    let numericPart = sid.substring(0);
    if (!numericPart.match(/^\d+$/)) {
        obj.innerHTML = "Invalid Guest ID format. It must contain only digits";
        obj.style.color = 'red';
        return false;
    }

    function Ajax(sid){
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../Controller/AddCalCheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('sid='+sid);
        xhttp.onreadystatechange = function(){
        if (xhttp.readyState === 4 && xhttp.status === 200) {
              obj.innerHTML = this.responseText;
        obj.style.color = 'black';
      }}}
      if(Ajax(sid)){
        return false;
      }else{
        obj.innerHTML ="Valid Id";
    obj.style.color = 'green';
    return true;}
}
function dob() {
      let dd = document.getElementById('dd').value;
      let mm = document.getElementById('mm').value;
      let yyyy = document.getElementById('yyyy').value;
      let obj = document.getElementsByTagName('p')[0];
      obj.innerHTML = "";

      if (!dd || !mm || !yyyy) {
        obj.innerHTML = "Date is invalid: Please fill in all fields.";
        obj.style.color = 'red';
        return false;
    } else {
        if (isNaN(dd) || isNaN(mm) || isNaN(yyyy)) {
            obj.innerHTML = "Date is invalid: Please enter numbers for day, month, and year.";
            obj.style.color = 'red';
            return false;
        } else {
            dd = parseInt(dd);
            mm = parseInt(mm);
            yyyy = parseInt(yyyy);

            let currentDate = new Date();
            let inputDate = new Date(yyyy, mm - 1, dd);

            if (isNaN(inputDate.getTime()) || inputDate < currentDate) {
                obj.innerHTML = "Date is invalid: Either values are outside the allowed ranges or it's a previous date.";
                obj.style.color = 'red';
                return false;
            } else {
                let maxDays = 31;
                if (mm === 4 || mm === 6 || mm === 9 || mm === 11) {
                    maxDays = 30;
                } else if (mm === 2) {
                    maxDays = 28;
                    if ((yyyy % 4 === 0 && yyyy % 100 !== 0) || yyyy % 400 === 0) {
                        maxDays = 29;
                    }
                }

                if (dd > maxDays) {
                    obj.innerHTML = "Date is invalid: Day is not valid for the selected month.";
                    obj.style.color = 'red';
                    return false;
                } else {
                    obj.innerHTML = "Date is valid.";
                    obj.style.color = 'green';
                    return true;
                }
            }
        }
    }
    }
    function checkTime() {
    let hh = document.getElementById('hh').value;
    let min = document.getElementById('min').value;
    let meridiun = document.getElementById('meridiun').value;
    let obj = document.getElementsByTagName('p')[0];
    obj.innerHTML = "";
    if (!hh || !min || !meridiun) {
        obj.innerHTML = "Time is invalid: Please fill in all fields.";
        obj.style.color = 'red';
        return false;
    }
    let hours = parseInt(hh);
    let minutes = parseInt(min);
    if ((hours < 1 || hours > 12) || (minutes < 0 || minutes > 59)) {
        obj.innerHTML = "Time is invalid: Please enter valid hours (1-12) and minutes (0-59).";
        obj.style.color = 'red';
        return false;
    }
    if (meridiun !== 'AM' && meridiun !== 'PM') {
        obj.innerHTML = "Time is invalid: Please specify AM or PM.";
        obj.style.color = 'red';
        return false;
    }
    obj.innerHTML = "Time is valid.";
    obj.style.color = 'green';
    return true;
}
function depCheck() {
    let department = document.getElementById('dept').value.toLowerCase();
    let validDepartments = ["housekeeping", "food", "human resource", "accounting", "security", "all"];
    let obj = document.getElementsByTagName('p')[0];
    obj.innerHTML = "";

    if (!department || validDepartments.indexOf(department) === -1) {
        obj.innerHTML = "Department is invalid: Please choose a valid department.";
        obj.style.color = 'red';
        return false;
    }

    obj.innerHTML = "Department is valid.";
    obj.style.color = 'green';
    return true;
}
