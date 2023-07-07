<?php include("../../path.php");
include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create-edit posts</title>
    <!-- custom css -->
    <!-- custom css -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnm0CqbTlWIlj8LyTjo7mOUStjsKC4p0pQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1f8414b0ae.js" crossorigin="anonymous"></script>

    <!-- google fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link
        href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&family=Nunito:wght@200;300;400;500;600&display=swap"
        rel="stylesheet">

</head>

<body>
    <!-- header with nav and logo -->

    <?php include(ROOT_PATH . "/app/includes/adminHeader.php"); ?>
     
    <!-- admin page wrapper starts -->
    <div class="admin-wrapper">
        <!-- left side bar -->
        <?php include(ROOT_PATH . "/app/includes/adminSidebar.php"); ?>
        <!-- left side bar -->


        <!-- admin content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-big">Add Posts</a>
                <a href="index.php" class="btn btn-big">Manage Posts</a>
            </div>

            <div class="content">
                <h2 class="page-title">edit Post</h2>

                <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>  

          <form action="edit.php" method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?php echo $id ?>" >

              <div>
                    <label>Title</label>
                    <input type="text" name="title" value="<?php echo $title ?>" class="text-input">
                </div>

                <div>
                    <label>Body</label>
                    <textarea name="body" id="body"><?php echo $body ?></textarea>
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image" class="text-input">
                </div>
                <div>
                    <label>Topic</label>

                    <select name="topic_id" class="text-input">

                    <option value=""></option>


                    <?php foreach($topics as  $key => $topic): ?>


                      <?php if(!empty($topic_id) && $topic_id == $topic['id'] ):?>

                          <option selected value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>

                      <?php else: ?> 

                         <option  value="<?php echo $topic['id'] ?>"><?php echo $topic['name'] ?></option>

                      <?php endif; ?>
                        

                    <?php endforeach; ?>
                    
                     </select>
                </div>
                <div>

                <?php if(empty($published) && $published == 0):?>

                    <label>
                      <input type="checkbox" name="published">
                       Publish
                   </label>

               <?php else: ?> 

                <label>
                      <input type="checkbox" name="published" checked>
                       Publish
                   </label>

                <?php endif;?>   
                  
                </div>
                <div>
                    <button type="submit" name="update-post" class="btn btn-big">Update post</button>
                </div>
              </form>
            </div>
        </div>
        <!-- admin content -->
    </div>








    <!-- j query -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- ckeditor5 -->
        <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <!-- custone script -->
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>