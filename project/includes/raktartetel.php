<?php
    //includold mindhárom osztályt amit csináltál
    //példányosítsd őket

    //kérd le a teljes termék és raktár listát és rakd bele egy - egy tömbbe
    //ezen a két tömbbön majd futtass foreach a selectekbe hogy feltöltsd őket

    //ha a $_POST["event"] == "save_raktartetel" akkor add át a kapott értékeket a $_POST-ból egy $params tömbbnek és hívd meg a raktár tétel példányon keresztül a save metódust
    //rakj egy header átirányítást a raktár tétel listára
?>

<h1>Bevételezés</h1>
<br>
<br>
<form action="POST" action="?menu=raktartetel">
    <input type="hidden" name="event" value="save_raktartetel">
    Termék: <select name="termek">
        <option value="1">Első termék</option>
        <option value="2">Második termék</option>
        <option value="3">Harmadik termék</option>
    </select>
    <br>
    <br>
    Raktár: <select name="raktar">
        <option value="1">1-es raktár</option>
        <option value="2">2-es raktár</option>
        <option value="3">Magasraktár</option>
    </select>
    <br>
    <br>
    Mennyiség: <input type="number" name="mennyiseg">
    <br>
    <br>
    <br>
    <button>Mentés</button>
</form>

