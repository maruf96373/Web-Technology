<?php
$b=1;
$a=[2,4,7,9,11];
function linear($a,$b){
for($i=0;$i<5;$i++){
    if($a[$i]==$b){
      return $i;
    }   
} return -1;
}
$result=linear($a, $b);
if($result!=-1){
    print("found");
}else{
    print("not found");
}

?>