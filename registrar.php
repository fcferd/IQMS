<?php
session_start();
if (!isset($_SESSION['fullname'])) {
    header("Location: index.php");
    exit();
}

$queueFile = 'last_queue_number.txt';

if (!file_exists($queueFile)) {
    file_put_contents($queueFile, 0);
}

$lastQueueNumber = (int)file_get_contents($queueFile);

$currentQueueNumber = $lastQueueNumber + 1;

file_put_contents($queueFile, $currentQueueNumber);

$_SESSION['queue_number'] = $currentQueueNumber;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar - Queuing System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="queue-container">
        <h2>Your Queue Number</h2>
        <div class="queue-number"><?php echo htmlspecialchars($_SESSION['queue_number']); ?></div>
        <form action="queues.php">
            <button class="check-queue-button">See Queues</button>
        </form>
    </div>

</body>
</html>
