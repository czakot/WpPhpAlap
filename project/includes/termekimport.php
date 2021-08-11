<?php
    //includold a termek osztályt és példányosítsd
    include("library/class.termek.php");
    $termek = new termek($connection);

    //ellenőrizd hogy van e $_POST["event"]
    if (isset($_POST["event"]) &&  $_POST["event"] == "do_import") {
        //a szerző import alapján írd meg az XML feldolgozást, a minta file-t a temp mappában megtalálod
        if(is_file($_FILES["xmlfile"]["tmp_name"])) {
            $xmlArray = simplexml_load_file($_FILES["xmlfile"]["tmp_name"]);
            if(!empty($xmlArray)){
                foreach($xmlArray->termek as $item){
                    $params = array();
                    $params["name"] = $item->nev;
                    $params["cikkszam"] = $item->cikkszam;
                    $params["mertekegyseg_id"] = $item->mertekegysegid;
                    $termek->save($params);
                }
                header('location: ?menu=termeklista');
            } else {
                $error_message = "Nem történt importálás! Fájlhiba?";
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
    Importfájl: <input type="file" name="xmlfile" accept=".xml">
    <br>
    <br>
    <br>
    <button type="button" onclick="$('#event').val('cancel'); submit();">Mégse</button>
    <button type="submit">Mentés</button>
    <br>
    <?php if (isset($error_message)) {echo $error_message."<br>";} ?>
    <br>
</form>

