
<link rel="stylesheet" href="css/style.css">

<ul>
    <li id="logo"><a href="../index.php"><p>Public Transport Reservation System</p></a></li>
    <?php if (isset($_SESSION['user_id'])) {?>
        <li><a href="#" class="nav-links" onclick="logout()">Logout</a></li>
    <?php }?>
    <li><a href="#" class="nav-links">Contact Us</a></li>
    <li><a href="#" class="nav-links">Pricing</a></li>
    <li><a href="#" class="nav-links">About Us</a></li>
    <?php if (!isset($_SESSION['user_id'])) {?>
        <li><a href="../views/login.php" class="nav-links">Login</a></li>
        <li><a href="#" class="nav-links">Register</a></li>
    <?php }?>
    
    <?php if (isset($_SESSION['user_id'])) {?>
        <li><a href="#" class="nav-links">Reservation</a></li>
        <li><a href="#" class="nav-links">Home</a></li>
    <?php }?>
</ul>
<script src="../js/auth.js"></script>
