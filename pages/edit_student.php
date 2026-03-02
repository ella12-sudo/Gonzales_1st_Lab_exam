<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

include '../db.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$row = mysqli_fetch_assoc($result);

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET student_id='$student_id', name='$name', email='$email', course='$course' WHERE id=$id";

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
    <title>Edit Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">

    <h1>Edit Student Record</h1>

    <?php if ($error != "") { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label>ID Number</label>
        <input type="text" name="student_id" value="<?php echo $row['student_id']; ?>">

        <label>Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">

        <label>Email</label>
        <input type="text" name="email" value="<?php echo $row['email']; ?>">

        <label>Course</label>
        <input type="text" name="course" value="<?php echo $row['course']; ?>">

        <br>
        <button type="submit" class="btn btn-dark">Save Changes</button>
    </form>

</div>

<a href="/Gonzales_Lab_Exam/pages/logout.php" class="btn-logout">Logout</a>

</body>
</html>