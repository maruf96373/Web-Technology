<html>
<head>
    <title>Degree</title>
</head>
<body>
    <form method="" action="" enctype="">
        <fieldset style="width: 300;">
            <legend><b>DEGREE</b></legend>
            <input type="checkbox" name="check[]" id="ssc" value="SSC" onchange="validateDegree()" />SSC
            <input type="checkbox" name="check[]" id="hsc" value="HSC" onchange="validateDegree()" />HSC
            <input type="checkbox" name="check[]" id="bsc" value="BSc" onchange="validateDegree()" />BSc 
            <input type="checkbox" name="check[]" id="msc" value="MSc" onchange="validateDegree()" />MSc 
            <p id="degree-validation"></p> 
            <hr>
            <div style="padding: 3px;"> <input type="button" name="submit" value="Submit" onclick="validateDegree()" /></div>
        </fieldset>
    </form>
    <script>
        function validateDegree() {
            let  ssc = document.getElementById('ssc').checked;
            let  hsc = document.getElementById('hsc').checked;
            let  bsc = document.getElementById('bsc').checked;
            let  msc = document.getElementById('msc').checked;
            let  obj = document.getElementById('degree-validation');
            
            if (!(ssc || hsc || bsc || msc)) {
                obj.innerHTML = "*Please select at least two degrees.";
                obj.style.color = 'red';
                return false;
            }
            
            obj.innerHTML = "Selected Degrees: ";
            let  selectedDegrees = [];
            if (ssc) selectedDegrees.push("SSC");
            if (hsc) selectedDegrees.push("HSC");
            if (bsc) selectedDegrees.push("BSc");
            if (msc) selectedDegrees.push("MSc");
            obj.innerHTML += selectedDegrees.join(", ");
            obj.style.color = 'green';
            return true;
        }
    </script>
</body>
</html>
