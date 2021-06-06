<?php

$x=1;
$y=3;

if ($x>$y) {
    //echo 'x nagyobb y-nál';
    //echo 'x nagyobb y-nál';
}

if ($x<$y) {
//echo 'x kisebb y-nál<br>';
}

//if else
if ($x>$y) {
    //echo 'x>y';
} else {
    //echo 'x<=y';
}

//elseif
$x=1;
$y=3;
if ($x>$y) {
    //echo 'x>y';
} elseif ($x==$y) {
    //echo 'x==y';
} elseif ($x!=$y) {
    //echo 'x!=y';
} else {
    //echo 'x>y';

}

//echo 'ide eljut mindig';

$x=9;
switch ($x) {
    case 10:
        echo 'x=10<br>';
        break;
    case 9:
        echo 'x=9<br>';
        break;
    
    default:
        echo 'default<br>';
        break;
}


?>