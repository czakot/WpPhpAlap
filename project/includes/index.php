<?php
    include('includes/header.php');
?>

<body>
	<div id="container">
        <?php include('includes/head.php'); ?>
        <?php include('includes/menu.php'); ?>
        <main>
            <?php
                if(isset($_GET["menu"]) && strlen($_GET["menu"]) > 0){
                    include('includes/'.$_GET["menu"].'.php');
                } else {
                    include('includes/raktarlista.php');
//                    include('includes/main.php');
                }
                ?>
		</main>
	</div>
</body>
</html>