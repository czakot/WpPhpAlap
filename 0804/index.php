<?php
    session_start();

    $config = array();
//    $config["db"]["host"] = 'localhost';
    $config["db"]["host"] = '127.0.0.1';
    $config["db"]["user"] = 'root';
    $config["db"]["pass"] = 'chemotox';
    $config["db"]["db"] = 'konyvek';

    $urlArr = explode("/",$_SERVER["REQUEST_URI"]);
    $config["dirname"] = $urlArr[1];

    $config["path"]["library"] = $_SERVER["DOCUMENT_ROOT"]."/0804/library";
    $config["path"]["ajax"] = $_SERVER["DOCUMENT_ROOT"]."/0804/library";

    define("USER_RIGHT_ID_ADMIN",1);
    define("USER_RIGHT_ID_FELTOLTO",2);
    define("KONYVEK","Könyvek");

    //sql csatalkozás
    include('library/class.sql.php');
    $connection = new qmysql($config["db"]["host"],$config["db"]["user"],$config["db"]["pass"],$config["db"]["db"]);
include('library/class.users.php');
if(isset($_POST["event"]) && $_POST["event"] == 'do_login'){
    //beléptetés
    $user = new users($connection);
    $params = array();
    $params["loginname"] = $_POST["loginname"];
    $params["password"] = $_POST["pwd"];
    $ret = $user->do_login($params);
    if(isset($ret["err"]) && strlen($ret["err"]) > 0){
        //sikertelen belépés
        echo $ret["err"];
    } else {
        $_SESSION["user_id"] = $ret["id"];
        $_SESSION["user_data"] = $ret;
    }
}
if(isset($_GET["logout"]) && $_GET["logout"] == 1){
    unset($_SESSION["user_id"]);
    unset($_SESSION["user_data"]);
    header('location: .');
//    header('location: /'.$config["dirname"]);
}

if(isset($_SESSION["user_id"]) && intval($_SESSION["user_id"]) > 0){
    include('includes/index.php');
} else {
    include('includes/login.php');
}
?>