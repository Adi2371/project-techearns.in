<?php 

require('../components/db.php');

if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
  header("location: index.php");
  exit();
}
$session_id=$_SESSION['id'];

$result=mysqli_query($db, "select * from admin where id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper"> 
    <center><h3>Welcome: <?php echo $row['full_name']; ?> </h3></center>
	 <div class="reminder">
    <p><a href="logout.php">Log out</a></p>
  </div>
</div>

</body>
</html>