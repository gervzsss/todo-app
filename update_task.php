<?php
require_once 'config.php';

if (isset($_GET['task_id']) && ctype_digit($_GET['task_id'])) {
    $task_id = intval($_GET['task_id']);
    $query = "UPDATE `task` SET `status` = 'Done' WHERE `task_id` = $task_id";

    if (mysqli_query($db, $query)) {
        header('Location: index.php');
        exit();
    } else {
        die("Error updating task: " . mysqli_error($db));
    }
}
?>