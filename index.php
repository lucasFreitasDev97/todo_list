<?php
include 'database/db.php';

$sql = 'SELECT * FROM tasks';
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>
</head>
<body>
    <main>
        <div>
            <h1>To Do List</h1>
        </div>
        <div>
            <form action="scripts/add_task.php" method="POST">
                <div>
                    <input type="text" name="title" id="title" placeholder="New Task">
                    <button type="submit"><strong>+</strong></button>
                </div>
            </form>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <?= $row['title'] ?>
                        - <a href="scripts/mark_done.php?id=<?= $row['id'] ?>">Done</a>
                        | <a href="scripts/delete_task.php?id=<?= $row['id'] ?>">Delete</a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </main>
</body>
</html>
