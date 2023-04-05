<?php
session_start();
include './env.php';
//print_r($_SESSION['old']);
$id = $_REQUEST['id'];
$query = "SELECT * FROM posts WHERE id = '$id'";
$response = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($response);
//print_r($post);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Sys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
  <!--NAVBAR STARTS-->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Add post</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./allpost.php">All post</a>
        </li>

    </div>
  </div>
</nav>
 <!--NAVBAR ENDS-->

 <!--FORM STARTS-->
 <div class="card col-lg-4 mx-auto mt-5">
    <div class="card-header bg-danger text-dark">Edit Post</div>
 <div class="card-body">
 <form action="./controller/updatepost.php" method="POST">
    <input value="<?=$post['title']?>" name="title" class="form-control mt-3" type="text" placeholder="your post title">
    <?php
    if(isset($_SESSION['form_errors']['title_error'])){
    ?>  
      <span><?= $_SESSION['form_errors']['title_error']?></span>
    <?php  
    }
    ?>
    
    
    
    
    
    
    
    <textarea name="detail" class="form-control mt-3" placeholder="your post detail"><?=$post['detail']?></textarea>
    <?php
    if(isset($_SESSION['form_errors']['detail_error'])){
    ?>  
      <span><?= $_SESSION['form_errors']['detail_error']?></span>
    <?php  
    }
    ?>
    <input type="hidden" name="id" value="<?= $post['id'] ?>">
    <input value="<?=$post['author']?>" name="author" class="form-control mt-3" type="text" placeholder="Author Name">
    <button class="btn btn-danger w-100 rounded-0 mt-3">Update post</button>
 </form>
 </div>
 </div>
 <!--FORM ENDS-->

 <div class="toast<?=isset($_SESSION['msg']) ? 'show': ''?>" style="position: absolute; right:50px;bottom:100px;" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    
    <strong class="me-auto">Post System</strong>
    <small>2 mins ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
<?= isset( $_SESSION['msg']) ? $_SESSION['msg'] : ''?>
  </div>
</div>

</body>
</html>

<?php

session_unset();

?>