<?php
function Area($l, $w){
return $l*$w;
}
function perimeter($l, $w){
    return (2*($l+$w));
    }

    print("The Area of a Rectangle: ".Area(3,4)."\n");
    print("The Perimeter of a Rectangle: ".perimeter(3,4));
?>