<?php
$tax = '11112222-3-41';
//első 8 számjegy ellenőrzése
/*$pattern = "/^[0-9]{8}/";
preg_match($pattern,$tax,$matches);*/

$pattern = "/^[0-9]{8}-[0-9]{1}-[0-9]{2}$/";
preg_match($pattern,$tax,$matches);
if(empty($matches)){
    echo "hibás adószám formátum";
} else {
    echo "helyes adószám";
}

echo "<br><br>";

$email = 'd-avid@net.ti.zu.hu';
//első x karakter lehet a mintának megfelelő utána @
/*$pattern = "/^[0-9a-z\.-]+@/";
preg_match($pattern,$email,$matches);*/

$pattern = "/^[0-9a-z\.-]+@([0-9a-z-]+\.)+[a-z]{2,4}$/";
preg_match($pattern,$email,$matches);

$matches = array();

//első karakter +
//1-3 számjegy
//(
//2 szám
// )
// 3 szám
// -
//4 szám
//sql phone LIKE '%+%';
//spec karakterek: \ ^ $ * + ? . { } [ ] ( )
$phonenumber = "+35(70)555-4444";

$pattern = "/^\+[0-9]{1,3}\([1-9][0]\)[0-9]{3}\-[0-9]{4}$/";
preg_match($pattern,$phonenumber,$matches);
print_r($matches);
