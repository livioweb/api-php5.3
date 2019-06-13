
<?php

include_once '../models/tasksModel.php';

$positions = $_POST['position'];
$cont=0;
foreach ($positions as $position) {

   // echo $position;die;
    $tasksStmt->id = $position;
    $tasksStmt->priority = $cont++;
    $tasksStmt->updatePriorityTask();
// update the product
  //  if ($tasksStmt->updatePriorityTask()) {


    //}
}
//var_dump($positions);
