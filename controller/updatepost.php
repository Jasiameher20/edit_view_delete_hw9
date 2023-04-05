<?php

session_start();
include '../env.php';
$title = $_REQUEST['title'];
$detail = $_REQUEST['detail'];
$author = $_REQUEST['author'];
$id = $_REQUEST['id'];
$errors = [];

//*VALIDATION
if(empty($title)){
    $errors['title_errors'] = "Pls Fill Up Your title";
}
if(empty($detail)){
    $errors['detail_errors'] = "Pls Fill Up Your detail";
}
//print_r($errors);
 if(count($errors) > 0){
//*RETURN BACK
 $_SESSION['form_errors'] = $errors;
 header("Location: ../editpost.php?id=$id");
 }else{
 //*MOVE FORWARD

 $query = "UPDATE posts SET title='$title',detail='$detail',author='$author' WHERE id ='$id'";
 $response = mysqli_query($conn, $query);
 
 if($response){
    header("Location: ../allpost.php");
 }
 if($response){
    $_SESSION['msg'] = 'Your post has been updated!';
    header("location: ../index.php");
}
 }

 