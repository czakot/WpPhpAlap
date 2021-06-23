<?php
//tömb összege
/*$rendezetlen=array(2,1,3,6,2);

print_r($rendezetlen);
echo '<br>'.count($rendezetlen).'<br>';
$osszeg=0;
for ($i=0; $i < count($rendezetlen); $i++) { 
    $osszeg +=$rendezetlen[$i];
}
echo $osszeg;*/

/*function tomb_osszeadas($tomb) {
    $osszeg=0;
    for ($i=0; $i < count($tomb); $i++) { 
        $osszeg +=$tomb[$i];
    }

    echo $osszeg.'<br>';
}

$rendezetlen2=array(2,1,2,6,2);
$rendezetlen3=array(2,1,7,6,2);
$rendezetlen4=array(2,1,9,6,2,10,50);

tomb_osszeadas($rendezetlen2);
tomb_osszeadas($rendezetlen3);
tomb_osszeadas($rendezetlen4);*/

//tömb első 2 elemének összege
/*function tomb_elso_ket_elemenek_osszege($tomb) {
   echo $tomb[0]+$tomb[1].'<br>';
}
$rendezetlen2=array(2,1,2,6,2);
$rendezetlen3=array(4,1,7,6,2);
$rendezetlen4=array(2,1,9,6,2,10,50);

tomb_elso_ket_elemenek_osszege($rendezetlen2);
tomb_elso_ket_elemenek_osszege($rendezetlen3);
tomb_elso_ket_elemenek_osszege($rendezetlen4);*/

//tömb első x elemének az összege, ha nem adjuk meg akkor az összesé
/*function tomb_elemeinek_osszege2($tomb,$elso_hany_elem=0) {
    if ($elso_hany_elem==0) {
    $elso_hany_elem=count($tomb);}

    $osszeg=0;
    for ($i=0; $i < $elso_hany_elem; $i++) { 
        $osszeg +=$tomb[$i];
    }

    echo $osszeg.'<br>';
}

$rendezetlen2=array(2,1,2,6,2);
$rendezetlen3=array(2,1,7,6,2);
$rendezetlen4=array(2,1,9,6,2,10,50);

tomb_elemeinek_osszege2($rendezetlen2);
tomb_elemeinek_osszege2($rendezetlen3,2);
tomb_elemeinek_osszege2($rendezetlen4,5);*/

//sorrendező függvény írása
/*$rendezetlen=array(2,1,3,6,2);
$tmp_rendezetlen=$rendezetlen;
//cél: egy tömb amiben 1 2 2 3 6

for ($i=0; $i < count($rendezetlen); $i++) { 
    //echo '$i:'.$i.'<br>';
    $min=null;
    for ($j=0; $j < count($tmp_rendezetlen); $j++) { 
        //echo '$j:'.$j.'<br>';
        if ($tmp_rendezetlen[$j]<$min || is_null($min)) {
            $min=$tmp_rendezetlen[$j];
            $min_index=$j;
        }
        //echo '$min:'.$min.'<br>';
    }
    $rendezett[]=$min;
    unset($tmp_rendezetlen[$min_index]);
    $tmp_rendezetlen=array_values($tmp_rendezetlen);
    //print_r($tmp_rendezetlen);
}

echo 'eredmény:';
print_r($rendezett);*/

//foreach sorrendezés
$rendezetlen2=array(2,1,3,6,2);
/*
2,1,3,6,2
1,2,3,6,2
1,2,3,6,2
1,2,2,6,3
1,2,2,3,6
*/ 

/*if (!empty($rendezetlen2)) {
    print_r($rendezetlen2);
    while (count($rendezetlen2)>0) {
        echo 'count:'.count($rendezetlen2);
        $min=null;
        $min_key=null;
        foreach ($rendezetlen2 as $kulcs => $value) {
            if ($value<=$min || is_null($min)) {
                $min=$value;
                $min_key=$kulcs;
            }
        }
        $rendezett[]=$min;
        unset($rendezetlen2[$min_key]);
        echo '<br>rendezett:';
        print_r($rendezett);
        echo '<br>rendezetlen2:';
        print_r($rendezetlen2);
    }
} 
print_r($rendezett);**/

/*function foreach_rendezes($rendezetlen2) {
    if (!empty($rendezetlen2)) {
        //print_r($rendezetlen2);
        while (count($rendezetlen2)>0) {
            //echo 'count:'.count($rendezetlen2);
            $min=null;
            $min_key=null;
            foreach ($rendezetlen2 as $kulcs => $value) {
                if ($value<=$min || is_null($min)) {
                    $min=$value;
                    $min_key=$kulcs;
                }
            }
            $rendezett[]=$min;
            unset($rendezetlen2[$min_key]);
            //echo '<br>rendezett:';
            //print_r($rendezett);
            //echo '<br>rendezetlen2:';
            //print_r($rendezetlen2);
        }
        return $rendezett;
    } else {
        return 'A tömb üres';
    }
}

$rendezetlen2=array(2,1,2,6,2);
$rendezetlen3=array(2,1,7,6,2);
$rendezetlen4=array(2,1,9,6,2,10,50);
$rendezetlen10=array();

echo '<br>';
print_r(foreach_rendezes($rendezetlen10));
echo '<br>';
print_r(foreach_rendezes($rendezetlen3));
echo '<br>';
print_r(foreach_rendezes($rendezetlen4));*/

?>