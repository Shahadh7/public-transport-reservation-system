
<link rel="stylesheet" href="css/style.css">

<ul>
    <li id="logo"><a href="../index.php"><p>Public Transport Reservation System &nbsp;&nbsp;&nbsp;&nbsp; <?php if (isset($_SESSION['type'])) { $username = ucfirst($_SESSION['type']); echo "  "."Hello!"." ".$username; }  ?></p></a></li>
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['type'])) {?>
        <li><a href="#" class="nav-links" onclick="logout()">Sign out</a></li>
    <?php }?>
</ul>
<script src="../js/auth.js"></script>
