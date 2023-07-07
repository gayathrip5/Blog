<?php include("path.php");?>
 
<?php include(ROOT_PATH . "/app/controllers/topics.php"); 
 
$posts = array();

$postsTitle ='Recent Posts';
 
 

if(isset($_GET['t_id'])){ 
    $posts =getPostsByTopicId($_GET['t_id']);
    $postsTitle ="you searched for posts under'" . $_GET['name'] . " ' ";
}
else if(isset($_POST['search-term'])){
    $postsTitle ="you searched for'" . $_POST['search-term'] . " ' ";
    $posts = searchPosts($_POST['search-term']);
}
else{
    $posts = getPublishedPosts();
} 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
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
    <!-- include header,php -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
    <!-- page wrapper starts -->
 
    <div class="page-wrapper">
        <div class="post-slider">
            <!--  post slider -->
            <h1 class="slider-title">Trending Posts</h1>
            <!-- slider button -->
            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>

            <div class="post-wrapper">

            <?php foreach ($posts as $key => $post): ?>


                <div class="post">
                    <img src="<?php echo BASE_URL . '/assets/images/' . $post['image'];?>" alt=""
                        class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?></a></h4>
                        <i class="far fa-user"><?php echo $post['username'] ?></i>
                        &nbsp;
                        <i class="far fa-calendar"><?php echo date('F D, Y', strtotime($post['created_at']))  ?></i>
                    </div>
                </div>


            <?php endforeach; ?>

                
   
 
            <!--  post slider -->
        </div>
    </div>


    <!-- recent post section -->

    <!-- CONTENT -->
    <div class="content clearfix">
        <!-- main content -->
        <div class="main-content">
            <h1 class="recent-post-title"><?php echo $postsTitle; ?></h1>

            <?php foreach ($posts as $post): ?>

                <div class="post clearfix">
                <img src="<?php echo BASE_URL . '/assets/images/' . $post['image'];?>" alt=""
                    class="post-image">
                <div class="post-preview">
                    <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title'] ?> </a></h2>
                    <i class="far fa-user"><?php echo $post['username'] ?></i>
                    &nbsp;
                    <i class="far fa-calendar"><?php echo date('F D, Y', strtotime($post['created_at']))  ?></i>

                    <p class="preview-text">
                       
                    <?php echo html_entity_decode(substr($post['body'],0,150) . '....');?>
                     
                    </p>
                    <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">read more</a>
                </div>
            </div>

           <?php endforeach; ?>
            



        </div>

        <!-- //main content -->
        <div class="sidebar">
            <div class="section search">
                <h2 class="section-title">Search</h2>
                <form action="index.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Search...">
                </form>
            </div>

            <div class="section topics">
                <h2 class="section-title">Topics</h2>
                <ul>
 
                <?php foreach($topics as $key => $topic): ?>
                    <li><a href="<?php echo BASE_URL . '/index.php?t_id=' .$topic['id'] . '&name=' . $topic['name'] ;?>"><?php echo $topic['name'];?></a> </li>
                     
                <?php endforeach; ?>
              </ul>
            </div>

        </div>

    </div>
    <!-- CONTENT -->
    <!-- footer starts -->
     <?php include(ROOT_PATH . "/app/includes/footer.php") ?>

    <!-- footer ends -->
    <!-- j query -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- slick  -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- custone script -->
    <script src="assets/js/scripts.js"></script>
</body>

</html>