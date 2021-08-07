<?php
    session_start();

    $config = array();
    $config["db"]["host"] = '127.0.0.1';
    $config["db"]["user"] = 'root';
    $config["db"]["pass"] = 'chemotox';
    $config["db"]["db"] = 'raktar';
    $config["db"]["collation"] = 'utf8mb4_general_ci';

    //sql csatalkozás
    include('library/class.sql.php');
    $connection = qmysql::get_connection($config["db"]);
//    $connection = new qmysql($config["db"]["host"],$config["db"]["user"],$config["db"]["pass"],$config["db"]["db"]); //qmysql osztály példányosítása

    //beléptetés
    include('library/class.users.php'); //users osztály include
    if(isset($_POST["event"]) && $_POST["event"] == 'do_login'){
        $user = new users($connection); //user osztály példányosítása
        $params = array();
        $params["loginname"] = $_POST["loginname"];
        $params["password"] = $_POST["pwd"];
        $ret = $user->do_login($params); //login metódus meghívása
        if(isset($ret["err"]) && strlen($ret["err"]) > 0){
            //sikertelen belépés
            echo $ret["err"];
        } else {
            $_SESSION["user_id"] = $ret["id"]; //ha sikeres akkor a sessionnek átadjuk
            $_SESSION["user_data"] = $ret;
        }
    }

    if(isset($_GET["logout"]) && $_GET["logout"] == 1){
        unset($_SESSION["user_id"]); //kiléptetésnél töröljük a sessiont
        unset($_SESSION["user_data"]);
        header('location: .'); //átirányítjuk hogy az URL-ből törlődjön
    //    header('location: /projekt'); //átirányítjuk hogy az URL-ből törlődjön
    }

    if(isset($_SESSION["user_id"]) && intval($_SESSION["user_id"]) > 0){
        include('includes/index.php'); //ha be van lépve akkor ezt includeoljuk
    } else {
        include('includes/login.php'); //ha nincs akkor a logint
    }
