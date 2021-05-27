
<link rel="stylesheet" href="css/style.css">

<ul>
    <li id="logo"><a href="../index.php"><p>Public Transport Reservation System</p></a></li>
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['type'])) {?>
        <li><a href="#" class="nav-links" onclick="logout()">Logout</a></li>
    <?php }?>
</ul>
<script src="../js/auth.js"></script>
