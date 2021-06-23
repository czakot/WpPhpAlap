<?php
session_start();

//termékek lekérése
//akciós termékek
$kulcsok=array('id','nev','ar','akcios','kep');
$myfile = fopen("termekek.txt", "r");
while(!feof($myfile)) {
    $sor_tartalma=trim(fgets($myfile));
    $sor_adatok=explode(';',$sor_tartalma);
    //print_r($sor_adatok);
    $sor_adatok=array_combine($kulcsok,$sor_adatok);
    //print_r($sor_adatok);
    $akcios_termekek_tomb[]=$sor_adatok;
    
  }
fclose($myfile);

//szűrés form
$termek_szures_from="
            <form>
                <label for='ar_tol'>Ártól</label>
                <input name='ar_tol' type='text' value=''>
                <label for='ar_ig'>Árig</label>
                <input name='ar_ig' type='text' value=''>
                <label for='name'>Név</label>
                <input name='name' type='text' value=''>

                <select name='order'>
                <option value='ar_novekvo'>Ár növekvő</option>
                <option value='nev_novekvo'>Név növekvő</option>
                </select>

                <input type='submit' value='Szűrés'>

            </form>

";

//termékek átblázat
$termekek_tablazat='';
if (!empty($akcios_termekek_tomb)) {
    $sorok='';
    foreach ($akcios_termekek_tomb as $key => $termek_adatok) {
        $sorok .='
                <tr>
                    <td>'.$termek_adatok['nev'].'</td>
                    <td>'.$termek_adatok['ar'].' Ft</td>
                    <td><img alt="Feltöltés alatt" src="images/'.$termek_adatok['kep'].'"></td>
                    <td>
                        <form method="post">
                            <input type="submit" name="'.$termek_adatok['id'].'" value="Rendelek">
                        </form>
                    </td>
                </tr>
        ';
    }
    $termekek_tablazat = '<table>'.$sorok.'</table>';

}

//rendelés feldoglozása
//print_r($_POST);
if (!empty($_POST)) {
    foreach ($_POST as $termek_id => $esemeny) {
        if ($termek_id>0 && $esemeny=='Rendelek') {
            $_SESSION['kosar'][$termek_id]++;
        }
    }
}

print_r($_SESSION);

$tartalom= '<div id="content_big">'.$termek_szures_from.$termekek_tablazat.'</div>';
?>



<?php include 'header.php'; ?>
<?php echo $tartalom; ?>
<?php include 'footer.php'; ?>