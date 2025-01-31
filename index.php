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
        <br>
        <div>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['is_done'] ? 'Done' : 'Pending' ?></td>
                        <td>
                            <a href="scripts/mark_done.php?id=<?= $row['id'] ?>">Done</a>
                            |
                            <a href="scripts/mark_pending.php?id=<?= $row['id'] ?>">Pending</a>
                            |
                            <a href="scripts/delete_task.php?id=<?= $row['id'] ?>">Delete</a>

                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>
