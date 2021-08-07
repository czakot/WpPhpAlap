<?php
/* bejövő adatok:
    $_POST["id"]
    */
include('header.php');
$response["success"] = true;
//itt includeold és példányosítsd a raktar osztályt
include("../../library/class.raktar.php");
$raktar = new raktar($connection);

//hívd meg a delete metódust és add át neki az id-t
$raktar->delete($_POST["id"]);

echo json_encode($response);