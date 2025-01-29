<?php
require_once 'config.php';

if (isset($_POST['add'])) {
    $task = trim($_POST['task']); // Trim to remove unnecessary spaces
    if (!empty($task)) {
        $task = mysqli_real_escape_string($db, $task); // Prevent SQL injection
        $query = "INSERT INTO `task` (`task_id`, `task`, `status`) VALUES (NULL, '$task', 'Pending')";
        
        if (mysqli_query($db, $query)) {
            header('Location: index.php');
            exit();
        } else {
            die("Error adding task: " . mysqli_error($db));
        }
    }
}
?>