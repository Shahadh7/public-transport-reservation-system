<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="header-section">
        <?php include '../templates/header.php' ?>
    </section>
    <section class="content-section">
        <div class="about-div">
            <div class="map-div">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798511757687!2d79.97039103434682!3d6.914677495003806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1622264976599!5m2!1sen!2slk" width="1200" height="800" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="contact-form-div">
                <h1 class="contact-header">Contact Us</h1>
                <p>If you have questions or just want to get in touch, use the form below, We look forward to hearing from you </p>
                <div>
                    <form action="" method="post" class="contact-form">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" onkeyup="nameValidation()">
                        <span id="name-error" class="error-text"></span>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" onkeyup="emailVal()">
                        <span id="email-error" class="error-text"></span>
                        <label for="message">Message <small>(Maximum Characters: 255)</small></label>
                        <textarea id="message" name="message" rows="4" cols="40" onkeyup="messageValidation()"></textarea>
                        <span id="message-error" class="error-text"></span>
                        <button id="contact-btn" type="submit" onclick="submitForm()">Let's Talk</button>       
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="footer-section">
        <?php include '../templates/footer.php' ?>
    </section>
    <script src="../js/contact-us.js"></script> 
</body>
</html>