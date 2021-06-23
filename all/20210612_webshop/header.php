<?php 

$menu_tomb[]=array('menu_neve'=>'Főoldal','menu_file'=>'index.php');
$menu_tomb[]=array('menu_neve'=>'Termékek','menu_file'=>'termekek.php');
$menu_tomb[]=array('menu_neve'=>'Admin','menu_file'=>'admin.php');
$menu_tomb[]=array('menu_neve'=>'Kosár','menu_file'=>'kosar.php');
$menu_tomb[]=array('menu_neve'=>'Belépés','menu_file'=>'login.php');

/*print_r($menu_tomb);
print_r($menu_tomb[2]);
print_r($menu_tomb[2]['menu_neve']);*/

$menu_html='';
foreach ($menu_tomb as $key => $menu_adatok) {

    $menu_html .='
                <li>
                    <a href="'.$menu_adatok['menu_file'].'">
                        '.$menu_tomb[$key]['menu_neve'].'
                    </a>
                </li>
    
                ';
}


?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Lang" content="hu">
<meta name="author" content="">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<title>HTML+CSS képzés - webáruház Adatmódosítás</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="js/adatmodositas.js"></script>
</head>
<body>

<div id="header">
    <div class="logo">
        <a href="fooldal.html">
            <img src="images/php_pluss_logo.png" alt="Plüssjátékok webshop" title="Plüssjátékok webshop" />
        </a>
    </div>
    <div class="nav">
        <a href="javascript:;" class="mobilnav" onclick="show_menu()">
            <img src="images/icon_mobilnav.png" alt="Menü" />
        </a>
        <ul class="navul">
         
            <?php echo $menu_html ?>
            
        </ul>
    </div>
    <div class="basket">
        <a class="basket_icon" href="#" title="Kosár">
            <span class="hidetext">Kosár</span>
        </a>
    </div>
</div>