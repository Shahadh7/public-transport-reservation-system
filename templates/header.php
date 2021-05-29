
<link rel="stylesheet" href="css/style.css">

<ul>
    <li id="logo"><a href="../index.php"><p>Public Transport Reservation System</p></a></li>
    <?php if (isset($_SESSION['user_id'])) {?>
        <li><a href="#" class="nav-links" onclick="logout()">Logout</a></li>
    <?php }?>
    <li><a href="../views/contact-us.php" class="nav-links">Contact Us</a></li>
    <li><a href="../views/pricing.php" class="nav-links">Pricing</a></li>
    <?php if (!isset($_SESSION['user_id'])) {?>
        <li><a href="../views/login.php" class="nav-links">Login</a></li>
        <li><a href="../views/register.php" class="nav-links">Register</a></li>
    <?php }?>
    
    <?php if (isset($_SESSION['user_id'])) {?>
        <li><a href="../views/reservation.php" class="nav-links">Reservation</a></li>
    <?php }?>
</ul>
<script src="../js/auth.js"></script>
