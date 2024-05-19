function IdCheck() {
    let gid = document.getElementById('gid').value;
let obj = document.getElementsByTagName('p')[0];
obj.innerHTML = "";

if (!gid) {
obj.innerHTML = "Guest ID cannot be empty";
obj.style.color = 'red';
return false;
}

if (gid.substring(0, 1) !== 'G') {
obj.innerHTML = "Invalid Guest ID format. It must start with 'G'";
obj.style.color = 'red';
return false;
}

if (gid.length !== 6) {
obj.innerHTML = "Invalid Guest ID format. It must be 6 characters long";
obj.style.color = 'red';
return false;
}

let numericPart = gid.substring(1);
let numericRegex = /^\d+$/;
if (!numericPart.match(numericRegex)) {
obj.innerHTML = "Invalid Guest ID format. After the 'G' prefix, it must contain only digits";
obj.style.color = 'red';
return false;
}
function Ajax(gid){
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../Controller/AddCalCheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('gid='+gid);
    xhttp.onreadystatechange = function(){
    if (xhttp.readyState === 4 && xhttp.status === 200) {
          obj.innerHTML = this.responseText;
    obj.style.color = 'red';
  }}}
  if(Ajax(gid)){
    return false;
  }else{
    obj.innerHTML ="Valid Id";
obj.style.color = 'green';
return true;}
}
