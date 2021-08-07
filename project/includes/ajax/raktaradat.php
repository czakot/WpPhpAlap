<?php
//echo "test";
/* bejövő adatok:
    $_POST["id"]
*/
include('header.php');
$response["success"] = true;
////itt includeold és példányosítsd a raktar osztályt
include("../../library/class.raktar.php");
$raktar = new raktar($connection);

//$params["id"]-ba rakd bele a kapott id-t és hívd meg a load_item_by_id metódust
//az abból visszakapott tömb adatait tedd bele a $response tömbbe az alábbi módon
$ret = $raktar->load_item_by_id(array("id"=>$_POST["id"]));
$response["name"] = $ret["name"];
$response["azonosito"] = $ret["azonosito"];
//a $ret a visszatérési értéke a metódusnak

echo json_encode($response);
