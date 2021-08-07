<?php
/* bejövő adatok:
    $_POST["id"]
    $_POST["name"]
    $_POST["azonosito"]
*/
    include('header.php');
    $response["success"] = true;
//itt includeold és példányosítsd a raktar osztályt
    include('../../library/class.raktar.php');
    $raktar = new raktar($connection);

//itt rakd bele a postolt adatokat a params tömbbe
//hívd meg a példányon keresztül a save metódust
    $raktar->save(array("id"=>$_POST["id"], "name"=>$_POST["name"], "azonosito"=>$_POST["azonosito"]));

//itt adjuk vissza a $response változót a js-nek - ezzel nincs teendő
echo json_encode($response);