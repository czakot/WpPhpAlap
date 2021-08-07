<?php
session_start();
if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] > 0) {

    $config = array();
    $config["db"]["host"] = '127.0.0.1';
    $config["db"]["user"] = 'root';
    $config["db"]["pass"] = 'chemotox';
    $config["db"]["db"] = 'raktar';
    $config["db"]["collation"] = 'utf8mb4_general_ci';

    include('../../library/class.sql.php');
    $connection = qmysql::get_connection($config["db"]);
//    $connection = new qmysql($config["db"]["host"], $config["db"]["user"], $config["db"]["pass"], $config["db"]["db"]);

} else {
    echo "lépj be előbb";
    die();
}
?>