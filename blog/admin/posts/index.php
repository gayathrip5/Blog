<?php include("../../path.php");
include(ROOT_PATH . "/app/controllers/posts.php"); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateAdmin</title>
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
                <a href="create.php" class="btn btn-big">Add Post</a>
                <a href="index.php" class="btn btn-big">Manage Post</a>
            </div>

            <div class="content">
                <h2 class="page-title">Manage Posts</h2>
<?php include(ROOT_PATH . "/app/includes/messages.php");   ?>
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Title</th>
                        <th>author</th>
                        <th colspan="3">Action</th>
                    </thead>
                    <tbody>

                    <?php foreach ($posts as $key=>$post): ?>
                        <tr>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo $post['username']; ?></td>
                            <td><a href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></td>
                            <td><a href="edit.php?del_id=<?php echo $post['id']; ?>" class="delete">delete</a></td>
                            <?php if($post['published']): ?>
                                <td><a href="edit.php?published=0&p_id=<?php echo $post['id'] ?>" class="unpublish">unpublish</a></td>

                               <?php else: ?>    
                               <td><a href="edit.php?published=1&p_id=<?php echo $post['id'] ?>" class="publish">publish</a></td>

                             <?php endif; ?>   
                            
                        </tr>
                     <?php endforeach; ?>   
                        


                    </tbody>
                </table>
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