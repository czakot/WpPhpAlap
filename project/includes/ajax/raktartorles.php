<?php
/* bejövő adatok:
    $_POST["id"]
    */
include('header.php');
$response["success"] = true;
//itt includeold és példányosítsd a raktar osztályt

//hívd meg a delete metódust és add át neki az id-t

echo json_encode($response);