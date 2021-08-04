<?php
    //tegyél egy hidden inputot az alábbi form-ba és nevezd el
    //ha ha a kapott hidden input értéke megvan a $_POST-ban akkor regexel ellenőrizd hogy megfelelő e a cikkszám formátuma
    //regex ellenőrzés:
        // első karakter T
        // utána évszám
        // kötőjel
        // 4 szám
    //ha rendben van akkor add át a $params-nak az értékeket
    //ha a save metódust úgy írtad meg, akkor figyelj rá hogy a $params-ban az adatbázisban levő mező nevek legyenek
    //hívd meg a save metódust, utána rakj egy header-t ami visszairányít a terméklistába
?>

<h1>Új termék létrehozása</h1>
<br>
<br>
<form action="POST" action="?menu=termek">
    Cikkszám: <input type="text" name="cikkszam" placeholder="T2021-0032">
    <br>
    <br>
    Név: <input type="text" name="name">
    <br>
    <br>
    Mennyiség: <input type="number" name="mennyiseg">
    <br>
    <br>
    Mértékegység: <select name="mertekegyseg">
        <option value="1">db</option>
        <option value="2">kg</option>
        <option value="3">l</option>
        <option value="4">g</option>
    </select>
    <br>
    <br>
    <br>
    <button>Mentés</button>
</form>
