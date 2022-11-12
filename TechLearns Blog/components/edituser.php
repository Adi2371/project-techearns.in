<?php
require('db.php');

if(isset($_POST['edituser'])){
 
$id=$_SESSION['id'];
$name=mysqli_real_escape_string($db,$_POST['full_name']);
$about=mysqli_real_escape_string($db,$_POST['about']);
$phone=mysqli_real_escape_string($db,$_POST['phone_no']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$linkedin=mysqli_real_escape_string($db,$_POST['linkedin_profile']);
$image_old = mysqli_real_escape_string($db, $_POST['image_old']);
$country=mysqli_real_escape_string($db,$_POST['country']);
$address=mysqli_real_escape_string($db,$_POST['address']);
$job=mysqli_real_escape_string($db,$_POST['job']);
$user_cat="user";
$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$tmpName = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
if($fileName != '') {
    $up= $_FILES['image']['name'];
}
else{
    $up = $image_old;
}

 
    
$query="UPDATE `users` SET `full_name` = '$name', `about` = '$about', `email` = '$email', `linkedin_profile` = '$linkedin', `image` = '$up', `country` = '$country', `address` = '$address', `job` = '$job' WHERE `users`.`id` = $id";
 $query1 =  mysqli_query($db, $query);
if ($query1) {
       
   if($_FILES['image']['name'] != '') {
       move_uploaded_file($tmpName, '../admin/images/' . $fileName);
       unlink('../admin/images/'. $image_old);
  
   }
   
}

if ($y['user_cat']=='index')
    {
        header('location:../admin/admin_profile.php');
    }
    else{
        header('location:../admin/users-profile.php');
    }

  // header('Location:../admin/pages-register.php'); 
}

?>