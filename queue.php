<?php
session_start();
if (!isset($_SESSION['fullname'])) {
    header("Location: index.php");
    exit();
}

$queues = [
    "Bursar" => rand(1, 500),
    "Accounting" => rand(1, 100),
    "Registrar" => rand(1, 100)
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queues - Queuing System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="queue-container">
        <h2>Queue Status</h2>
        <div class="queue-office">Bursar: <?php echo $queues['Bursar']; ?></div>
        <div class="queue-office">Accounting: <?php echo $queues['Accounting']; ?></div>
        <div class="queue-office">Registrar: <?php echo $queues['Registrar']; ?></div>
        <form action="offices.php">
            <button class="check-queue-button">Back to Offices</button>
        </form>
    </div>

</body>
</html>
