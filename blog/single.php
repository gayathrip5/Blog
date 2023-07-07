<?php include("path.php") ?>
<?php include(ROOT_PATH . '/app/controllers/posts.php');
if(isset($_GET['id'])){
    $post = selectOne('posts',['id'=>$_GET['id']]);
  
}
$topics = selectAll('topics'); 
$posts = selectAll('posts',['published' =>1])

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title'] ?>|INFINITY</title>
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
    <!-- facebook plugin sdk
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v17.0"
        nonce="vnUyq75U"></script> -->

    <!-- header with nav and logo -->
    <?php include(ROOT_PATH . "/app/includes/header.php"); ?>
 
    <!-- page wrapper starts -->
    <div class="page-wrapper">



        <!-- CONTENT -->
        <div class="content clearfix">
            <!-- //main content wrraper starts -->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-title"><?php echo $post['title'] ?></h1>
                    <div class="post-content">
                       <?php echo html_entity_decode ($post['body']); ?>
                          
                    </div>
                </div>
            </div>


            <!-- //main content ends -->
            <!-- side bar starts -->
            <div class="sidebar single">

                <!-- facebooklink -->
                <!-- <div class="fb-page" data-href="https://www.facebook.com/powerofpositivity/" data-tabs="timeline"
                    data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
                    data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/powerofpositivity/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/powerofpositivity/">Power of Positivity</a></blockquote>
                </div> -->


                <div class="section popular">
                    <h2 class="section-title">popular</h2>

                   <?php foreach($posts as $p): ?>

                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL . '/assets/images/' . $p['image'];?>" alt="">
                        <a href="" class="title">
                            <h4><?php echo $p['title']?> <h4>
                        </a>
                    </div>
                    
                    <?php endforeach; ?>
                     
                     

                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                    <?php foreach($topics as $topic):?>

                        <li><a href="<?php echo BASE_URL . '/index.php?t_id=' .$topic['id'] . '&name=' . $topic['name']?>"><?php echo $topic['name'] ;?></a> </li>

                     <?php endforeach ;?>   
                       
                    </ul>
                </div>
            </div>


            <!-- side bar ebds -->

        </div>
        <!-- CONTENT ends -->
    </div>
    <!-- page wrapper ends -->
    <!-- footer starts -->
    <!-- rootpath is to stop error due to stepping out of folder..tootpath provides path to parent folder and check for required one -->
    
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