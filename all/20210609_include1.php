<?php
//include másik fájl tartalmát használjuk
//require //ha nem találja a fájlt akkor hibát(fatal_error) megáll a futás
//include //ha nem találja a fájlt akkor csak figyelmeztet warning

//include 'elso_include.php';
//include 'mappa1/masodik_include.php';
//include $_SERVER['DOCUMENT_ROOT'].'/kepzes/0609_raw/mappa1/masodik_include.php';
//include __DIR__.'/mappa1/masodik_include.php';
echo __DIR__;
//include 'http://www.example.com/file.php'; //lehetne így is de alapbeállíátsként nincs engedélyezve

//echo $includeban_valtozo;

?>