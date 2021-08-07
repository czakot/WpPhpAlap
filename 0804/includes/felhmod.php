<?php
$user = new users($connection);
    //mentés
    if(isset($_POST["event"]) && $_POST["event"] == "save_user"){
        if(isset($_GET["user_id"]) && $_GET["user_id"] > 0) {
            //módosítás
            $params = array();
            $params["userData"]["id"] = $_GET["user_id"];
            $params["userData"]["name"] = $_POST["felh_name"];
            $params["userData"]["right_id"] = $_POST["felh_right"];
            $params["userData"]["email"] = $_POST["felh_email"];
            $ret = $user->save($params);
            if (isset($ret["err"]) && strlen($ret["err"]) > 0) {
                if($ret["err"] == "sikeres módosítás"){
                    header('location: ?menu=felhasznalo');
                } else {
                    echo $ret["err"];
                }
            }
        } else {
            //új mentés
            if(strlen($_POST["felh_name"]) == 0){
                echo "Kérem, írja be a nevét.";
            } elseif(strlen($_POST["felh_pwd"]) == 0){
                echo "Kérem adjon meg jelszót.";
            } elseif($_POST["felh_pwd"] != $_POST["felh_pwd2"]){
                echo "A kér megadott jelszó nem egyezik";
            } else {
                $params = array();
                $params["userData"]["id"] = 0;
                $params["userData"]["name"] = $_POST["felh_name"];
                $params["userData"]["right_id"] = $_POST["felh_right"];
                $params["userData"]["email"] = $_POST["felh_email"];
                $params["userData"]["pwd"] = $_POST["felh_pwd"];
                $ret = $user->save($params);
                if (isset($ret["err"]) && strlen($ret["err"]) > 0) {
                    header('location: ?menu=felhasznalo');
                } else {
                    echo $ret["err"];
                }
            }
        }
    }

    if(isset($_GET["user_id"]) && $_GET["user_id"] > 0){
        $title = "Felhasználó módosítása";
        $params = array();
        $params["id"] = $_GET["user_id"];
        $userData = $user->load_item_by_id($params);
    } else {
        $title = "Új felhasználó létrehozása";
        $userData = array();
        $userData["name"] = $_POST["felh_name"];
        $userData["email"] = $_POST["felh_email"];
        $userData["right_id"] = $_POST["felh_right"];
    }
?>
<h1><?php echo $title; ?></h1>

<form action="" method="POST" id="urlap" name="">
    <input type="hidden" name="event" value="save_user">
    <label for="felh_name">Név:</label>
    <input type="text" name="felh_name" id="felh_name" value="<?php echo $userData["name"]; ?>">
    <label for="felh_email">E-mail cím:</label>
    <input type="email" name="felh_email" id="felh_email" value="<?php echo $userData["email"]; ?>">
    <label for="felh_pwd">Jelszó:</label>
    <input type="password" name="felh_pwd" id="felh_pwd">
    <label for="felh_pwd2">Jelszó újra:</label>
    <input type="password" name="felh_pwd2" id="felh_pwd2">
    <label for="felh_right">Felhasználó joga:</label>
    <select name="felh_right" id="felh_right">
        <option value="1"
            <?php
             if(isset($userData["right_id"]) && $userData["right_id"] == USER_RIGHT_ID_ADMIN){
                 echo 'selected="selected"';
             }
            ?>
        >admin</option>
        <option value="2"
            <?php
            if(isset($userData["right_id"]) && $userData["right_id"] == USER_RIGHT_ID_FELTOLTO){
                echo 'selected="selected"';
            }
            ?>
        >feltöltő</option>
    </select>

    <button>Mentés</button>
</form>

<?php
