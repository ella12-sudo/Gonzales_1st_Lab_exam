<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

include '../db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (student_id, name, email, course) VALUES ('$student_id', '$name', '$email', '$course')";

    if (mysqli_query($conn, $sql)) {
        header("Location: home.php");
        exit();
    } else {
        $error = "Something went wrong. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">

    <h1>Create Student Record</h1>

    <?php if ($error != "") { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label>ID Number</label>
        <input type="text" name="student_id">

        <label>Name</label>
        <input type="text" name="name">

        <label>Email</label>
        <input type="text" name="email">

        <label>Course</label>
        <input type="text" name="course">

        <br>
        <button type="submit" class="btn btn-dark">Add Student</button>
        <a href="home.php" class="btn-cancel">Cancel</a>
    </form>

</div>

<a href="/Gonzales_Lab_Exam/pages/logout.php" class="btn-logout">Logout</a>

</body>
</html>