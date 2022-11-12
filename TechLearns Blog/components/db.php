<?php
session_start();
$db = mysqli_connect('localhost', 'u148060617_ankurgill6', 'Parveen@2370', 'u148060617_tech_blog') or die("Database is not connected!");
function logged_in()
{
    return isset($_SESSION['id']);
}
function confirm_logged_in()
{
    if (!logged_in()) {
?>
        <script type="text/javascript">
            window.location = "login.php";
        </script>
<?php
    }
}
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
} else {
    $session_id = $_SESSION['id'];

    $x = mysqli_query($db, "select * from users where id='$session_id'") or die('Error In Session');
    $y = mysqli_fetch_array($x);
}
?>