<?php
include('includes/header.php');
?>


<body>
<div id="container">

    <?php include('includes/head.php'); ?>
    <?php include('includes/menu.php'); ?>
    <main>
        <?php
        if(isset($_GET["menu"]) && $_GET["menu"] == 'konyvek'){
            include('includes/konyvek.php');
        } elseif(isset($_GET["menu"]) && $_GET["menu"] == 'szerzok') {
            include('includes/szerzok.php');
        } elseif(isset($_GET["menu"]) && $_GET["menu"] == 'felhmod') {
            include('includes/felhmod.php');
        } elseif(isset($_GET["menu"]) && $_GET["menu"] == 'konyv') {
            include('includes/konyv.php');
        } elseif(isset($_GET["menu"]) && $_GET["menu"] == 'szerzo') {
            include('includes/szerzo.php');
        } elseif(isset($_GET["menu"]) && $_GET["menu"] == 'mufajok') {
            include('includes/mufajok.php');
        } elseif(isset($_GET["menu"]) && $_GET["menu"] == 'mufaj') {
            include('includes/mufaj.php');
        } elseif(isset($_GET["menu"]) && $_GET["menu"] == 'szerzoimport') {
            include('includes/szerzoimport.php');
        } else {
            include('includes/main.php');
        }
        ?>
    </main>


</div>
</body>
</html>