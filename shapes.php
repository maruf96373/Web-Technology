<html>
<head>
    <title>Shapes</title>
</head>
<body>
    <table table border='1' cellspacing='0'>
        <tr>
            <td>
<?php
for($i=0;$i<3;$i++){
    for($j=0;$j<=$i;$j++){
      print("*")  ;}
      print("<br>");
}
?>
</td>
<td>
    <?php
for($i=3;$i>=1;$i--){
    for($j=1;$j<=$i;$j++){
      print($j)  ;}
      print("<br>");
} 
?>
</td>
<td>
    <?php
$a='A';
for($i=0;$i<3;$i++){
    for($j=0;$j<=$i;$j++){
      print($a++)  ;}
      print("<br>");
}
?>
</td>
</tr>
    </table>
</body>
</html>
