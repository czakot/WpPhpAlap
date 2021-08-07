<?php
include('header.php');
include('../../library/class.authors.php');
$authors = new authors($connection);

$params = array();
$authorList = $authors->get_list($params);

$response = array();
$response["success"] = true;

$response["authorlist"] = 'Szerző: <select class="author_id">';

if(!empty($authorList)){
    foreach($authorList as $item){
        $response["authorlist"] .= '<option value="'.$item["id"].'">'.$item["name"].'</option>';
    }
}
$response["authorlist"] .= "</select><br>";

echo json_encode($response);