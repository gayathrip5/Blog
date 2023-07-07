
<header>
        <!-- logo -->
        <a class="logo" href=" <?php echo BASE_URL .'/index.php'?>">
            <h1 class="logo-text"><span>Infinty</span>Thoughts</h1>
        </a>
        <i class="fa fa-bars menu-toggle"></i>
        <!-- nav -->
        <ul class="nav">
            <?php if(isset($_SESSION['id'])): ?>

            <li>
                <!-- direction to Dashboard and profie -->
                <a href="../dashboard.php">
                    <i class="fa fa-user"></i>
              <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em"></i>
                </a>

                <ul>

                    <li><a href="<?php echo BASE_URL . "/logout.php"; ?>" class="logout">logout</a></li>
                </ul>
            </li>
<?php endif ?>
        </ul>
    </header>