<?php
require 'vendor/autoload.php'; 

use Picqer\Barcode\BarcodeGeneratorPNG;

$generator = new BarcodeGeneratorPNG();
$barcodeImage = 'data:image/png;base64,' . base64_encode($generator->getBarcode('123456789', $generator::TYPE_CODE_128));

echo '<img src="' . $barcodeImage . '" alt="Barcode" />';
?>
