<?php
require 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM category WHERE id=$id";
    mysqli_query($db,$query);

if ($y['user_cat']=='index')
{
    header('location:../admin/index.php?managecategory');
}
else{
    header('location:../admin/user.php?managecategory');
}
}

?>