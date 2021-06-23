<?php
//kiírunk egy véletlenszerű feladatot ha jó választ adnak akkor 1 pont
//írjuk hogy hány %-os az eredménye
session_start();

$normal_valtozo++;
echo $normal_valtozo.'<br>';
$normal_valtozo++;
echo $normal_valtozo.'<br>';

echo $_SESSION['oldal_toltesek'].'<br>';
$_SESSION['oldal_toltesek'] .='k';
echo $_SESSION['oldal_toltesek'];
//echo 'issetek előtt session';
//print_r($_SESSION);

//létrehozzuk a megoldás változót ha még nincs.
if (!isset($_SESSION['megoldas'])) {
    $_SESSION['megoldas']=null;
}
if (!isset($_SESSION['osszes_valasz'])) {
    $_SESSION['osszes_valasz']=0;
}
if (!isset($_SESSION['jo_valasz'])) {
    $_SESSION['jo_valasz']=0;
}

//echo 'issetek után session';
//print_r($_SESSION);

//echo '$_POST tartalma';
//print_r($_POST);

//ha megoldást küldenek ellenőrizzük
if (isset($_POST['megoldas'])) {
    //ez nőni fog mert megoldást küldtek
    $_SESSION['osszes_valasz']++;
    if ($_POST['megoldas']==$_SESSION['megoldas']) {
        $_SESSION['jo_valasz']++;
    } 
}
//echo 'megoldás ellenőrzés után session';
//print_r($_SESSION);


//a következő feladat
$elso_szam=rand(1,10);
$masodik_szam=rand(1,10);
$_SESSION['megoldas']=$elso_szam+$masodik_szam;

//echo $elso_szam.' + '.$masodik_szam.' = '.$_SESSION['megoldas'];


if ($_SESSION['osszes_valasz']!=0) {
    $eredmeny_szazalek=(($_SESSION['jo_valasz']/$_SESSION['osszes_valasz'])*100).'%';
} else {
    $eredmeny_szazalek='';
}
$eredmeny_szoveg= $_SESSION['jo_valasz'].'/'.$_SESSION['osszes_valasz'].' '.$eredmeny_szazalek;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>Feladat: <?php echo $elso_szam.' + '.$masodik_szam?> </div>
    <form action="" method="post">
        <input type="text" id="megoldas" name="megoldas" value=""><br>
        <input type="submit" value="Submit">
    </form>
    <div>Eredmény: <?php echo $eredmeny_szoveg?> </div>



</body>
</html>