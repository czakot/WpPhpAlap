<?php 

/*
1.Olvassuk be a pontok.txt fájl tartalmát, amely nev, pontszam adatokat tartalmazza.
Hozzunk létre egy új fájlt, amelyben a pontszámok mellé az osztályzatot is kitöltjük és név szerint abc sorrendben 
az első három tanulót tartalmazza.
1-19 ->1
20-39 ->2
40-59 ->3
60-79 ->4
80-100 ->5

*/

//fájlbeolvasás
$myfile = fopen("pontok.txt", "r");
while(!feof($myfile)) {
    $adat=explode(';',trim(fgets($myfile)));

    $eredmeny_tomb[]=$adat;
  }
fclose($myfile);

//osztályzat kiegészítés
foreach ($eredmeny_tomb as $index => $ertekek) {
    //print_r($ertekek);
    if ($ertekek[1]<=19) {
        $eredmeny_tomb[$index][]=1;
    } elseif ($ertekek[1]<=39) {
        $eredmeny_tomb[$index][]=2;
    } elseif ($ertekek[1]<=59) {
        $eredmeny_tomb[$index][]=3;
    } elseif ($ertekek[1]<=79) {
        $eredmeny_tomb[$index][]=4;
    } else {
        $eredmeny_tomb[$index][]=5;
    }
}


//sorrendeznünk
function sorrend($elem1, $elem2) {
    return $elem1['0'] <=> $elem2['0'];
}
usort($eredmeny_tomb,'sorrend');

//print_r($eredmeny_tomb);

//fájlba írás de csak az első 3
$myfile = fopen("eredmeny.txt", "w");
if (!empty($eredmeny_tomb)) {
    $count=0;
    foreach ($eredmeny_tomb as $key => $adatok) {
            if ($count<3) {
            $txt=$adatok[0].';'.$adatok[1].';'.$adatok[2]."\n";
            fwrite($myfile,$txt);
            $count++;
            }

        }

}

/*
2.Hozzunk létre egy felületet amelyen egy html formban a következőket tudjuk postolni:
•	Ország neve
•	Lakosság
•	Földrész
•	Terület
Session-ben tároljuk a küldött adatokat. Egy táblázatban jelenítsük meg a következő adatokat lakosság szerint 
csökkenő sorrendben
•	Ország neve
•	Lakosság
•	Földrész
•	Terület
•	nép sűrűség (Lakosság/terület)
*/

session_start();
$tablazat='';
if (empty($_SESSION['orszagok'])) {
    $_SESSION['orszagok']=array();
}

//post feldolgozása ha minden adat meg van adva akkor berakjuk a sessionbe
$tomb=array();
if (isset($_POST['nev'])) {
    $tomb['nev']=$_POST['nev'];
}
if (isset($_POST['foldresz'])) {
    $tomb['foldresz']=$_POST['foldresz'];
}
if (isset($_POST['terulet'])) {
    $tomb['terulet']=$_POST['terulet'];
}
if (isset($_POST['lakossag'])) {
    $tomb['lakossag']=$_POST['lakossag'];
}
if (!empty($tomb)) {
    $_SESSION['orszagok'][]=$tomb;
}
print_r($_SESSION['orszagok']);
//lakosság szerint csökkenő sorrendezés
function sorrend2($elem1, $elem2) {
    return $elem2['lakossag'] <=> $elem1['lakossag'];
}
usort($_SESSION['orszagok'],'sorrend2');

print_r($_SESSION['orszagok']);

//táblázat létrehozása és népsűrűség számítása
if (!empty($_SESSION['orszagok'])) {
    $sorok='';
    
    foreach ($_SESSION['orszagok'] as $key => $termek_adatok) {
        $suruseg=0;
        if ($termek_adatok['terulet']>0) {
            $suruseg=(int)$termek_adatok['lakossag']/(int)$termek_adatok['terulet'];
        }
        $sorok .='
                <tr>
                    <td>'.$termek_adatok['nev'].'</td>
                    <td>'.$termek_adatok['lakossag'].' </td>
                    <td>'.$termek_adatok['foldresz'].' </td>
                    <td>'.$termek_adatok['terulet'].' </td>
                    <td>'.$suruseg.' </td>
                </tr>
                ';
        
    }
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
        <input type='text' name='nev'>
        <input type='text' name='lakossag'>
        <input type='text' name='foldresz'>
        <input type='text' name='terulet'>
        <input type='submit' value='Hozzá ad' name='orszag'>
    </form>
<?php echo $tablazat; ?>

</body>
</html>

<?php  
/*
3. Írj egy függvényt, amely egy kapott tömb minden eleméhez hozzáad 2-t.
fuggveny(array(9,3,10)) -> array(11,5,12)
4.Írj egy függvényt, amely a kapott tömb 10 és 30 közötti elemeinek az összegét.
fuggveny(2,13,5,99,10,25,33) -> 38
5.Írj egy függvényt, amely a kapott stringet, a kapott paraméterszer írja ki. 
fuggveny(’szó’,3) -> szószószó

*/ 
//3.
function hozzadkettot($tomb) {
    foreach ($tomb as $key => $value) {
        $tomb[$key] +=2;
    }
    return $tomb;
}
$tomb=array(9,3,10);
print_r(hozzadkettot($tomb));

//4.
function tizharminc($tomb) {
    $osszeg=0;
    foreach ($tomb as $key => $value) {
        if ($value<30 && $value>10) {
            $osszeg +=$value;
        }
    }

    return $osszeg;
}
$tomb=array(2,13,5,99,10,25,33);
echo '<br>4: '.tizharminc($tomb);

//5.
function stringparamszor($string,$hanyszor) {
    $ret='';
    for ($i=0; $i < $hanyszor; $i++) { 
        $ret .=$string;
    }
    return $ret;
}

echo stringparamszor('szó',5);

?>