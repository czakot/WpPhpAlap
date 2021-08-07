<?php
session_start();
if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] > 0) {
    $config = array();
    $config["db"]["host"] = 'localhost';
    $config["db"]["user"] = 'root';
    $config["db"]["pass"] = '';
    $config["db"]["db"] = 'konyvek';
    include('../../library/class.sql.php');
    $connection = new qmysql($config["db"]["host"], $config["db"]["user"], $config["db"]["pass"], $config["db"]["db"]);
} else {
    echo "lépj be előbb";
    die();
}
?>