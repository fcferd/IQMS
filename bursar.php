<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', 'C:\xampp\php\logs\php_error_log');

session_start(); 

if (!isset($_SESSION['fullname'])) {
    header("Location: index.php");
    exit();
}

$barcodeImage = "";
$queueNumber = "";

$queueFile = 'last_queue_number.txt';

if (!file_exists($queueFile)) {
    file_put_contents($queueFile, 0);
}

$lastQueueNumber = (int)file_get_contents($queueFile);

require 'vendor/autoload.php'; 
use Picqer\Barcode\BarcodeGeneratorPNG; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['get_code'])) {
    $purpose = $_POST['purpose'];
    $amount = $_POST['amount'];

    $generator = new BarcodeGeneratorPNG();
    $barcodeImage = 'data:image/png;base64,' . base64_encode($generator->getBarcode($amount, $generator::TYPE_CODE_128));
    
    $currentQueueNumber = $lastQueueNumber + 1;

    file_put_contents($queueFile, $currentQueueNumber);

    $_SESSION['barcode'] = $barcodeImage; 
    $_SESSION['queueNumber'] = $currentQueueNumber; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bursar - Queuing System</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <div class="bursar-form">
        <h2>Bursar's Office</h2>
        <form method="POST">
            <input type="text" class="bursar-input" name="purpose" placeholder="Purpose" required>
            <input type="number" class="bursar-input" name="amount" placeholder="Amount" required>
            <button class="get-code-button" type="submit" name="get_code">Get Code</button>
        </form>
    </div>

    <?php if ($barcodeImage && $_SESSION['queueNumber']): ?>
        <div class="barcode-display">
            <h3>Your Barcode:</h3>
            <img src="<?php echo htmlspecialchars($barcodeImage); ?>" alt="Barcode">
            <p>Queue Number: <strong><?php echo htmlspecialchars($_SESSION['queueNumber']); ?></strong></p>
        </div>
        <form action="queues.php">
            <button class="queue-back-button">See Queues</button>
        </form>
    <?php endif; ?>

</body>
</html>
