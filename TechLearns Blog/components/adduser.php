<?php

require('db.php');
if(isset($_POST['adduser'])){
$name=mysqli_real_escape_string($db,$_POST['full_name']);
$about=mysqli_real_escape_string($db,$_POST['about']);
$phone=mysqli_real_escape_string($db,$_POST['phone_no']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$linkedin=mysqli_real_escape_string($db,$_POST['linkedin_profile']);
$password=mysqli_real_escape_string($db,$_POST['password']);
$cpassword =mysqli_real_escape_string($db,$_POST['cpassword']);
$country=mysqli_real_escape_string($db,$_POST['country']);
$address=mysqli_real_escape_string($db,$_POST['address']);
$job=mysqli_real_escape_string($db,$_POST['job']);
$user_cat="user";
$fileName = $_FILES['image']['name'];
$fileSize = $_FILES['image']['size'];
$tmpName = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$existSql = "SELECT * FROM `users` WHERE email = '$email'";
$result = mysqli_query($db, $existSql);
$numExistRows = mysqli_num_rows($result);
if($numExistRows > 0){
 
    // $exists = true;
    // $showError = "Username Already Exists";
    
    $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
    $_SESSION['status_code'] = "error";
    header('Location:../admin/pages-register.php');  
}
// $image=mysqli_real_escape_string($db,$_POST['image']);
else{

  move_uploaded_file($tmpName, '../admin/images/'. $fileName);
  if(($password == $cpassword)){
    
$query="INSERT INTO `users` (`id`, `full_name`, `about`, `phone_no`, `email`, `linkedin_profile`, `password`, `image`, `country`, `address`, `job`, `user_cat`) VALUES (NULL, '$name', '$about', '$phone', '$email', '$linkedin', '$password', '$fileName', '$country', '$address', '$job', '$user_cat');";

if(mysqli_query($db,$query)){
    header("location:../admin/waitforapproval.php");
}
else{
    echo "user not added"; 
}
}
else{
  $_SESSION['status'] = "Password and Confirm Password Does Not Match";
  $_SESSION['status_code'] = "warning";
  header('Location:../admin/pages-register.php'); 
}
}
}
?>