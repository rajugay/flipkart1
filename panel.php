<?php
session_start();

// Define the valid access key
$validAccessKey = 'Shahilflipkart';

// Initialize message variable
$message = '';

// Check if the access key is posted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['access_key'])) {
    if ($_POST['access_key'] === $validAccessKey) {
        $_SESSION['authenticated'] = true;
    } else {
        $message = "Invalid access key.";
    }
}

// Process the UPI QR code generation and file upload if authenticated
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upi_id'])) {
    if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
        $message = "You must enter the correct access key to proceed.";
    } else {
        $upiId = $_POST['upi_id'];
        $amount = $_POST['amount'];
        $merchantId = 'merchant';
        $paymentLink = "upi://pay?pa=$upiId&pn=$merchantId&am=$amount&cu=INR";
        $encodedPaymentLink = urlencode($paymentLink);
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?data=$encodedPaymentLink&size=200x200";
        $qrCodeImage = file_get_contents($qrCodeUrl);

        if ($qrCodeImage !== false) {
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/Snake/polls/payment/qrcodes/';
            $targetFile = $targetDir . 'qr1716912972.png';

            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            if (file_put_contents($targetFile, $qrCodeImage)) {
                $message = "The QR code has been generated and uploaded successfully.";
            } else {
                $message = "There was an error uploading the QR code.";
            }
        } else {
            $message = "There was an error generating the QR code.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
        }

        input[type="text"], input[type="number"], input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #0fa;
            color: #111;
        }

        input[type="submit"] {
            cursor: pointer;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #333;
        }

        .qr-code {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        
        <?php if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true): ?>
            <form action="admin_panel.php" method="post">
                <input type="text" name="access_key" placeholder="Enter Access Key" required>
                <input type="submit" value="Submit">
            </form>
        <?php else: ?>
            <form action="admin_panel.php" method="post">
                <input type="text" name="upi_id" placeholder="Enter UPI ID" required>
                <input type="number" name="amount" placeholder="Enter Amount" value="499" required>
                <input type="submit" value="Generate and Upload QR Code">
            </form>
        <?php endif; ?>

        <?php
        if (!empty($message)) {
            echo '<div class="message">' . htmlspecialchars($message) . '</div>';
        }

        if (isset($qrCodeUrl) && !empty($qrCodeUrl)) {
            echo '<div class="qr-code"><img src="' . htmlspecialchars($qrCodeUrl) . '" alt="Generated QR Code"></div>';
        }
        ?>
    </div>
</body>
</html>