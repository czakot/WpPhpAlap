<?php 
/*Akasztófa
    1.fájlból gyűjtjük ki a feldatok soronként 1 feladat.(feladatok.txt)
    2.új játék
    3._-ok jelzik a karaktereket, szóköz helyén szóköz végén zárójelben a karakterek hossza
    4.alatta eddigi tippek, áthúzva ha nem szerepeltek benne
    5.alatta form, ha 1 karaktert kap akkor tipp, ha többet akkor megoldást
    6.megoldás után kiírja hogy eltaláltad vagy nem és nem lehet többet tipppelni csak uj gombot megnyomni

    Megoldás lépései
    1.html összerakása
        -újjáték
        -feladat kiírása
        -eddigi tippek kiírása
        -tipp textfield és küldés
    2.fájlból beolvasás
    3.postoknak feldolgozása
        -uj játék: kiürítmindent és uj feladatot választ ki véletlen szerűen
        -tipp/megoldás
            string hossz dönti el
                tipp: berakjuk a tippek tömbbe,
                megoldás: ha egyezik a feladattal kiíjruk hogy nyertél és nem lehet tippelni többet (se htmlben, se feldolgozáskor nem fogadunk el többet)

        -feladat: eddigi tippeket betűre cseréljük, maradék _ legyen vagy space
        -tippek kiírása: ami hibás az legyen áthúzva
*/

session_start();

$feladat='';
$eredmeny='';
$tippek ='';

//fájlbeolvasása
$myfile = fopen("feladatok.txt", "r");
while(!feof($myfile)) {
    $feladatok_tomb[]=trim(fgets($myfile));
  }
fclose($myfile);
  //print_r($feladatok_tomb);

//postok feldoglozása
//print_r($_POST);
//új játékot inditani
if (isset($_POST['uj_jatek']) && $_POST['uj_jatek']='Új játék') {
    //tippek ürítése
    $_SESSION['tippek']=array();
    //uj feladat
    $veletlenszeru_index=random_int(0,count($feladatok_tomb)-1);
    $uj_feladat=$feladatok_tomb[$veletlenszeru_index];
    $_SESSION['feladat']=$uj_feladat;
}
print_r($_SESSION['feladat']);
//tipp/megoldás feldolgozása
//print_r($_POST['tipp']);
if (isset($_POST['tipp'])) {
    //echo 'belefut';
    //echo mb_strlen($_POST['tipp']);
    if (mb_strlen($_POST['tipp'])==1) {
        //egy új tipp
        $_SESSION['tippek'][]=mb_strtolower($_POST['tipp']);
        
    } else {
        //ez egy megoldás
        if (mb_strtolower($_POST['tipp'])==mb_strtolower($_SESSION['feladat'])) {
            $eredmeny='Nyertél, a megoldás:'.$_SESSION['feladat'];
        } else {
            $eredmeny='Vesztettél, a megoldás:'.$_SESSION['feladat'];
        }

    }
}

//feladat kiírása
if (isset($_SESSION['feladat']) && $_SESSION['feladat']!='') {
    //$feladat Ajtóstul ront be a házba -> A_tó_t_l r_nt __ a házba
    $feladat_chars=mb_str_split(mb_strtolower($_SESSION['feladat']));
    foreach ($feladat_chars as $betu) {
        //szerepel vagy nem szerepel
        if (in_array($betu,$_SESSION['tippek']) || $betu==' ') {
            $feladat .=$betu;
        } else {
            $feladat .='_';
        }
    }
}

//eddigi tippek kiírása
//$tippek $_SESSION['tippek'] e r t z //az áthúzáshoz:$_SESSION['feladat']
foreach ($_SESSION['tippek'] as $tip_betu) {

    if (mb_strpos(mb_strtolower($_SESSION['feladat']),$tip_betu)) {
        $tippek .=$tip_betu;
    } else {
        $tippek .='<span style="color:red;"><del>'.$tip_betu.'</del></span>';
    }
    
}



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
    <form action='' method='post'>
        <input type='submit' value='Új játék' name='uj_jatek'>
    </form>

    <div><?php echo $eredmeny?></div>
    <div>Feladat:<?php echo $feladat?></div>
    <div>Tippek:<?php echo $tippek?></div>

    <form action='' method='post'>
        <input type='text' name='tipp'>
        <input type='submit' value='Tipp/Megoldás'>
    </form>



</body>
</html>