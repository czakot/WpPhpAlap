<?php
/* bejövő adatok:
    $_POST["id"]
*/
include('header.php');
$response["success"] = true;
//itt includeold és példányosítsd a raktar osztályt

//$params["id"]-ba rakd bele a kapott id-t és hívd meg a load_item_by_id metódust
//az abból visszakapott tömb adatait tedd bele a $response tömbbe az alábbi módon
//$response["name"] = $ret["name"];
//$response["azonosito"] = $ret["azonosito"];
//a $ret a visszatérési értéke a metódusnak

echo json_encode($response);