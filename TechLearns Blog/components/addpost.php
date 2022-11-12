<?php
require('db.php');
if(isset($_POST['addpost'])){
   $ptitle=mysqli_real_escape_string($db,$_POST['post_title']);
   $pcontent=mysqli_real_escape_string($db,$_POST['post_content']);
   $cid=$_POST['post_category'];
   $description=mysqli_real_escape_string($db,$_POST['description']);
   $writter=mysqli_real_escape_string($db,$_POST['writter']);
   $writter_quotes=mysqli_real_escape_string($db,$_POST['writter_quotes']);
   $profile_image=mysqli_real_escape_string($db,$_POST['profile_image']);
   

   $query="INSERT INTO posts (title,content,category_id,description,writter,writter_quotes,profile_image) VALUES('$ptitle','$pcontent',$cid,'$description','$writter','$writter_quotes','$profile_image')";
$run=mysqli_query($db,$query);
$post_id=mysqli_insert_id($db);
echo '<PRE>';
$image_name=$_FILES['post_image']['name'];
$img_tmp=$_FILES['post_image']['tmp_name'];
print_r($image_name);
print_r($img_tmp);

foreach($image_name as $index=>$img){
    if(move_uploaded_file($img_tmp[$index],"../images/$img")){
        $query="INSERT INTO images (post_id,image) VALUES($post_id,'$img')";
$run=mysqli_query($db,$query); 
    }
}


if ($y['user_cat']=='index')
    {
        header('location:../admin/index.php?managepost');
    }
    else{
        header('location:../admin/user.php?managepost');
    }


}
?>