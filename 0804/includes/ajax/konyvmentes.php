<?php
//input - POST - id, name, lead, genreArr, authorArr pl $_POST["name"];

//book osztály incl
include('header.php');
include('../../library/class.books.php');
$books = new books($connection);

$response = array();
if(isset($_POST["name"]) && strlen($_POST["name"]) > 0){
    $params = array();
    $params["bookData"]["id"] = $_POST["id"];
    $params["bookData"]["name"] = $_POST["name"];
    $params["bookData"]["lead"] = $_POST["lead"];
    $params["genreArr"] = $_POST["genreArr"];
    $params["authorArr"] = $_POST["authorArr"];
    $ret = $books->save($params);
    $response["success"] = true;
}
echo "sikeres mentés";
echo json_encode($response);
//book osztály save method

//visszatérés: json_encode-al, success ha sikeres és egy datalist - ebbe kerüljön a html lista amit meg akarsz jeleníteni
