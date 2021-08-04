<?php
    //itt includeold és példányosítsd a termékek és raktár tétel osztályt

//itt írd meg a törlés meghívása fgv-t ha van a $_GET-ben olyan változó amit a törlés iconon beállítottál

//itt hívd meg a példányon keresztül a get_list metódust és tárold el egy változóban a visszakpott értéket
//a $_POST["filter_name"] és filter_cikkszam-ban megtalálod a két szűrés értéket amiből megcsinálhatod a where feltételt a get_list metódusban

//futtass egy foreachet a kapott termék listán és csinálj belőle in stringet termek_id IN (....)
//raktár tétel osztályból kérd le az in stringet where feltételkként használva azokat a raktár tételeket amik kellenek
//rakd ezt bele egy a termék id-ra indexelt tömbbe egy foreachel úgy hogy pl: raktarTetelIndex[$item["termek_id"]][] = $item

//kérd le a mértékegységeket és rakd bele egy indexelt tömbbe
?>

<h1>Termékek</h1>

<form method="POST" action="?menu=termeklista">
    Név: <input type="text" name="filter_name">
    Cikkszám: <input type="text" name="filter_cikkszam">
    <button>Szűrés</button>
</form>
<a href="?menu=termek"><i class="fas fa-edit" title="Új Termék létrehozása"></i></a>

<div id="termek-lista">
    <?php
        //ide írd a foreachet és tedd bele az alább látható html-t, cseréld ki a szövegeket benne a tömbben kapott értékekkel
        //ne felejtsd az iconokra rátenni a megfelelő hrefet

        //raktár tételek mennyiségének összeszámolása termékenként:
        //a foreachen belül vedd ki azokat a raktár tételeket az indexelt tömbből amikre jó az index pl: $raktarTetelek = raktarTetelIndex[$item["id"]]
        //futtass ezen foreachet ha nem üres és a mennyiséget számold össze pl:
        //létrehozunk egy $mennyiseg = 0; változót a foreach előtt a termék foreachen belül
        //utána $mennyiseg += $raktarTetelItem["mennyiseg"]

        //mértékegységet pedig úgy éred, hogy pl: $mertekegysegIndex[$item["mertekegyseg_id"]]["name"]
        //ahol a $item a termék lista foreach eleme
    ?>
    <div class="grid-row">
        <div>T2021-0032</div>
        <div class="grid-double-fromtwo">Első termék</div>
        <div>3db</div>
        <div class="muvelet">
            <a href="#" title="Módosítás"><i class="fas fa-edit"></i></a>
            <a href="#" title="Törlés"><i class="fas fa-trash"></i></a>
        </div>
    </div>
</div>
