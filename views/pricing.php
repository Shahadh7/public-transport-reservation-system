<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body onload="getaAllPricingInfo()" class="bg2">
    <section class="header-section">
        <?php include '../templates/header.php' ?>
    </section>
    <section class="content-section">
        <h1 class="main-header">Pricing Informations</h1>
        <div class="pricing-container" id="pricing-container">
            <div class="pricing-card">
                <h2>Vehicle Name</h2>
                <h3>Vehicle type</h3>
                <p>ticket price</p>
                <p>location from to</p>
            </div>
            <div class="pricing-card">
                <h2>Vehicle Name</h2>
                <h3>Vehicle type</h3>
                <p>ticket price</p>
                <p>location from to</p>
            </div>
            <div class="pricing-card">
                <h2>Vehicle Name</h2>
                <h3>Vehicle type</h3>
                <p>ticket price</p>
                <p>location from to</p>
            </div>
            <div class="pricing-card">
                <h2>Vehicle Name</h2>
                <h3>Vehicle type</h3>
                <p>ticket price</p>
                <p>location from to</p>
            </div>
        </div>
    </section>
    <section class="footer-section">
        <?php include '../templates/footer.php' ?>
    </section> 
    <script src="../js/pricing-info.js"></script>
</body>
</html>