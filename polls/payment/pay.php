
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Payment Page</title>
<style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f3f6;
        }

        header {
            background-color: #2874f0;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        h2 {
            margin: 0;
            text-align: center;
            font-size: 24px;
        }

        header nav {
            display: flex;
            align-items: center;
        }

        header nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        section {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .qr img{
            width: 100%;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        .button-container {
            text-align: center;
        }

        button[type="submit"] {
            background-color: #fb641b;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #e5641b;
        }

        footer {
            text-align: center;
            background: #fff;
            padding: 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer img {
            width: 100%;
            height: 100px; 
            object-fit: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        @media screen and (max-width: 600px) {
            main {
                padding: 10px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
            }

            header nav {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
<nav>
<img src="img/head.png" alt="Amanjod" width="100%" padding="1px">
</nav>
<main>
<section>
<h2>Scan QR Code to Pay</h2>
<div id="qrContainer" class="qr">
<img src="qrcodes/qr1716912972.png" class="qr" alt="QR Code">
</div>
</section>
<section>
<h2>Enter UTR Number</h2>
<form action="thanks.html" method="post">
<div class="button-container">
<input type="text" id="utr_number" name="utr_number" placeholder="Enter Your UTR No." required><br>
<button type="submit">Submit UTR</button>
</div>
</form>
</section>
<section>
<h2>Instructions for Payment</h2>
<table>
<tr>
<td>Step 1:</td>
<td>Scan the QR code using your mobile banking app.</td>
</tr>
<tr>
<td>Step 2:</td>
<td>Enter the payment amount.</td>
</tr>
<tr>
<td>Step 3:</td>
<td>Enter your UTR number in the payment details.</td>
</tr>
<tr>
<td>Step 4:</td>
<td>Complete the payment.</td>
</tr>
</table>
</section>
</main>
<footer>
<img src="img/foot.png" alt="Aman jod">
</footer>
</body>
</html>