<?php

$adatbazis[0]['name']='Dávid';
$adatbazis[0]['email']='david@gmail.com';
$adatbazis[0]['jelszo']='1234';
$adatbazis[0]['name']='Ádám';
$adatbazis[0]['email']='adom@gmail.com';
$adatbazis[0]['jelszo']='1234';

//$_POST feldolgozása
//külön kellene választani a regisztárció és a belépést +hidden input
$reg_hiba='';
$reg_name_value='';
$reg_name_hiba ='';

if (isset($_POST['tipus'])) {
    if ($_POST['tipus']=='reg') {
        //meg van-e minden adat
        if (
                $_POST['name'] !='' &&
                $_POST['email'] !='' &&
                $_POST['jelszo'] !='' &&
                $_POST['jelszo2'] !=''

            )
             {
                echo 'Minden adat meg van!';
                //név ellenőrzés
                    //strlen<=10
                    //foreach adatbazis name-re


                //email ellenőrzés
                    //filter_var($email, FILTER_VALIDATE_EMAIL)
                    //foreach adatbazis emailre-re

                //strtolower=önmaga

                //jelszó egyezőség



        } else {
            if ($_POST['name']=='') {
                $reg_hiba = "Kérem adjon meg egy nevet!";
            }
            if ($_POST['email']=='') {
                //mivel itt már lehet értéke a hibának és ilyenkor szeretnénk a hiba üzenetbe egy sortörést érdemes még egy ifet rakni
                if ($reg_hiba!='') {
                    $reg_hiba .='<br>';
                }
                //mivel ezt úgyis hozzá kell adni
                $reg_hiba .= "Kérem adjon meg egy email címet!";

                //rövidebben
                /*$hiba_str="Kérem adjon meg egy email címet!";
                $reg_hiba .= ($reg_hiba!='') ? "<br>".$hiba_str : $hiba_str;*/
            }
            //...
        }

    } elseif ($_POST['tipus']=='login') {
        
    }
}
//tipus alapján elágazás
    //tipus=reg
        //minden adatot megkaptunk-e: név email jelszó1 jelszó2
            //név ellenőrzés max10 neszerepeljen az eddigiek között
            //jelszó: 8 karakter minimum és legyen benne nagy betű
            //jelszó és jelszó 2 egyezzen
            //email cím: filter_Var email valid, ne szerepeljen az eddigek között

            //ha hiba akkor azt kiírjuk ezért kell vmi hely ahova kiírjuk a htmlbe  $reg_hiba
            //ilyenkor biros az input háttere pl: $reg_name_hiba=style ='background-color:#ff6666'....
            //értéket amit beírt megszeretnénk tartani  $reg_name_value='value='.$_POST['name'];
    //tipus=login
        //mindenadatot megkaptunk: email jelszó

        
?>
<html>
<body>

    <?= $reg_hiba?>
    <form action='' method='post'>
        Name: <input  <?= $reg_name_hiba?> type='text' name='name' <?= $reg_name_value?>><br>
        E-mail: <input type='text' name='email' <?= $reg_name_value?>><br>
        Jelszó: <input type='password' name='jelszo' <?= $reg_name_value?>><br>
        Jelszó megerősítése: <input type='password' name='jelszo2' <?= $reg_name_value?>><br>
        <input type="hidden" name="tipus" value="reg">
        <input type='submit' value='Regisztrálok'>
    </form>

    <form action='' method='post'>
        E-mail: <input type='text' name='email'><br>
        Jelszó: <input type='password' name='jelszo'><br>
        <input type="hidden" name="tipus" value="login">
    <input type='submit' value='Belépek'>
    </form>



</body>
</html>