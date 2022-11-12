
<?php require('../components/db.php');
// if (isset($_Post['login'])) {
 
//   $email=mysqli_real_escape_string($db,$_Post['email']);
//   $password=mysqli_real_escape_string($db,$_Post['pasword']);

//   $query="SELECT * FROM admin WHERE email='$email' AND password='$password'";
//   $runQuery=mysqli_query($db,$query);
//   if (mysqli_num_rows($runQuery)) {
//     $_SESSION['isUserLoggedIN']=true; 
//     $_SESSION['email']=$email; 
//     header('Location:index.php');
//    }
//    else {
//     echo"iiiiii";
//    }
// }


?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../login/style.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>Login here</h3>
	
    <div class="form-item">
		<input type="email" name="email" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="password" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
  
//   if(isset($_SESSION['isUserLoggedIn']) && $_SESSION['isUserLoggedIn'])
//   {
// 	   if ($row['user_cat']=='index')
//     {
     
         
// 		header('Location:index.php');
//     }
//     else{
// 		header('Location:user.php');
        
//     }
  
	
//   }
// 	if (isset($_POST['login']))
// 		{
			// $email = mysqli_real_escape_string($db, $_POST['email']);
			// $password = mysqli_real_escape_string($db, $_POST['password']);
			
			// $query 		= mysqli_query($db, "SELECT * FROM users WHERE  password='$password' and email='$email'");
			// $row		= mysqli_fetch_array($query);
			// $num_row 	= mysqli_num_rows($query);
// 			$_SESSION['user_cat']=$row['user_cat'];
// 			$query1 		= mysqli_query($db, "SELECT * FROM `users` WHERE `user_cat`='$row(['user_cat'])'");
// 			$row1		= mysqli_fetch_array($query1);
// 			$num_row1 	= mysqli_num_rows($query1);
// 			if ($num_row1 == 0) 
// 				{			
// 					$_SESSION['email']=$email;
// 					$_SESSION['id']=$row['id'];
					
// 				echo $num_row1 ;
				
				
// 					// header('location:index.php');


					
// 				}
// 			elseif ($num_row1>=1) 
// 				{			
// 					$_SESSION['id']=$row['id'];
// 					// header('location:index.php');
// 					// header('location:user.php');
// 					echo $num_row1 ;
					
					
// 				}
// 			else
// 				{
// 					echo "<script>alert('Incorrect email or password !');</script>";
// 				}
// 		}
if(isset($_SESSION['isUserLoggedIn'])){
    if($_SESSION['user_cat']=="user"){
      
        echo "<script>alert('user_already_logged_in !');</script>";
        header('Location:user.php');
    }
    
    if($_SESSION['user_cat']=="index"){
   
        echo "<script>alert('user_already_logged_in !');</script>";
        header('Location:index.php');
    }
    }
if(isset($_POST['login'])){
    // print_r($_POST);
//     $password = $_POST['password'];

//   $query="SELECT * FROM users WHERE email='{$_POST['email']}' AND password='$password'";
//   $run = mysqli_query($db,$query);
//   $data = mysqli_fetch_array($run);
$email = mysqli_real_escape_string($db, $_POST['email']);
			$password = mysqli_real_escape_string($db, $_POST['password']);
			
			$query 		= mysqli_query($db, "SELECT * FROM users WHERE  password='$password' and email='$email'");
			$data		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
  if($num_row >0){
  $_SESSION['isUserLoggedIn']=true;
$_SESSION['email']=$_POST['email'];
$_SESSION['id']=$data['id'];
$_SESSION['user_cat']=$data['user_cat'];

if($data['user_cat']=="user"){
    header('Location:user.php');
}

if($data['user_cat']=="index"){
    header('Location:index.php');
}

else{
	echo "<script>alert('Incorrect email or password !');</script>";

  }
  }
 else{
	echo "<script>alert('Incorrect email or password !');</script>";

  }
  
}

?>
 
  
</div>

</body>
</html>