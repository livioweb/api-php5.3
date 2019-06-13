<?php

include_once '../models/tasksModel.php';

$tasks = $tasksStmt->getTasks();
?>
<!DOCTYPE html>
<html>
<head>
    <title>DragDrop and delete task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<div class="container">
    <h3 class="text-center">DragDrop and delete task</h3>
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Descriptio</th>
        </tr>
        <tbody class="row_position">
        <?php
        foreach ($tasks as $task) {
            ?>
            <tr id="<?php echo $task['id'] ?>">
                <td><?php echo $task['id'] ?></td>
                <td><?php echo $task['titulo'] ?></td>
                <td><?php echo $task['description'] ?></td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
</div> <!-- container / end -->
</body>
<script type="text/javascript">
    $(".row_position").sortable({
        delay: 150,
        stop: function () {
            var selectedData = new Array();
            $('.row_position>tr').each(function () {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });

    function updateOrder(data) {
        $.ajax({
            url: "updatePriority.php",
            type: 'post',
            data: {position: data},
            success: function (d) {
                alert('A Prioridade foi Atualizada');
            }
        })
    }
</script>
</html>
