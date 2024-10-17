<?php
session_start();

if (isset($_SESSION['fullname'])) {
    header("Location: offices.php"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    $fullName = $_POST['fullname'];
    $_SESSION['fullname'] = $fullName; 
    header("Location: offices.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQMS - Login</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to IQMS Purisima</h1>
        </div>
        
        <div class="login-form">
            <form method="POST" action="index.php"> 
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="submit" name="login" value="Log In"> 
            </form>
        </div>
    </div>
</body>
</html>
