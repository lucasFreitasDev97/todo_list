<?php
include 'database/db.php';

$dateFilter = isset($_GET['date']) ? $_GET['date'] : null;
$statusFilter = isset($_GET['status']) ? $_GET['status'] : null;

$sql = "SELECT * FROM tasks WHERE 1=1";

if ($dateFilter) {
    $sql .= " AND DATE(date) = '$dateFilter'";
}

if ($statusFilter !== null && $statusFilter !== '') {
    $sql .= " AND is_done = $statusFilter";
}

$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>To Do List</title>
</head>
<body>
<main>
    <div>
        <h1>Tasks</h1>
    </div>
    <div>
        <form action="" method="GET">
            <input type="date" name="date" id="date">
            <select name="status" id="status">
                <option value="">All</option>
                <option value="0">Pending</option>
                <option value="1">Done</option>
            </select>
            <button type="submit"><strong>Search</strong></button>
        </form>
        <br><br>
        <form action="scripts/add_task.php" method="POST">
            <div>
                <input type="text" name="title" id="title" placeholder="New Task">
                <input type="datetime-local" name="date" id="date">
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
                    <th>Date / Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['is_done'] ? 'Done' : 'Pending' ?></td>
                        <td>
                            <a href="scripts/mark_done.php?id=<?= $row['id'] ?>"><span style="color: green"><strong>✓</strong></span></a>
                            &nbsp;
                            <a href="scripts/mark_pending.php?id=<?= $row['id'] ?>"><span style="color: orange"><strong>!</strong></span></a>
                            &nbsp;
                            <a href="scripts/delete_task.php?id=<?= $row['id'] ?>"><span style="color: red"><strong>X</strong></span></a>
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
