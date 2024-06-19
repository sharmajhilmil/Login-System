<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'dbconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "select * from users where username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1){
$login = true;
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['username'] = $username;
header("location: home page001\home page\htmlfile.php");
}
else{
$showError = "Invalid Credentials";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
