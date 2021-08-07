<?php
//    tegyél egy hidden inputot az alábbi form-ba és nevezd el
//    ha ha a kapott hidden input értéke megvan a $_POST-ban akkor regexel ellenőrizd hogy megfelelő e a cikkszám formátuma
//    regex ellenőrzés:
//         első karakter T
//         utána évszám
//         kötőjel
//         4 szám
//    ha rendben van akkor add át a $params-nak az értékeket
//    ha a save metódust úgy írtad meg, akkor figyelj rá hogy a $params-ban az adatbázisban levő mező nevek legyenek
//    hívd meg a save metódust, utána rakj egy header-t ami visszairányít a terméklistába
    include("library/class.termek.php");
    $termek = new termek($connection);

if (isset($_GET["event"]) && $_GET["event"] == "modify") {
    $item_to_modify = $termek->load_item_by_id($_GET["id"]);
}

if (isset($_POST["event"]) && $_POST["event"] == "save_product") {
        // todo set back regex check to the more complex, original requirement
        if (preg_match("/^T\d{1,4}$/", $_POST["cikkszam"])) {
//        if (preg_match("/^T(19[5-9][0-9]|20[0-9]{2})-\d{4}$/", $_POST["cikkszam"])) {
            $params = array("id"=>$_POST["id"],"name"=>$_POST["name"], "cikkszam"=>$_POST["cikkszam"], "mertekegyseg_id"=>$_POST["mertekegyseg"]);
            $termek->save($params);
            header("location: ?menu=termeklista");
        } else {
            $error_message = "A cikkszám nem megfelelő!";
        }
    }

if (isset($_POST["event"]) && $_POST["event"] == "cancel") {
    header('location: ?menu=termeklista');
}
?>

<h1>Új termék <?php echo isset($item_to_modify) ? "módosítása" : "létrehozása"; ?></h1>
<br>
<br>
<form method="POST" action="?menu=termek">
    <input type="hidden" name="event" id="event" value="save_product">
    <input type="hidden" name="id"
    <?php echo "value=".(isset($item_to_modify) ? $item_to_modify["id"] : "0"); ?>
    >
    Cikkszám: <input type="text" name="cikkszam" placeholder="T2021-0032"
        <?php
            if (isset($error_message)) {
                echo "value =".$_POST["cikkszam"];
            } elseif (isset($item_to_modify)) {
                echo "value =".$item_to_modify["cikkszam"];
            }
        ?>
    >
    <br>
    <?php if (isset($error_message)) {echo $error_message."<br>";} ?>
    <br>
    Név: <input type="text" name="name"
        <?php
            if (isset($error_message)) {
                echo "value =".$_POST["name"];
            } elseif (isset($item_to_modify)) {
                echo "value =".$item_to_modify["name"];
            }
        ?>
    >
    <br>
    <br>
    Mértékegység: <select name="mertekegyseg">
        <option value="1"
            <?php
                if (isset($error_message) && $_POST["mertekegyseg"] == 1 || isset($item_to_modify) && $item_to_modify["mertekegyseg_id"] == 1) {
                    echo "selected";
                }
            ?>
        >db</option>
        <option value="2"
            <?php
            if (isset($error_message) && $_POST["mertekegyseg"] == 2 || isset($item_to_modify) && $item_to_modify["mertekegyseg_id"] == 2) {
                echo "selected";
            }
            ?>
        >kg</option>
        <option value="3"
            <?php
            if (isset($error_message) && $_POST["mertekegyseg"] == 3 || isset($item_to_modify) && $item_to_modify["mertekegyseg_id"] == 3) {
                echo "selected";
            }
            ?>
        >l</option>
        <option value="4"
            <?php
            if (isset($error_message) && $_POST["mertekegyseg"] == 4 || isset($item_to_modify) && $item_to_modify["mertekegyseg_id"] == 4) {
                echo "selected";
            }
            ?>
        >g</option>
    </select>
    <br>
    <br>
    <br>
    <button type="button" onclick="$('#event').val('cancel'); submit();">Mégse</button>
    <button type="submit">Mentés</button>
</form>
