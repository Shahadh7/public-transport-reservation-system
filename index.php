<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Public Transport Reservation System</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    </head>
    <body class="bg4">
        <section class="header-section">
            <?php include 'templates/header.php' ?>
        </section>
        <section class="content-section">
            <h1 id="landing-header">PUBLIC TRANSPORT RESERVATION SYSTEM</h1>
            <p class="para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eaque quo, quod, doloremque veritatis saepe, possimus dolorum iure tenetur illo culpa quos numquam modi? Dicta rem officiis commodi mollitia aspernatur! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla ab sint, quod sed neque et voluptates inventore nisi cupiditate eos provident soluta culpa earum tempora facilis facere, asperiores voluptatibus reiciendis?</p>
            <div style=" text-align: center;">
            <a href="/views/contact-us.php"><button id="redir-conta">Let's Talk</button></a>
            </div>
        </section>
        <section class="footer-section">
            <?php include 'templates/footer.php' ?>
        </section> 
    </body>
</html>