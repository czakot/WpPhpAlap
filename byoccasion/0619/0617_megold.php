<?php 

/*
1. Olvassuk be a dolgozatok.txt fájlt. A fájl „név”,”dolgozat_sorszáma”,”elért pontszám” formában tartalmazza az 
adatokat. A sorszám 1,2 és 3 lehet. Írjuk ki egy eredmenyek.txt nevű fájlba a következő adatokat:
-Név1,összpontszám,átlag pontszám,megírt dolgozatok száma
-Név2,összpontszám,átlag pontszám,megírt dolgozatok száma
Ez alatt a hiányokat soroljuk fel.(Csak azokat akiknél van hiányzó dolgozat) 
-Név1,1,2
-Név3,1,3

*/ 

//fájlbeolvasás
/*$myfile = fopen("dolgozatok.txt", "r");
while(!feof($myfile)) {
    $adat=explode(';',trim(fgets($myfile)));

    $eredmeny_tomb[]=$adat;
  }
fclose($myfile);
//print_r($eredmeny_tomb);


//összegző tömb létrehozása
//összepontszám és dolgozatok számolása
$osszegzo=array();
    foreach ($eredmeny_tomb as $key => $value) {
        if (empty($osszegzo[$value[0]])) {
            $osszegzo[$value[0]]=array(
                $osszegzo[$value[0]]['megirt_dolgozatok']=>array(),  
                $osszegzo[$value[0]]['dolgozat_osszpont']=>0,
                $osszegzo[$value[0]]['atlag']=>0
            );
        }

        $osszegzo[$value[0]]['megirt_dolgozatok'][]=$value[1];
        $osszegzo[$value[0]]['dolgozat_osszpont'] +=$value[2];
        $osszegzo[$value[0]]['atlag']=round($osszegzo[$value[0]]['dolgozat_osszpont']/(count($osszegzo[$value[0]]['megirt_dolgozatok'])),2);
    }

//print_r($osszegzo);   
//hiányok feldolgozása


//fájlbaírás
    //összegző tömböt kiírjuk
    $myfile = fopen("dolgozat_eredmeny.txt", "w");
    if (!empty($osszegzo)) {
       foreach ($osszegzo as $key => $adatok) {
                //Név1,összpontszám,átlag pontszám,megírt dolgozatok száma
               $txt=$key.';'.$adatok['dolgozat_osszpont'].';'.$adatok['atlag'].';'.count($adatok['megirt_dolgozatok'])."\n";
                fwrite($myfile,$txt);
               
            }
        //hiányok: Név1,1,2
        foreach ($osszegzo as $key => $adatok) {
            //Név1,összpontszám,átlag pontszám,megírt dolgozatok száma
            $hiany=array();
            if (count($adatok['megirt_dolgozatok'])<3) {
                if (!in_array(1,$adatok['megirt_dolgozatok'])) {
                    $hiany[]=1;
                }
                if (!in_array(2,$adatok['megirt_dolgozatok'])) {
                    $hiany[]=2;
                }
                if (!in_array(3,$adatok['megirt_dolgozatok'])) {
                    $hiany[]=3;
                }

                $txt=$key.';'.implode(';',$hiany)."\n";
                fwrite($myfile,$txt);
            }
           
        }

    }
    fclose($myfile);*/
    
    /*
    2. Hozzunk létre egy html formot a következő mezőkkel:
    •	név
    •	email cím
    A form postolásakor ellenőrizzük hogy a név ki van töltve és az email cím megfelelő formátumú.
    Rögzítsük session-be abban az esetben ha a név vagy az email cím nincs még a rögzítettek között.
    Egy táblázatban listázzuk az eddig rögzített név és emailcím párokat.
    A táblázat alatt írjuk ki a leghosszabb nevet.


    */

    session_start();
    $tablazat='';
    $leghosszanev='';

    //post feldolgozása
    if (isset($_POST['nev']) && isset($_POST['email'])) {
        $belerakhatjuk=1;
        if ($_POST['nev']=='') {
            $belerakhatjuk=0;
        }
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $belerakhatjuk=0;
        }
        //szerepel-e már a sessionben
        if (!empty($_SESSION['adatok'])) {
            foreach ($_SESSION['adatok'] as $key => $value) {
                if ($_POST['email']==$value['email'] || $_POST['nev']==$value['nev']) {
                    $belerakhatjuk=0;
                }
            }
        }
        if ($belerakhatjuk==1) {
        $_SESSION['adatok'][]=array(
            'nev'=>$_POST['nev'],
            'email'=>$_POST['email'],
        );
        }
    }

    //print_r($_SESSION);

    //táblázatban megjenítjük
    if (!empty($_SESSION['adatok'])) {
        $sorok='';
        
        foreach ($_SESSION['adatok'] as $key => $termek_adatok) {
            //leghoszsab keresése
           if ($leghosszanev=='' || mb_strlen($termek_adatok['nev'])>mb_strlen($leghosszanev)) {
            $leghosszanev=$termek_adatok['nev'];
           }
            $sorok .='
                    <tr>
                        <td>'.$termek_adatok['nev'].'</td>
                        <td>'.$termek_adatok['email'].' </td>
                    </tr>
                    ';
            
        }
        $tablazat = '<table>'.$sorok.'</table>';
    
    }

    //melyik a leghosszab és azt is kiírjuk
    



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
        <input type='text' name='email'>
        <input type='submit' value='Hozzá ad' name='adatok'>
    </form>
<?php echo $tablazat; ?>
<?php echo $leghosszanev; ?>

</body>
</html>