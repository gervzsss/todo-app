<!DOCTYPE html>
<html lang="en">
<head>
    <title>Todo List</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <nav>
        <a class="heading" href="#">ToDo App</a>
    </nav>
    <div class="container">
        <div class="input-area">
            <form method="POST" action="add_task.php">
                <input type="text" name="task" placeholder="Write your tasks here..." required />
                <button class="btn" name="add">Add Task</button>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tasks</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'config.php';
                $query = "SELECT * FROM `task` ORDER BY `task_id` ASC";
                $result = mysqli_query($db, $query);

                if ($result) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr class='border-bottom'>";
                        echo "<td>{$count}</td>";
                        echo "<td>{$row['task']}</td>";
                        echo "<td>{$row['status']}</td>";
                        echo "<td class='action'>";

                        if ($row['status'] != "Done") {
                            echo "<a href='update_task.php?task_id={$row['task_id']}' class='btn-completed'>Complete</a>";
                        }

                        echo "<a href='delete_task.php?task_id={$row['task_id']}' class='btn-remove'>Remove</a>";
                        echo "</td></tr>";

                        $count++;
                    }
                } else {
                    echo "<tr><td colspan='4'>No tasks found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
