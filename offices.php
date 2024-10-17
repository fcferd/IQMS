<?php
session_start();
if (!isset($_SESSION['fullname'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bursar'])) {
        header("Location: bursar.php");
        exit();
    } elseif (isset($_POST['accounting'])) {
        header("Location: accounting.php");
        exit();
    } elseif (isset($_POST['registrar'])) {
        header("Location: registrar.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Office</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="offices-container">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['fullname']); ?></h2>
        <form method="POST">
            <button class="office-button" type="submit" name="bursar">Bursar's Office</button>
            <button class="office-button" type="submit" name="accounting">Accounting Office</button>
            <button class="office-button" type="submit" name="registrar">Registrar's Office</button>
        </form>
    </div>

</body>
</html>
