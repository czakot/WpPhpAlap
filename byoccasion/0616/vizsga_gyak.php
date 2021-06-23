<?php 
/*
1.Olvassuk be a futoverseny.txt fájl tartalmát ami név, életkor és a helyezés adatokat tartalmazza.
Hozzunk létre egy új fájlt, amelyben helyezés szerinti növekvő sorrendben szerepelnek a 25 év alattiak.
*/

//fájlbeolvasás
$myfile = fopen("futoverseny.txt", "r");
while(!feof($myfile)) {
    $adat=explode(';',trim(fgets($myfile)));

    $eredmeny_tomb[]=$adat;
  }
fclose($myfile);
//print_r($eredmeny_tomb);

//kiszűrjűk a 25 alattiakat egy uj tömbbe
foreach ($eredmeny_tomb as $key => $value) {
    if ($value[1]<25) {
        $alattiak[]=$value;
    }
}


//helyezés szerint sorrendezzük

array_multisort(array_column($alattiak,'2'),SORT_ASC,$alattiak);

/*function sorrend($elem1, $elem2) {
    return $elem1['2'] <=> $elem2['2'];
}
usort($alattiak,'sorrend');*/

//létrehozzuk az új fájlt
$myfile = fopen("eredmeny.txt", "w");
if (!empty($alattiak)) {
    foreach ($alattiak as $key => $adatok) {
            $txt=$adatok[0].';'.$adatok[1].';'.$adatok[2]."\n";
            fwrite($myfile,$txt);
        
    }

}

/*
2.Hozzunk létre egy felületet amin egy html form-ban tudjuk a következőket postolni. 
•	Termékneve
•	Egységára
•	Mennyisége
Session-ben tároljuk a küldött adatokat. Egy táblázatban jelenítsük meg a következő adatokat.
•	Termékneve
•	Egységára
•	Mennyiség
•	Sor összege(Mennyiség*Egységár)
•	Legyen egy utolsó sor ahol az összes sor összegét összegezzük(végösszeg)

*/ 

//session
session_start();
$tablazat='';
//form 3 mezővel + submit
//print_r($_POST);
if (isset($_POST['termek_nev']) && $_POST['mennyiseg']>0 && $_POST['egysegar']>0) {
    
    $_SESSION['sorok'][]=array(
        'termek_nev'=>$_POST['termek_nev'],
        'mennyiseg'=>(int)$_POST['mennyiseg'],
        'egysegar'=>(int)$_POST['egysegar'],

    );
}
//kell egy táblázat
if (!empty($_SESSION['sorok'])) {
    $sorok='';
    $vegosszeg=0;
    foreach ($_SESSION['sorok'] as $key => $termek_adatok) {
        $sorosszeg=(int)$termek_adatok['egysegar']*(int)$termek_adatok['mennyiseg'];
        $sorok .='
                <tr>
                    <td>'.$termek_adatok['termek_nev'].'</td>
                    <td>'.$termek_adatok['mennyiseg'].' db</td>
                    <td>'.$termek_adatok['egysegar'].' Ft</td>
                    <td>'.$sorosszeg.' Ft</td>
                </tr>
                ';
        $vegosszeg +=$sorosszeg;
    }

    

    //összegző sort
    $sorok .='
                <tr>
                    <td>Végösszeg</td>
                    <td>'.$vegosszeg.' Ft</td>
                </tr>
        ';
    $tablazat = '<table>'.$sorok.'</table>';

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
        <input type='text' name='termek_nev'>
        <input type='text' name='mennyiseg'>
        <input type='text' name='egysegar'>
        <input type='submit' value='Hozzá ad' name='termek_hozzadas'>
    </form>
<?php echo $tablazat; ?>

</body>
</html>

<?php 
/*
3.Írj egy függvényt, amely egy kapott szóközökkel elválasztott szövegben megkeresi a leghosszabb szót
fuggveny(„amely egy kapott szóközökkel elválasztott szövegben”) -> „elválasztott”
*/ 

function leghosszabb($szoveg) {
    $leghosszabb='';
    //szavakra bontás
    $szavak=explode(' ',$szoveg);
    //print_r($szavak);

    //leghosszabb keresése
    foreach ($szavak as $key => $szo) {
        //echo $szo.'<br>';
        //echo mb_strlen($szo).'<br>';
        if (mb_strlen($szo)>mb_strlen($leghosszabb)) {
            $leghosszabb=$szo;
        }
    }

    //visszatérés
    return $leghosszabb;
}

echo '<br>Feladat 3: '.leghosszabb("amely egy kapott szóközökkel elválasztott szövegben");

/*
4. Írj egy függvényt, amely a kapott 3 paraméter közül megkeresi a legkisebbet és a háromszorosát adja vissza.
fuggveny(3,11,2) -> 6

*/
function haromszoros($param1,$param2,$param3) {
    $eredmeny=0;

    $legkisebb=min($param1,$param2,$param3);
    //echo $legkisebb;
    $eredmeny=$legkisebb*3;

    return $eredmeny;
}

echo '<br>Feladat 4: '.haromszoros(3,11,2);

/*
5.Írj egy függvényt, amely a kapott tömb 10 és 30 közötti elemeit adja vissza.
fuggveny(array(2,13,5,99,10,25,33)) -> array(13,25)
*/

function tizharminckozott($tomb) {
    if (!empty($tomb)) {
        foreach ($tomb as $key => $value) {
            if ($value>10 && $value<30) {
                $filtered_tomb[]=$value;
            }
        }
    }

    return $filtered_tomb;
}

echo '<br>Feladat 5: ';
print_r(tizharminckozott(array(2,13,5,99,10,25,33)));

/*

*/

$myfile = fopen("futoverseny.txt", "r");
while(!feof($myfile)) {
    $adat=explode(';',trim(fgets($myfile)));

    $eredmeny_tomb[]=$adat;
  }
fclose($myfile);
//print_r($eredmeny_tomb);

//kiszűrjűk a 25 alattiakat egy uj tömbbe
foreach ($eredmeny_tomb as $key => $value) {
    if ($value[1]<25) {
        $alattiak[]=$value;
    }
}


//helyezés szerint sorrendezzük
$var=array_column($alattiak,'2');
print_r($var);
print_r($alattiak);
array_multisort(array_column($alattiak,'2'),SORT_ASC,$alattiak);

?>