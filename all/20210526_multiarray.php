<?php 

/*$tomb=array(2,432,12,1,543,3);

for ($i=10; $i > 0; $i++) { 
    echo '<br>'.$i;
    $i++;
}*/

/*$i=0;
while ($i<10) {
    echo '<br>'.$i;
    $i++;

}*/

/*
$i=0;
do {
    echo '<br>'.$i;
    $i++;
} while ($i < 10);
*/


/*$tomb=array(1,2,3,4,5,6);
print_r($tomb);
foreach ($tomb as $kulcs => $ertek) {

    echo 'kulcs: '.$kulcs.' érték: '.$ertek.'<br>';
}*/

/*$tomb=array(1,2,3,4,5,6);
$osszeg=0;
//print_r($tomb);
foreach ($tomb as $ertek) {
    $osszeg +=$ertek;
    
}
echo $osszeg;*/

/*$tomb=array(1,2,3,4,5,6);
$tomb=array(1,2,3,4,5,6,3,6);


$osszeg=0;
for ($i=0; $i < count($tomb); $i++) { 
    $osszeg +=$tomb[$i];
}
echo $osszeg;*/

/*
for ($i=0; $i < 10; $i++) { 
    echo '<br>'.$i;
    if ($i==3) {
        break;
    }
}*/

for ($i=0; $i < 10; $i++) { 
    
    if ($i==3) {
        continue;
    }
    echo '<br>'.$i;
}










?>