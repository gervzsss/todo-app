<?php
require_once 'config.php';

if (isset($_GET['task_id']) && ctype_digit($_GET['task_id'])) {
    $task_id = intval($_GET['task_id']);
    $query = "DELETE FROM `task` WHERE `task_id` = $task_id";

    if (mysqli_query($db, $query)) {
        header("Location: index.php");
        exit();
    } else {
        die("Error deleting task: " . mysqli_error($db));
    }
}
?>