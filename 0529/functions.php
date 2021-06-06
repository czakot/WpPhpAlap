<?php 

//Saját függvények
/*function fuggveny_nev($param1, $param2) {
    
    if ($param1>$param2) {
        return 'Az első paraméter nagyobb';
    }
    
    return 'Az második paraméter nagyobb vagy egyenlő';
}*/

/*$x=fuggveny_nev(1,1);
echo $x;
$x=fuggveny_nev(3,1);
echo $x;*/

//alaprételemezett paraméterek
/*function nagyobb_e($param1, $param2=10) {
    echo $param1.'<br>';
    echo $param2.'<br>';

    if ($param1>$param2) {
        return 'Az első paraméter nagyobb';
    }
    
}

nagyobb_e(1);
nagyobb_e(1,11);*/

//SCOPE
//amilyen számot kap azt megnöveli 10-zel
/*function novel_tizzel($szam) {
    $x=$szam+10;
    return $x;
}
echo novel_tizzel(5);

$x=3;
echo novel_tizzel($x).'<br>';
echo $x;*/

//így hibás
/*function novel_tizzel2($szam) {
    echo $x;
    return $x;
}*/

//
/*$x=10;
function novel_tizzel2($szam) {
    global $x;
    
    $return =$szam+10;
    return $return;
}
echo novel_tizzel2(2);
echo $y;*/

//hol hozzuk létre a függvényt
/*function kiirat() {
    echo 'teszt';
}
kiirat();*/

/*
kiirat2();
function kiirat2() {
    echo 'teszt2';
}
*/

//kiirat2();
/*$x=1;
if ($x==1) {
    function kiirat2() {
        echo 'teszt2';
    }
}
kiirat2();*/







?>