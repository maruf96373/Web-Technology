<?php
function odd($a,$b){
    print("The odd number between".$a."to".$b."is :");
    for($i=$a;$i<$b;$i++){
        if($i%2!=0){
        print($i.",");}
    }
}
odd(10,100);
?>