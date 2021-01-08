<?php 
include('connection.php');
if (isset($_POST['save'])) {

$userid = $_POST['user_id'];
$names = $_POST['names'];
$department= $_POST['department'];
$role= $_POST['role'];
$email=$_POST['email_address'];
$gender = $_POST['gender'];
$telephone = $_POST['telephone'];
$username = $_POST['username'];

$sql="UPDATE users SET name='$names',department='$department',role='$role',email_address='$email',gender='$gender',telephone_no='$telephone',username='$username' WHERE user_id='$userid'";

$run_sql=mysqli_query($connection,$sql);
if($run_sql){
header ("location:viewuser.php?action=manageusers");


}else {
echo "<script>alert('Error! User was not updated successfully'); window.location='home.php?action=settings'</script>";
}
}
 ?>