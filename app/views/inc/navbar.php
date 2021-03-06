<nav class="navbar navbar-expand-lg navbar-light bg-white text-dark  pb-3">
    <div class="container">
        <a class="navbar-brand text-dark" href="<?= URLROOT ?>"><?php echo SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active ml-md-3 mr-md-3">
                    <a class="nav-link text-dark" href="<?= URLROOT ?>">Home</a>
                </li>
                <li class="nav-item ml-md-3 mr-md-3">
                    <a class="nav-link text-dark" href="<?= URLROOT ?>/pages/pricing">Pricing</a>
                </li>
                <li class="nav-item dropdown ml-md-3 mr-md-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="">V1</a> -->
                        <!-- <a class="dropdown-item" href="">V2</a> -->
                        <div class="dropdown-divider"></div>
                        <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                    </div>
                </li>
                
                <li class="nav-item ml-md-3 mr-md-3">
                    <a class="nav-link text-dark" href="<?= URLROOT ?>/pages/about">Help</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?> <li class="nav-item active">
                    <li class="nav-item ml-md-3 mr-md-3">
                        <a class="nav-link text-dark" href="<?= URLROOT ?>/dashboard">Welcome <?= $_SESSION['user_name']; ?></a>
                    </li>
                    <li class="nav-item ml-md-3 mr-md-3">
                        <a class="nav-link text-dark" href="<?= URLROOT ?>/users/logout">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                    <a class="nav-link text-main-color pl-4 pr-4" href="<?= URLROOT ?>/users/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white btn bg-main pl-4 pr-4" href="<?= URLROOT ?>/users/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>