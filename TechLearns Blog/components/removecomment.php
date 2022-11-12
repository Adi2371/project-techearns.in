<?php
require 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM comments WHERE id=$id";
    mysqli_query($db,$query);

if ($y['user_cat']=='index')
{
    header('location:../admin/index.php?managecomment');
}
else{
    header('location:../admin/user.php?managecomment');
}
}

?>