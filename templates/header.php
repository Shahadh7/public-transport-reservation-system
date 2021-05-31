
<link rel="stylesheet" href="css/style.css">

<ul>
    <li id="logo"><a href="../index.php"><p>Public Transport Reservation System &nbsp;&nbsp;&nbsp;&nbsp; <?php if (isset($_SESSION['user_id']) && !isset($_SESSION['type'])) { $username = ucfirst($_SESSION['username']); echo "  "."Hello!"." ".$username; }  ?></p></a></li>
    <?php if (isset($_SESSION['user_id'])) {?>
        <li><a href="#" class="nav-links" onclick="logout()">Logout</a></li>
    <?php }?>
    <li><a href="../views/contact-us.php" class="nav-links">Contact Us</a></li>
    <li><a href="../views/pricing.php" class="nav-links">Pricing</a></li>
    <?php if (!isset($_SESSION['user_id'])) {?>
        <li><a href="../views/login.php" class="nav-links">Login</a></li>
        <li><a href="../views/signup.php" class="nav-links">Sign up</a></li>
    <?php }?>
    
    <?php if (isset($_SESSION['user_id'])) {?>
        <li><a href="../views/user_profile.php" class="nav-links">Profile</a></li>
        <li><a href="../views/reservation.php" class="nav-links">Reservation</a></li>
    <?php }?>
</ul>
<script src="../js/auth.js"></script>
