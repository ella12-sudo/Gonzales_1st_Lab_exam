<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: pages/home.php");
    exit();
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION['user'] = $username;
        header("Location: pages/home.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body">

<div class="login-card">
    <h1>Welcome to Student Management System</h1>
    <p>Enter your Credentials to Login!</p>

    <?php if ($error != "") { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST" action="">
        <label>Username</label>
        <input type="text" name="username">

        <label>Password</label>
        <input type="password" name="password">

        <br>
        <button type="submit" class="btn btn-dark">Login</button>
    </form>
</div>

</body>
</html>