<?php
session_start(); // Ensure session is started
?>
<header class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/logo.png" alt="Logo" style="width: 150px; height: auto;">
        </a>

        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>

                <?php if (isset($_SESSION['userId'])) { 
                    
                    ;?>
                    <!-- User Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['user']->UserName); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>