<?php 

//fájl műveletek
//echo readfile("files/teszt.txt"); //egyszerű

//általában ezt használjuk
//$myfile = fopen("files/teszt.txt", "r"); //ez csak megnyitja

//$tartalom=fread($myfile,filesize("files/teszt.txt"));
//echo filesize("files/teszt.txt");

//leszeretnénk zárni a fájl műveleteket
//fclose($myfile);

//soronként
/*$myfile = fopen("files/teszt.txt", "r"); //ez csak megnyitja

$sor=fgets($myfile); 
echo $sor;
echo '<br>';
$sor=fgets($myfile); 
echo $sor;

fclose($myfile);*/

//összessor kiolvasása
/*$myfile = fopen("files/teszt.txt", "r");
while (!feof($myfile)) {
    echo fgets($myfile).'<br>';
}
fclose($myfile);*/


/*$myfile = fopen("files/teszt.csv", "r");
while (!feof($myfile)) {
    //a következő sor tartalma egy stringbe
    $sor_tartalma=fgets($myfile);
    //pontosvessző mentén tömböt képzünk
    $sor_adatok=explode(';',$sor_tartalma);
    //hozzáadjuk a tömbünkhöz
    $sorok[]=$sor_adatok;

}
fclose($myfile);
print_r($sorok);*/

//filebe írni
/*$myfile = fopen("newfile.txt", "w");
$txt="első sor\n";
fwrite($myfile,$txt);
fwrite($myfile,$txt);*/

/*
feladat: csv létrehozni ami egy tömb adataiből a nevet és az életkort tartalmazza, csak a budapestieket
*/
$adat_tomb=array(
    0=>array(
        'nev'=>'Dávid',
        'eletkor'=>30,
        'varos'=>'Budapest'
    ),
    1=>array(
        'nev'=>'Tamás',
        'eletkor'=>18,
        'varos'=>'Kecskemét'
    ),
    2=>array(
        'nev'=>'Béla',
        'eletkor'=>29,
        'varos'=>'Budapest'
    ),
    3=>array(
        'nev'=>'Áron',
        'eletkor'=>25,
        'varos'=>'Pécs'
    ),

);

$myfile = fopen("nevek_es_eletkor.csv", "w");
if (!empty($adat_tomb)) {
    foreach ($adat_tomb as $key => $adatok) {
        if ($adatok['varos']=='Budapest') {
            $txt="{$adatok['nev']};{$adatok['eletkor']}\n";
            fwrite($myfile,$txt);
        }
    }
}





?>