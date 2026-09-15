<?php
/**
 * Controlador frontal
 * Task Manager - Drymon Alfonso Benítez
 */

require_once 'config.php';
require_once 'Task.php';

$db = getConnection();
$taskModel = new Task($db);

$action = $_GET['action'] ?? 'index';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskModel->create(
                $_POST['title'] ?? '',
                $_POST['description'] ?? '',
                $_POST['status'] ?? 'pending'
            );
            header('Location: index.php');
            exit;
        }
        include 'views/task_form.php';
        break;

    case 'edit':
        if (!$id) {
            header('Location: index.php');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskModel->update(
                $id,
                $_POST['title'] ?? '',
                $_POST['description'] ?? '',
                $_POST['status'] ?? 'pending'
            );
            header('Location: index.php');
            exit;
        }
        $task = $taskModel->getById($id);
        include 'views/task_form.php';
        break;

    case 'delete':
        if ($id) {
            $taskModel->delete($id);
        }
        header('Location: index.php');
        exit;

    default:
        $tasks = $taskModel->getAll();
        $stats = $taskModel->countByStatus();
        include 'views/tasks.php';
        break;
}
