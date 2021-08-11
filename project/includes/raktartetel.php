<?php
    //includold mindhárom osztályt amit csináltál
    //példányosítsd őket
    include("library/class.raktar.php");
    include("library/class.termek.php");
    include("library/class.raktartetel.php");
    $raktar = new raktar($connection);
    $termek = new termek($connection);
    $tetel = new raktartetel($connection);

    if (isset($_GET["event"]) && $_GET["event"] == "modify") {
        $item_to_modify = $tetel->load_item_by_id($_GET["id"]);
    }

    //kérd le a teljes termék és raktár listát és rakd bele egy - egy tömbbe
    //ezen a két tömbbön majd futtass foreach a selectekbe hogy feltöltsd őket
    $termek_list = $termek->get_list(array());
    $raktar_list = $raktar->get_list(array());

    //ha a $_POST["event"] == "save_raktartetel" akkor add át a kapott értékeket a $_POST-ból egy $params tömbbnek és hívd meg a raktár tétel példányon keresztül a save metódust
    //rakj egy header átirányítást a raktár tétel listára
    if (isset($_POST["event"])) {
        switch ($_POST["event"]) {
            case "save_raktartetel":
                $params = array("id" => $_POST["id"], "raktar_id" => $_POST["raktar"], "termek_id" => $_POST["termek"], "mennyiseg" => $_POST["mennyiseg"]);
                $tetel->save($params);
                break;
            case "cancel":
                break;
        }
        header('location: ?menu=raktartetellista');
    }
    $tmp = $connection->query_array("SELECT * FROM mertekegyseg");
    $mertekegyseg = array_combine(array_column($tmp, "id"), array_column($tmp, "name"));
?>

<h1><?php echo isset($item_to_modify) ? "Készlet módosítása" : "Bevételezés"; ?></h1>
<br>
<br>
<form method="POST" action="?menu=raktartetel">
    <input type="hidden" name="event" id="event" value="save_raktartetel">
    <input type="hidden" name="id"
        <?php echo "value=".(isset($item_to_modify) ? $item_to_modify["id"] : "0"); ?>
    >
    Termék: <select name="termek">
        <?php
            foreach ($termek_list as $item)
            echo "<option value='".$item["id"]."' "
                .(isset($item_to_modify) && $item_to_modify["termek_id"] == $item["id"] ? "selected" : "")
                .">".$item["name"]." [Mértékegysége: ".$mertekegyseg[$item["mertekegyseg_id"]]."]</option>";
        ?>
    </select>
    <br>
    <br>
    Raktár: <select name="raktar">
        <?php
        foreach ($raktar_list as $item)
            echo "<option value='".$item["id"]."' "
            .(isset($item_to_modify) && $item_to_modify["raktar_id"] == $item["id"] ? "selected" : "")
            .">".$item["name"]."</option>";
        ?>
    </select>
    <br>
    <br>
    Mennyiség: <input type="number" name="mennyiseg"
    <?php if (isset($item_to_modify)) {echo "value ='".$item_to_modify["mennyiseg"]."'";} ?>
    >
    <br>
    <br>
    <br>
    <button type="button" onclick="$('#event').val('cancel'); submit();">Mégse</button>
    <button type="submit">Mentés</button>
</form>

