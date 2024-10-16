<h1>Todo List</h1>

<form method="post" action="/" id="todo-form">
    <input type="text" name="new_task" placeholder="Enter a new task" required>
    <button type="submit">Add Task</button>
</form>

<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['new_task']) && !empty($_POST['new_task'])) {
        $_SESSION['tasks'][] = $_POST['new_task'];
    } elseif (isset($_POST['delete_task'])) {
        $index = $_POST['delete_task'];
        if (isset($_SESSION['tasks'][$index])) {
            unset($_SESSION['tasks'][$index]);
            $_SESSION['tasks'] = array_values($_SESSION['tasks']);
        }
    }
}
?>

<ul>
    <?php foreach ($_SESSION['tasks'] as $index => $task): ?>
        <li>
            <?php echo htmlspecialchars($task); ?>
            <form method="post" action="" style="display: inline;">
                <input type="hidden" name="delete_task" value="<?php echo $index; ?>">
                <button type="submit" class="delete-btn">Delete</button>
            </form>
        </li>
    <?php endforeach; ?>
</ul>