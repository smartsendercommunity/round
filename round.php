<?php


ini_set('max_execution_time', '1700');
set_time_limit(1700);


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Content-Type: text/html; charset=utf-8');

http_response_code(200);

//********************************


    $inputJSON = file_get_contents('php://input');
    $input = json_decode($inputJSON, TRUE); //convert JSON into array

//-------------------
$chislo = $input["chislo"];
$round = $input["round"];

$random = round($chislo, $round);

$jsonAnswer['chislo'] = $random;


//********************************

echo json_encode($jsonAnswer);