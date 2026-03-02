<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../index.php");
    exit();
}

include '../db.php';
include '../Student.php';

$result = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">

    <h1>Student Records</h1>

    <a href="create_student.php" class="btn-outline">Add Student +</a>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <?php
            $student = new Student(
                $row['id'],
                $row['student_id'],
                $row['name'],
                $row['email'],
                $row['course']
            );
        ?>

        <div class="card">
            <h3><?php echo $student->getFormattedName(); ?></h3>
            <p><?php echo $student->email; ?></p>
            <p><?php echo $student->student_id; ?></p>
            <p><?php echo $student->getCourse(); ?></p>

            <div class="actions">
                <a href="edit_student.php?id=<?php echo $student->id; ?>" class="edit">Edit</a>
                <a href="delete_student.php?id=<?php echo $student->id; ?>" class="delete"
                   onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
            </div>
        </div>

    <?php } ?>

</div>

<a href="/Gonzales_Lab_Exam/pages/logout.php" class="btn-logout">Logout</a>

</body>
</html>