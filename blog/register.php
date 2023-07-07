<?php include("path.php") ?>
<?php include(ROOT_PATH . "/app/controllers/users.php");
guestsOnly();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/1f8414b0ae.js" crossorigin="anonymous"></script>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&family=Nunito:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">
</head>
<body>
    <!-- header with nav and logo -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<!-- 
    form -->

    <div class="auth-content">
        <form action="register.php" method="post">
            <h2 class="form-title">register</h2>
 
            <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>

            <div>
                <label>username</label>
                <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
            </div>
            <div>
                <label>password</label>
                <input type="password" name="password" value="<?php echo $password; ?>" class="text-input">
            </div>
            <div>
                <label> password confirmation</label>
                <input type="password" name="passwordConf" value="<?php echo $passwordConf; ?>" class="text-input">
            </div>
            <div>
              
                <button type="submit" name="register-btn" class="btn btn-big">Register</button>
            </div>                                  
<p>Or <a href=" <?php echo BASE_URL .'/login.php'?> ">Sign-in</a></p>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="assets/js/scripts.js"></script>
        
</body>
</html>