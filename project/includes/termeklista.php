<?php
    //itt includeold és példányosítsd a termékek és raktár tétel osztályt
    include("library/class.termek.php");
    $termek = new termek($connection);
    include("library/class.raktartetel.php");
    $tetel = new raktartetel($connection);

    //itt írd meg a törlés meghívása fgv-t ha van a $_GET-ben olyan változó amit a törlés iconon beállítottál
    if (isset($_GET["event"]) && $_GET["event"] == "delete") {
        $termek->delete($_GET["id"]);
    }

    //itt hívd meg a példányon keresztül a get_list metódust és tárold el egy változóban a visszakpott értéket
    //a $_POST["filter_name"] és filter_cikkszam-ban megtalálod a két szűrés értéket amiből megcsinálhatod a where feltételt a get_list metódusban
    $where = array();
    if (isset($_POST["filter_name"]) && strlen($_POST["filter_name"]) > 0) {
        $where[] = "name LIKE '%".$_POST["filter_name"]."%'";
    };
    if (isset($_POST["filter_cikkszam"]) && strlen($_POST["filter_cikkszam"]) > 0) {
        $where[] = "cikkszam LIKE '%".$_POST["filter_cikkszam"]."%'";
    };
    $termekList = $termek->get_list(array("where"=>implode(" AND ", $where)));

    //futtass egy foreachet a kapott termék listán és csinálj belőle in stringet termek_id IN (....)
    //raktár tétel osztályból kérd le az in stringet where feltételkként használva azokat a raktár tételeket amik kellenek
    //rakd ezt bele egy a termék id-ra indexelt tömbbe egy foreachel úgy hogy pl: raktarTetelIndex[$item["termek_id"]][] = $item
    $termekIdArray = array_column($termekList, "id");
    $termekInstring = count($termekIdArray) > 0 ? "termek_id IN (".implode(", ", $termekIdArray).")" : "";
    $tetelList = $tetel->get_list(array("where"=>$termekInstring));

    //kérd le a mértékegységeket és rakd bele egy indexelt tömbbe
    $tmp = $connection->query_array("SELECT * FROM mertekegyseg");
    $mertekegyseg = array_combine(array_column($tmp, "id"), array_column($tmp, "name"));
?>

<h1>Termékek</h1>

<form method="POST" action="?menu=termeklista">
    Cikkszám: <input type="text" name="filter_cikkszam" id="filter_cikkszam" value=<?= isset($_POST["filter_cikkszam"]) ? $_POST["filter_cikkszam"] : ''; ?>>
    Név: <input type="text" name="filter_name" id="filter_name" value=<?= isset($_POST["filter_name"]) ? $_POST["filter_name"] : ''; ?>>
    <button type="submit">Szűrés</button>
    <button type="button" onclick="$('#filter_name').val(''); $('#filter_cikkszam').val(''); submit();">Szűrés törlése</button>
</form>

<div class="above-below_gap">
    <a href="?menu=termek"><i class="fas fa-edit" title="Új Termék létrehozása"></i>Új Termék létrehozása</a>
    <a href="?menu=termekimport" class="before-gap"><i class="fas fa-edit" title="Termékek importja fájlból"></i>Termékek importja fájlból</a>
</div>

<div id="termek-lista">
    <?php
        //ide írd a foreachet és tedd bele az alább látható html-t, cseréld ki a szövegeket benne a tömbben kapott értékekkel
        //ne felejtsd az iconokra rátenni a megfelelő hrefet
        if (!empty($termekList)) {
            foreach ($termekList as $item) {
                $mennyiseg = 0;
                foreach ($tetelList as $tetelItem) {
                    if ($tetelItem["termek_id"] == $item["id"]) {
                        $mennyiseg += $tetelItem["mennyiseg"];
                    }
                }
                echo ('
                   <div class="grid-row">
                        <div>'.$item["cikkszam"].'</div>
                        <div class="grid-double-fromtwo">'.$item["name"].'</div>
                        <div>'.$mennyiseg.' '.$mertekegyseg[$item["mertekegyseg_id"]].'</div>
                        <div class="muvelet">
                            <a href="?menu=termek&event=modify&id='.$item["id"].'" title="Módosítás"><i class="fas fa-edit"></i></a>
                            <a href="?menu=termeklista&event=delete&id='.$item["id"].'" title="Törlés"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>

                ');
            }
        }

        //raktár tételek mennyiségének összeszámolása termékenként:
        //a foreachen belül vedd ki azokat a raktár tételeket az indexelt tömbből amikre jó az index pl: $raktarTetelek = raktarTetelIndex[$item["id"]]
        //futtass ezen foreachet ha nem üres és a mennyiséget számold össze pl:
        //létrehozunk egy $mennyiseg = 0; változót a foreach előtt a termék foreachen belül
        //utána $mennyiseg += $raktarTetelItem["mennyiseg"]

        //mértékegységet pedig úgy éred, hogy pl: $mertekegysegIndex[$item["mertekegyseg_id"]]["name"]
        //ahol a $item a termék lista foreach eleme
    ?>
</div>
