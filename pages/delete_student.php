<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

include '../db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM students WHERE id = $id");

header("Location: home.php");
exit();
?>