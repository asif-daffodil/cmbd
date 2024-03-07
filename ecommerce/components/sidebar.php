<div class="col-md-2 text-bg-dark min-vh-100 fixed-top ">
    <!-- ecommerce admin sidebar with bootstrap 5 -->
    <div class="d-flex flex-column p-3 text-white bg-dark">
        <a href="./dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Dashboard</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="./dashboard.php" class="nav-link text-white <?= $nav->checkPage('dashboard.php') ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="./products.php" class="nav-link text-white <?= $nav->checkPage('products.php') ?>">
                    <i class="fas fa-shopping-bag"></i>
                    Products
                </a>
            </li>
            <li>
                <a href="./orders.php" class="nav-link text-white <?= $nav->checkPage('orders.php') ?>">
                    <i class="fas fa-shopping-cart"></i>
                    Orders
                </a>
            </li>
            <li>
                <a href="./customers.php" class="nav-link text-white <?= $nav->checkPage('customers.php') ?>">
                    <i class="fas fa-users"></i>
                    Customers
                </a>
            </li>
            <li>
                <a href="./settings.php" class="nav-link text-white <?= $nav->checkPage('settings.php') ?>">
                    <i class="fas fa-cogs"></i>
                    Settings
                </a>
            </li>
        </ul>
        <hr>
        <!-- go to website -->
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="./" class="nav-link text-white">
                    <i class="fas fa-globe"></i>
                    Go to website
                </a>
            </li>
        </ul>
    </div>
</div>