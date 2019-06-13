<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../models/tasksModel.php';

$data = (object)json_decode(file_get_contents("php://input"));

// var_dump($data->tasks[0]);die("create tasks");

#AQUI PODERIAMOS CRIAR UM FOREACH PRA PEGAR MAIS DE UMA TASKS ENVIADA

if (
    !empty($data->tasks[0]->titulo) &&
    !empty($data->tasks[0]->description) &&
    !empty($data->tasks[0]->priority)
) {

    $tasksStmt->titulo = $data->tasks[0]->titulo;
    $tasksStmt->description = $data->tasks[0]->description;
    $tasksStmt->priority = $data->tasks[0]->priority;
    if($tasksStmt->createTasks()){
        header("HTTP/1.1 201");
        echo json_encode(array("message" => "Task was created."));
    }

} else {

    header("HTTP/1.1 400");
    echo json_encode(array("message" => "Unable to create taks. Data is incomplete."));
}
