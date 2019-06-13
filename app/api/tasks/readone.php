<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
include_once '../models/tasksModel.php';

$tasksStmt->id = isset($_GET['id']) ? $_GET['id'] : die();

$teste = $tasksStmt->readOneTask();

if($tasksStmt->titulo!=null){
    // create array
    $task_arr = array(
        "id" =>  $tasksStmt->id,
        "titulo" => $tasksStmt->titulo,
        "description" => $tasksStmt->description,
        "priority" => $tasksStmt->priority,

    );

    header("HTTP/1.1 200");
    echo json_encode($task_arr);
}

else{
    header("HTTP/1.1 400");
    echo json_encode(array("message" => "Task does not exist."));
}
