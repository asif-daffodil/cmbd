<?php
require_once './classes/navbar.php';

use classes\navbar\navbar as navbar;

$nav = new navbar();

?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">CMBD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $nav->checkPage('index.php') ?>" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $nav->checkPage('about.php') ?>" href="./about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $nav->checkPage('contact.php') ?>" href="./contact.php">Contact</a>
                </li>
                <?php if (!$session->getSession('user')) {  ?>
                    <li>
                        <a class="nav-link <?= $nav->checkPage('login.php') ?>" href="./login.php">Log In</a>
                    </li>
                    <li>
                        <a class="nav-link <?= $nav->checkPage('signup.php') ?>" href="./signup.php">Create account</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- fontawesome 6 user icon -->
                            <i class="fas fa-user"></i>
                            <?= explode(" ", $session->getSession('user')['name'])[0] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./update-profile.php">Update profile</a></li>
                            <li><a class="dropdown-item" href="./change-profile-image.php">change profile image</a></li>
                            <li><a class="dropdown-item" href="./change-password.php">Change password</a></li>
                            <?php if ($session->getSingleData('user', 'role') === 'admin') { ?>
                                <li><a class="dropdown-item" href="./dashboard.php">Admin Panel</a></li>
                            <?php } ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">
                    <!-- fontawesome search icon -->
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>