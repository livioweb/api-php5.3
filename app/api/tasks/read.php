<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../models/tasksModel.php';
$tasks = $tasksStmt->getTasks();

if(count($tasks)>0){
//var_dump(count($tasks));die("entrou no if");
    $tasks_arr=array();
    $tasks_arr["tasks"]=array();
    foreach ($tasks as $task){
        $task_item=array(
            "id" => $task['id'],
            "titulo" => $task['titulo'],
            "description" => html_entity_decode($task['description']),
            "priority" => $task['priority']
        );
        array_push($tasks_arr["tasks"], $task_item);
    }

    header("HTTP/1.1 200");
    echo json_encode($tasks_arr);
}else{
    header("HTTP/1.1 404");
    echo json_encode(
        array("message" => "No tasks found.")
    );
}
