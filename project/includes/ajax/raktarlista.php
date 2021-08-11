<?php
/* bejövő adatok:
    $_POST["filter"] - ez a szűrőből jön, ezt rakd bele a get_list where paraméterébe
*/
include('header.php');
$response["success"] = true;
//itt includeold és példányosítsd a raktar osztályt
include("../../library/class.raktar.php");
$raktar = new raktar($connection);

//táblázat fejléc
$response["htmllist"] = '
    <div class="grid-row">
        <div class="grid-double-first">
            raktár azonosító
        </div>
        <div class="grid-double-second">
            raktár neve
        </div>
        <div class="muvelet">
            Művelet
        </div>
    </div>';

//itt hívd meg a példányon keresztül a raktar osztály get_list metódusát és tedd egy $list változóba a kapott tömböt
//utána alatta a foreachben cseréld ki az azonosítót meg a raktár nevét $item["valami"]-es változóra
$params = array();
if (isset($_POST["filter"])) {
//    $params["where"] = $_POST["filter"];
    $params["where"] = " name LIKE '%".$_POST["filter"]."%'";
}
$list = $raktar->get_list($params);

if(!empty($list)){
    foreach($list as $item){
        $response["htmllist"] .= '
        <div class="grid-row">
            <div class="grid-double-first">'
                .$item["azonosito"].
            '</div>
            <div class="grid-double-second">'
                .$item["name"].
            '</div>
            <div class="muvelet">
                <a href="javascript: modify(\''.$item["id"].'\');" title="Módosítás"><i class="fas fa-edit"></i></a>
                <a href="javascript: deleteItem(\''.$item["id"].'\');" title="Törlés"><i class="fas fa-trash"></i></a>
            </div>
        </div>';
    }
}
////itt adjuk vissza a $response változót a js-nek - ezzel nincs teendő
echo json_encode($response);