<?php

require_once 'config.php';


if (isset($_POST['sbmt'])) {

    session_start();

    $_SESSION['msg'] = "Record has been added";
    $_SESSION['msg-type'] = "info";

    $title = $_POST['title'];
    $specification = $_POST['specification'];

    $stmt = $pdo->prepare('INSERT INTO notes (title,specification) VALUES (:title, :specification)');
    $stmt->execute(['title' => $title, 'specification' => $specification]);




    header("Location: index.php");
    die;
}
