<?php
include('library/class.genres.php');
$genres = new genres($connection);
    if(isset($_POST["event"]) && $_POST["event"] == "save_genre"){
        $params = array();
        if(isset($_GET["mufaj_id"]) && $_GET["mufaj_id"] > 0){
            $params["genreData"]["id"] = $_GET["mufaj_id"];
        } else {
            $params["genreData"]["id"] = 0;
        }

        $params["genreData"]["name"] = $_POST["name"];
        $genres->save($params);
        header('location: .?menu=mufajok');
//        header('location: /'.$config["dirname"].'/?menu=mufajok');
    }

    if(isset($_GET["mufaj_id"]) && $_GET["mufaj_id"] > 0){
        $params = array();
        $params["id"] = $_GET["mufaj_id"];
        $genreData = $genres->load_item_by_id($params);
    }
?>
    <h1>Új műfaj</h1>

    <form action="" method="POST" id="urlap">
        <input type="hidden" name="event" value="save_genre">
        <label for="name">Cím:</label>
        <input type="text" name="name" id="name" value="<?php if(isset($genreData["name"])){ echo $genreData["name"]; } ?>">
        <button>Mentés</button>
    </form>

<?php
