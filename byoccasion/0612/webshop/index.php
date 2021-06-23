<?php 
/*webshop pár menüponttal
kezdőoldal, termékek, kosár, admin

-mindenhol ugyanaz a header menü és footer lesz
-admin:  jogosultság szükséges, a termékeket listázzuk, árat lehet állítani, ujtermék, 
    és akciósságot (fájlban átroljuk az adatokat) //képfeltöltés kézzel kell csak nevet kell megadni itt
-belépés: admin vagy vásárló,
-kezdőoldal az akciós termékeket mutatjuk + üdvözlőszöveg
-termékek: lesz egy szűrés névre és ár-ra tól ig
            rendezés tipusa
            szűrés és rendezést elmenti
            kosárhoz hozzáadás
-kosár: kosár tartalma, ha belépett felhasználó kitöltjük a címet
*/

/*Megoldás
1.header.php footer.php-t ltérehozzuk
2.kezdő oldal
    head foot include
    tartalma
3.termékeket
4.kosar
5.admin
6.login

*/

$tartalom=''; //tartalom <div id="content_big">  .... </div>

$udvozlo_szoveg='Üdv
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tincidunt luctus est, a commodo neque tempus sit amet. Etiam ultricies at turpis non pellentesque. In maximus elementum purus suscipit placerat. Quisque pretium velit felis, et volutpat augue mattis eget. Duis dapibus nibh in pulvinar ultrices. Mauris sagittis vitae sem in luctus. Aenean sit amet nibh elementum, porta lacus sed, placerat mauris. Etiam nisi dolor, vestibulum sed erat vel, viverra pulvinar neque. Sed finibus nulla tellus, et pretium orci tempor sit amet. Maecenas iaculis lorem a nisl consequat, sit amet molestie massa dignissim. Fusce arcu eros, lobortis non bibendum eu, condimentum eget orci. Maecenas elit tortor, tempor non viverra eu, malesuada ut augue. Cras sit amet rhoncus leo. Nullam sit amet arcu mi.';

//akciós termékek
$kulcsok=array('id','nev','ar','akcios','kep');
$myfile = fopen("termekek.txt", "r");
while(!feof($myfile)) {
    $sor_tartalma=trim(fgets($myfile));
    $sor_adatok=explode(';',$sor_tartalma);
    //print_r($sor_adatok);
    $sor_adatok=array_combine($kulcsok,$sor_adatok);
    //print_r($sor_adatok);
    //csak az akctiósakat szeretnénk
    if ($sor_adatok['akcios']=='akcios') {
        $akcios_termekek_tomb[]=$sor_adatok;
    }
  }
fclose($myfile);

//
$akcios_table='';
if (!empty($akcios_termekek_tomb)) {
    $sorok='';
    foreach ($akcios_termekek_tomb as $key => $termek_adatok) {
        $sorok .='
                <tr>
                    <td>'.$termek_adatok['nev'].'</td>
                    <td>'.$termek_adatok['ar'].' Ft</td>
                    <td><img alt="Feltöltés alatt" src="images/'.$termek_adatok['kep'].'"></td>
                </tr>
        ';
    }
    $akcios_table = '<table>'.$sorok.'</table>';

}

$tartalom= '<div id="content_big">'.$udvozlo_szoveg.$akcios_table.'</div>';

?>

<?php include 'header.php'; ?>

<?php echo $tartalom ?>

<?php include 'footer.php'; ?>