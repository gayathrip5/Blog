<header>
        <!-- logo -->
        <a href=" <?php echo BASE_URL .'/index.php'?> "class="logo">
            <h1 class="logo-text"><span>Infinty</span>Thoughts</h1>
        </a>
        <i class="fa fa-bars menu-toggle"></i>
        <!-- nav -->
        <ul class="nav">
            <li><a href=" <?php echo BASE_URL .'/index.php'?> ">Home</a></li>
            <li><a href="">About</a> </li>
            <li><a href="#">Services</a> </li>

            <?php if(isset($_SESSION['id'])): ?>
                <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                <?php echo $_SESSION['username']; ?>
                    <i class="fa fa-chevron-down" style="font-size: .8em"></i>
                </a>
             <!-- direction to Dashboard and profie -->
               <ul>
  <?php if( $_SESSION['admin']):?>
    <li><a href="<?php echo BASE_URL . '/admin/dashboard.php' ?>">Dashboard</a></li>
  <?php endif; ?>
 
                     
                    <li><a href="<?php echo BASE_URL . '/logout.php' ?>" class="logout">logout</a></li>
                </ul>
            </li>
            <?php else: ?>
            <li><a href="<?php echo BASE_URL . '/register.php' ?>">signup</a></li>
            <li><a href="<?php echo BASE_URL . '/login.php' ?>">login</a></li>
            <?php endif; ?>
        </ul>
    </header>