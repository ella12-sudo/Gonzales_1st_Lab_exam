<?php
session_start();
session_destroy();
header("Location: /Gonzales_Lab_Exam/index.php");
exit();
?>