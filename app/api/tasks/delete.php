<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../models/tasksModel.php';

$data = json_decode(file_get_contents("php://input"));


$tasksStmt->id = $data->id;


// update the product
if($tasksStmt->deleteTask()){

    header("HTTP/1.1 200");
    echo json_encode(array("message" => "Task was deleted."));
}

else{

    header("HTTP/1.1 503");
    echo json_encode(array("message" => "Unable to deleted task."));
}

