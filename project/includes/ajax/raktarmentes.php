<?php
/* bejövő adatok:
    $_POST["id"]
    $_POST["name"]
    $_POST["azonosito"]
*/
include('header.php');
$response["success"] = true;
//itt includeold és példányosítsd a raktar osztályt

//itt rakd bele a postolt adatokat a params tömbbe
//hívd meg a példányon keresztül a save metódust


//itt adjuk vissza a $response változót a js-nek - ezzel nincs teendő
echo json_encode($response);