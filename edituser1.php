<?php 
session_start();
include('connection.php');
if (isset($_POST['save'])) {

$userid = $_POST['user_id'];
$names = $_POST['names'];
$email=$_POST['email_address'];
$gender = $_POST['gender'];
$telephone = $_POST['telephone'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql="UPDATE users SET name='$names', email_address='$email', gender='$gender', telephone_no='$telephone', username='$username' WHERE user_id='$userid'";

$run_sql=mysqli_query($connection,$sql);
if($run_sql){
header ("location:home.php?action=settings");


}
}

elseif (isset($_POST['chngpwd']))
{
$userid = $_POST['user_id'];
$old_pass=$_POST['old_pass'];
$new_pass=$_POST['new_pass'];
$re_pass=$_POST['re_pass'];
$chg_pwd = "SELECT * FROM users WHERE user_id='$userid'";
$chg_pwd1 = mysqli_query($connection,$chg_pwd);
$chg_pwd2=mysqli_fetch_array($chg_pwd1);

$data_pwd=$chg_pwd2['password'];

if($data_pwd==$old_pass){
if($new_pass==$re_pass){
	$update_pwd="update users set password='$new_pass' where user_id='$userid'";
	$update_pwd1 = mysqli_query($connection,$update_pwd);
	echo "<script>alert('Update Sucessfully'); window.location='home.php?action=settings'</script>";
}
else{
	echo "<script>alert('Your new and Retype Password do not match'); window.location='home.php?action=settings'</script>";
}
}
else
{
echo "<script>alert('Your old password is wrong'); window.location='home.php?action=settings'</script>";
}
}
 ?>