<?php

$response = array();
$response["success"] = true;

$response["name"] = '1';
$response["lead"] = '1';
$response["genres"][] = '6';
$response["genres"][] = '6';

echo json_encode($response);
