<?php

//session: adatot tárolhatunk vele a szerveren.
//session azonosítóval működik
    //a szervertől kap a böngésző egy azonosítót amit a következő oldal töltéseknél jelez a szervernek
    //nekünk csak használni kell a többit a webszerver és a böngésző kezeli
//session_start(); ezzel a függvénnyel indítjuk a session-t
session_start();
// így tudunk értékeket tárolni a szerveren amig a session tart
$_SESSION['elso_session_valtozo']='első session változó értéke';
//ezt erről a domainről amig a böngészőt nem kapcsoljuk ki vagy le nem jár a session elérhetjük

//függvények a session manuális megszüntetéséhez
session_unset(); //minden session változót unsetel
session_destroy(); //megszünteti a sessiont



?>