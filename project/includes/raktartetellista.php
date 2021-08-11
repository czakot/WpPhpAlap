<?php
    //includold a raktar, termékek és raktár tételek osztályt
    //példányosítsd őket
    include("library/class.raktar.php");
    include("library/class.termek.php");
    include("library/class.raktartetel.php");
    $raktar = new raktar($connection);
    $termek = new termek($connection);
    $tetel = new raktartetel($connection);

    //hívd meg a törlési metódust ha van olyan $_GET változó amit beírtál a törlés iconra
    if (isset($_GET["event"]) && $_GET["event"] == "delete") {
        $tetel->delete($_GET["id"]);
    }

    //hívd meg a get_list metódust a raktár tétel példányon keresztül, a where-be tedd bele ha van filter_termek vagy filter_raktar a $_POST-ban, tehát ha történt szűrés
    //a visszakapott tömbön keresztül futtass egy foreach-et és rakj össze két instringet
    //az egyiket a termek_id-ból a másikat raktár id-ból
    $where = array();
    if (isset($_POST["filter_termek"]) && strlen($_POST["filter_termek"]) > 0) {
        $where[] = "termek_id = ".$_POST["filter_termek"];
    }
    if (isset($_POST["filter_raktar"]) && strlen($_POST["filter_raktar"]) > 0) {
        $where[] = "raktar_id = ".$_POST["filter_raktar"];
    }
    $tetelList = $tetel->get_list(array("where"=>implode(" AND ", $where)));

    // *********************************************************************************************************
    // *** Ha a formban a szűrőhöz a teljes listákat lehúzzuk, akkor felesleges a szűkített instringes lista ***
    // *********************************************************************************************************
//    $termek_instring = "id IN (".implode(", ", array_column($tetel_list, "termek_id")).")";
//    $raktar_instring = "id IN (".implode(", ", array_column($tetel_list, "raktar_id")).")";

    //a raktar példányodon keresztül kérd le az instring-et where feltételként használva a raktárakat
    //futtass ezen araktár listán egy foreachet és tedd bele egy, az id-jával indexelt tömbbe
    //ugyanezt csináld meg a termékekre is
//    $tmp = $raktar->get_list(array("where"=>$raktar_instring));
//    $raktar_index = array_combine(array_column($tmp, "id"), array_column($tmp, "name"));
//    $tmp = $termek->get_list(array("where"=>$termek_instring));
//    $termek_index = array_combine(array_column($tmp, "id"), array_column($tmp, "name"));

    //kérd le a teljes mértékegység listát egy sima query_array-el és rakd bele egy indexelt tömbbe
    $tmp = $connection->query_array("SELECT * FROM mertekegyseg");
    $mertekegyseg = array_combine(array_column($tmp, "id"), array_column($tmp, "name"));
?>

<h1>Készlet</h1>

<form method="POST" action="?menu=raktartetellista">
    <?php

        //kérd le a teljes termék és raktár listákat és rakd bele egy egy tömbbe
        //az alábbi két selectbe rakd bele az option-öket a két teljes tömbből
        $tmp = $raktar->get_list(array());
        $raktarIndex = array_combine(array_column($tmp, "id"), array_column($tmp, "name"));
        $tmp = $termek->get_list(array());
        $termekIndex = array_combine(array_column($tmp, "id"), array_column($tmp, "name"));
        $mertekegysegIdByTermekId = array_combine(array_column($tmp, "id"), array_column($tmp, "mertekegyseg_id"));
    ?>
    Termék: <select name="filter_termek" id="filter_termek">
        <option value=""></option>
        <?php
            foreach ($termekIndex as $key => $value)
                echo "<option value='" .$key."' "
                    .(isset($_POST["filter_termek"]) && $_POST["filter_termek"] == $key ? "selected" : "")
                    .">".$value."</option>";
        ?>
    </select>
    Raktár: <select name="filter_raktar" id="filter_raktar">
        <option value=""></option>
        <?php
            foreach ($raktarIndex as $key => $value)
                echo "<option value='" .$key."' "
                    .(isset($_POST["filter_raktar"]) && $_POST["filter_raktar"] == $key ? "selected" : "")
                    .">".$value."</option>";
            ?>
    </select>
    <button type="submit">Szűrés</button>
    <button type="button" onclick="$('#filter_termek').val(''); $('#filter_raktar').val(''); submit();">Szűrés törlése</button>
</form>
<a href="?menu=raktartetel"><i class="fas fa-edit" title="Bevételezés"></i></a>

<div id="termek-lista">
    <?php
        //futtass egy foreach-et a raktár tétel listán és töltsd ki a mezőket az alábbi html-ben
        //a termék nevét pl így éred el ha az indexelt termék tömbnek pl $termekIndex a neve:
            //$termekIndex[$item["termek_id"]]["name"]
            //mértékegység pl: $mertekegysegIndex[$termekIndex[$item["termek_id"]]["mertekegyseg_id"]]["name"]
        foreach ($tetelList as $item) {
            echo "
                <div class='grid-row'>
                <div>".$termekIndex[$item["termek_id"]]."</div>
                <div>".$raktarIndex[$item["raktar_id"]]."</div>
                <div>".$item["mennyiseg"]."</div>
                <div>".$mertekegyseg[$mertekegysegIdByTermekId[$item["termek_id"]]]."</div>
                <div class='muvelet'>
                    <a href='?menu=raktartetel&event=modify&id=".$item["id"]."' title='Módosítás'><i class='fas fa-edit'></i></a>
                    <a href='?menu=raktartetellista&event=delete&id=".$item["id"]."' title='Törlés'><i class='fas fa-trash'></i></a>
                </div>
                </div>";
        }
    ?>
</div>
