<h1>Felhasználók</h1>
<?php
if($_SESSION["user_data"]["right_id"] == 1){
    $user = new users($connection);

    //felhasználó törlése
    if(isset($_GET["torlendo_felhasznalo_id"]) && $_GET["torlendo_felhasznalo_id"] > 0){
        if($_GET["torlendo_felhasznalo_id"] != $_SESSION["user_id"]) {
            $params = array();
            $params["user_id"] = intval($_GET["torlendo_felhasznalo_id"]);
            $ret = $user->delete($params);
            if (isset($ret["err"]) && strlen($ret["err"]) > 0) {
                echo $ret["err"];
            }
        } else {
            echo "magadat ne akard törölni!";
        }
    }

    $params = array();
    if(isset($_POST["filter_email"]) && strlen($_POST["filter_email"]) > 0){
        $params["where"] = "name LIKE '%".$_POST["filter_email"]."%'";
    }
    $userList = $user->get_list($params);
?>
<form method="POST" action="?menu=felhasznalo">
    Email cím: <input type="text" name="filter_email">
</form>
    <a href="?menu=felhmod"><i class="fas fa-edit" title="Új felhasználó létrehozása"></i></a>
<div id="list">
    <?php
        if(!empty($userList)){
            foreach($userList as $userItem){
               echo '<div class="grid-row">
                    <div>'.$userItem["name"].'</div>
                    <div>'.$userItem["email"].'</div>
                    <div>18 éves</div>
                    <div>+36 20 777 7777</div>
                    <div class="muvelet">
                        <a href="?menu=felhmod&user_id='.$userItem["id"].'"><i class="fas fa-edit"></i></a>
                        <i class="fas fa-eye"></i>
                        <a href="?menu=felhasznalo&torlendo_felhasznalo_id='.$userItem["id"].'"><i class="fas fa-trash"></i></a>
                    </div>
                </div>';
            }
        } else {
            echo '<p>Nincs találat</p>';
        }
    ?>
</div>
<?php
} else {
    echo 'nincs jogosultságod!';
}
    ?>