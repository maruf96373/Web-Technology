<?php
function largest($a,$b,$c){
if($a>$b && $a>$c ){
    print("The largest number is :".$a);
}else if($b>$c && $b>$a){
    print("The largest number is :".$b);
}else{
    print("The largest number is :".$c);
}
}
largest(6,7,9);
?>