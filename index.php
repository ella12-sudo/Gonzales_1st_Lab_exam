<?php
include "db.php";

$message = "";

if (isset($_POST['save'])) {

    $name   = ucwords($_POST['name']);     
    $email  = strtolower($_POST['email']); 
    $course = strtoupper($_POST['course']);

    if (!empty($name) && !empty($email) && !empty($course)) {

        $sql = "INSERT INTO students (name, email, course)
                VALUES ('$name', '$email', '$course')";

        if (mysqli_query($conn, $sql)) {
            $message = "Student added successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }

    } else {
        $message = "Please fill out all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student Record</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
        }
        .container {
            width: 400px;
            margin: auto;
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
        }
        .message {
            color: green;
        }
    </style>
</head>
<body>

<?php include "nav.php"; ?>

<div class="container">
    <h2>Add Student</h2>

    <?php if ($message != "") { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Course</label>
        <input type="text" name="course" required>

        <button type="submit" name="save">Save</button>
    </form>
</div>

</body>
</html>