<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
</head>

<body style="display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
    <h1 style="font-size:48px; margin-bottom:20px;">Welcome</h1>
    <img src="images/gif1.gif"> <br>
    <a href="logout.php" style="font-size:24px; text-decoration:none; color:blue;">Logout</a>
</body>

</html>