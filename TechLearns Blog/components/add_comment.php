<?php

require('db.php');
if(isset($_POST['addcomment'])){
$name=mysqli_real_escape_string($db,$_POST['name']);
$comment=mysqli_real_escape_string($db,$_POST['comment']);
$email=mysqli_real_escape_string($db,$_POST['email']);
$post_id=$_POST['post_id'];

$query="INSERT INTO comments(name,comment,post_id,email) VALUES('$name','$comment',$post_id,'$email')";
echo $name;
if(mysqli_query($db,$query)){
    header("location:../post.php?id=$post_id");
}
else{
    echo "comment is not added!"; 
}
}
?>