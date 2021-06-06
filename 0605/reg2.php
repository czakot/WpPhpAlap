<?php

//$_POST feldolgozása
//print_r($_POST);
//külön kellene választani a regisztárció és a belépést +hidden input
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