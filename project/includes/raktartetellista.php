<?php
    //includold a raktar, termékek és raktár tételek osztályt
    //példányosítsd őket

    //hívd meg a törlési metódust ha van olyan $_GET változó amit beírtál a törlés iconra

    //hívd meg a get_list metódust a raktár tétel példányon keresztül, a where-be tedd bele ha van filter_termek vagy filter_raktar a $_POST-ban, tehát ha történt szűrés
    //a visszakapott tömbön keresztül futtass egy foreach-et és rakj össze két instringet
    //az egyiket a termek_id-ból a másikat raktár id-ból

    //a raktar példányodon keresztül kérd le az instring-et where feltételként használva a raktárakat
    //futtass ezen araktár listán egy foreachet és tedd bele egy, az id-jával indexelt tömbbe
    //ugyanezt csináld meg a termékekre is

    //kérd le a teljes mértékegység listát egy sima query_array-el és rakd bele egy indexelt tömbbe
?>

<h1>Készlet</h1>

<form method="POST" action="?menu=raktartetellista">
    <?php
        //kérd le a teljes termék és raktár listákat és rakd bele egy egy tömbbe
        //az alábbi két selectbe rakd bele az option-öket a két teljes tömbből
    ?>
    Termék: <select name="filter_termek">
        <option value=""></option>
        <option value="1">Első termék</option>
        <option value="2">Második termék</option>
        <option value="3">Harmadik termék</option>
    </select>
    Raktár: <select name="filter_raktar">
        <option value=""></option>
        <option value="1">1-es raktár</option>
        <option value="2">2-es raktár</option>
        <option value="3">Magasraktár</option>
    </select>
    <button>Szűrés</button>
</form>
<a href="?menu=raktartetel"><i class="fas fa-edit" title="Bevételezés"></i></a>

<div id="termek-lista">
    <?php
        //futtass egy foreach-et a raktár tétel listán és töltsd ki a mezőket az alábbi html-ben
        //a termék nevét pl így éred el ha az indexelt termék tömbnek pl $termekIndex a neve:
            //$termekIndex[$item["termek_id"]]["name"]
            //mértékegység pl: $mertekegysegIndex[$termekIndex[$item["termek_id"]]["mertekegyseg_id"]]["name"]
    ?>
    <div class="grid-row">
        <div>Első termék</div>
        <div>2-es raktár</div>
        <div>2</div>
        <div>db</div>
        <div class="muvelet">
            <a href="#" title="Módosítás"><i class="fas fa-edit"></i></a>
            <a href="#" title="Törlés"><i class="fas fa-trash"></i></a>
        </div>
    </div>
</div>
