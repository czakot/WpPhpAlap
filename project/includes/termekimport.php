<?php
    //includold a termek osztályt és példányosítsd
    include("../library/class.termek.php");
    $termek = new raktar($connection);

    //ellenőrizd hogy van e $_POST["event"]
    if (isset($_POST["event"]) &&  $_POST["event"] == "do_import")) {
        //a szerző import alapján írd meg az XML feldolgozást, a minta file-t a temp mappában megtalálod
        //echo $_FILES["importfile"]["tmp_name"];
        if(is_file($_FILES["importfile"]["tmp_name"])) {
            $xmlcontent = file_get_contents($_FILES["importfile"]["tmp_name"]);
            $xmlArr = simplexml_load_string($xmlcontent);
            //$xmlArr = simplexml_load_file($_FILES["importfile"]["tmp_name"]);
            if(!empty($xmlArr)){
                foreach($xmlArr->szerzo as $item){
                    $params = array();
                    $params["authorData"]["name"] = $item->nev;
                    $params["authorData"]["age"] = $item->kor;
                    $authors->save($params);
                }
            }
        }
    }

    if (isset($_POST["event"]) && $_POST["event"] == "cancel") {
        header('location: ?menu=termeklista');
    }
?>

<h1>Termékimport</h1>
<br>
<br>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="event" id="event" value="do_import">
    Importfájl: <input type="file" name="termekimportfile">
    <br>
    <br>
    <br>
    <button type="button" onclick="$('#event').val('cancel); submit();">Mégse</button>
    <button type="submit">Mentés</button>
</form>

