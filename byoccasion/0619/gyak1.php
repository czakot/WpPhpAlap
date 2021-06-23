<?php 

/*
11:
ott egy olyan form kell aminek 3 mezője van. az egyik a páros másik a páratlan és az összeg.
ellenőrzéskor: ellenőrzöd hogy mindhárom adatot elküldték-e.
a párosra hogy páros-e, a páratlan-ra hogy páratlan-e és az összegre hogy a másik 2 összege-e
*/ 

$hiba='';
if (isset($_POST['paros']) && isset($_POST['paratlan']) && isset($_POST['osszeg'])) {
    
    if ($_POST['paros']%2!=0) {
        $hiba .='A páros nem páros';
    }
    if ($_POST['paratlan']%2!=1) {
        $hiba .='A páratlan nem páratlan';
    }
    $osszeg=$_POST['paros']+$_POST['paratlan'];
    if ($osszeg!=$_POST['osszeg']) {
        $hiba .='Az összeg nem jó';
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
        <input type='text' value='' name='paros'>
        <input type='text' value='' name='paratlan'>
        <input type='text' value='' name='osszeg'>
        <input type='submit'>
    </form>
    <div><?php echo $hiba; ?></div>
</body>
</html>