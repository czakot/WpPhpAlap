<?php
include('library/class.authors.php');
$authors = new authors($connection);
    if(isset($_POST["event"]) && $_POST["event"] == "save_author"){
        $params = array();
        if(isset($_GET["szerzo_id"]) && $_GET["szerzo_id"] > 0){
            //módosítás
            $params["authorData"]["id"] = $_GET["szerzo_id"];
        } else {
            //újként
            $params["authorData"]["id"] = 0;
        }
        $params["authorData"]["name"] = $_POST["name"];
        $params["authorData"]["age"] = $_POST["age"];
        $authors->save($params);
    }

    if(isset($_GET["szerzo_id"]) && $_GET["szerzo_id"] > 0){
        $params = array();
        $params["id"] = $_GET["szerzo_id"];
        $authorData = $authors->load_item_by_id($params);
    }
?>
<h1>Új szerző</h1>

<form action="" method="POST" id="urlap">
    <input type="hidden" name="event" value="save_author">
    <label for="name">Cím:</label>
    <input type="text" name="name" id="name" value="<?php if(isset($authorData["name"])){ echo $authorData["name"]; } ?>">
    <label for="age">Kor:</label>
    <input type="text" name="age" id="age" value="<?php if(isset($authorData["age"])){ echo $authorData["age"]; } ?>">

    <button>Mentés</button>
</form>

<?php
