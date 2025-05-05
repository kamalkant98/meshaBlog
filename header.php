<?php
    require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mesha Blog</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    <link href="css/blog.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   
    <?php if (isset($_SESSION['success']) || isset($_SESSION['error'])): ?>
    <script>
    <?php
    if (isset($_SESSION['success'])) {
        echo "toastr.success('".$_SESSION['success']."');";
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        echo "toastr.error('".$_SESSION['error']."');";
        unset($_SESSION['error']);
    }
    ?>
    </script>
    <?php endif; ?>
    
</head>
<body>
    <?php
        $current_page = basename($_SERVER['PHP_SELF']);
    ?>
	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo">M</div>            
                <h1 class="text-center">Mesha Blog</h1>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item <?= ($current_page == 'index.php') ? 'active' : '' ?>"><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Blog Home
                    </a></li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="tm-nav-item <?= ($current_page == 'profile.php') ? 'active' : '' ?>"><a href="profile.php?id=1" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Profile
                    </a></li>
                    <li class="tm-nav-item  <?= ($current_page == 'post.php') ? 'active' : '' ?>"><a href="post.html" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Create Post
                    </a></li>
                    <?php endif; ?>
                    <li class="tm-nav-item <?= ($current_page == 'about.php') ? 'active' : '' ?>"><a href="about.html" class="tm-nav-link">
                        <i class="fas fa-users"></i>
                        About Xtra
                    </a></li>
                    <li class="tm-nav-item <?= ($current_page == 'contact.php') ? 'active' : '' ?>"><a href="contact.html" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Contact Us
                    </a></li>
                    <?php if (!isset($_SESSION['user_id'])): ?>
                    <li class="tm-nav-item <?= ($current_page == 'login.php') ? 'active' : '' ?>"><a href="login.php" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Login
                    </a></li>
                    <li class="tm-nav-item <?= ($current_page == 'register.php') ? 'active' : '' ?>"><a href="register.php" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Register
                    </a></li>
                    <?php else:?>
                    <li class="tm-nav-item"><a href="logout.php" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        Logout
                    </a></li>
                    <?php endif;?>

                </ul>
            </nav>
            <div class="tm-mb-65">
                <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
        </div>
    </header>
    