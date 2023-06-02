<?php

ini_set('max_execution_time', '1700');
set_time_limit(1700);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Content-Type: text/html; charset=utf-8');
http_response_code(200);

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE); //convert JSON into array

//-------------------
if ($input["num"] == NULL) {
   $result["state"] = false;
   $result["error"]["message"][] = "'num' is missing";
   echo json_encode($result);
   exit;
}
if ($input["round"] == NULL) {
  $input["round"] = 0;
}
if ($input["decimal"] == NULL) {
  $input["decimal"] = ".";
}
if ($input["thousand"] == NULL) {
  $input["thousand"] = " ";
}
$result["state"] = true;
$result["chislo"] = number_format($input["num"], $input["round"], $input["decimal"], $input["thousand"]);


//********************************

echo json_encode($result);
