<?php

$valtozo = 'string_var$v';
//echo $valtozo;

$v='ertek';
$valtozo2 = "string_var$v";
//echo $valtozo2;

$valtozo = 'uj érték';
//echo $valtozo;

$number = 5;
$number2 = 5.3;
//echo $number.'<br>';
//echo $number2;

//echo $number,$number2;
//print $number;

$number = 'string';
//echo $number;

//echo $number2.$number;
//echo $number2+$number;

//print_r($number2);

///Szünet után

$x= 'asd';
$y= '4';
$x= $y;
$y= 5;
//echo $x;

$string3 = 'szöveges változó';
$string4 = 'szöveges változó2';
$string3 = $string3.$string4.' szöveg3 '."$x";
//echo $string3;

$string5 ='x';
$string6 ='y';
$string5 .= $string6.$string6;
//echo $string5;

// + - * / % **
$num4 = 3;
$num5 = 5;
$num6 = 9;

$num7 = $num4 + $num5;
//echo $num7.'<br>';
$num7 = $num4 - $num5;
//echo $num7.'<br>';
$num7 = $num4 * $num5;
//echo $num7.'<br>';
$num7 = $num4 / $num5;
//echo $num7.'<br>';

$num7 = $num4 % $num5;
//echo $num7.'<br>';

$num7 = $num4 ** 3;
//echo $num7.'<br>';

$num7 += $num6;
$num7 -= $num6;
$num7  = $num7 +$num6;
//echo $num7;

$num7 = ($num4+$num5)*$num6;

$x=10;
//echo $x.'<br>';

/*++$x;
echo $x.'<br>';
--$x;
$x++;
echo $x.'<br>';
$x--;*/

//echo $x++.'<br>';
//echo ++$x.'<br>';
//echo $x.'<br>';

//==
$x=1;
$y='1';
if ($y==$x) {
  //echo 'egyenlő';  
} else {
   // echo 'nem egyenlő';  
}

//===
$x=1;
$y='1';
if ($y===$x) {
  //echo 'egyenlő';  
} else {
    //echo 'nem egyenlő';  
}

//!=
$x=1;
$y=3;
if ($y!=$x) {
  //echo 'nem egyenlő';  
} else {
    //echo 'egyenlő';  
}

$x=1;
$y=3;
if ($y<>$x) {
  //echo 'nem egyenlő';  
} else {
    //echo 'egyenlő';  
}

$x=1;
$y='1';
if ($y!==$x) {
  //echo 'nem egyenlő';  
} else {
   // echo 'egyenlő';  
}


$x=6;
$y=3;
if ($y<$x) {
  //echo 'y kisebb mint x';  
} else {
   // echo 'nagyobb vagy egyenlő';  
}

$x=6;
$y=3;
if ($y>$x) {
  //echo 'y nagyobb mint x';  
} else {
   // echo 'kisebb vagy egyenlő';  
}

$x=3;
$y=3;
if ($y>=$x) {
  echo 'y nagyobb vagy egyenlő mint x';  
} else {
    echo 'kisebb';  
}
















?>