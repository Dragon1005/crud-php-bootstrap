<?php
require_once 'config.php';

// $id = $_GET['id'] ?? '';

// $stmt = $pdo->prepare('DELETE FROM notes WHERE id = :id');
// $stmt->execute(['id' => $id]);


if (isset($_GET['id'])) {

    session_start();

    $_SESSION['msg'] = "Record has been deleted";
    $_SESSION['msg-type'] = "danger";




    $id = $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM notes WHERE id = :id');
    $stmt->execute(['id' => $id]);

    header("Location: index.php");
}
