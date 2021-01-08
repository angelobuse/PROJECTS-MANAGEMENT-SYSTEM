<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();
if(empty($_SESSION['user_id']) OR empty($_SESSION['password']) ) {  
  
header('Location: index.php?login=access_denied' );
}?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Lockscreen | Care</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link href="css/main.css" type="text/css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    	<link type="text/css" href="css/style.css" rel="stylesheet">
  		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
      	<script type="text/javascript" src="js/bootstrap.min.js"></script>
       	<script type="text/javascript" src="js/zingchart.min.js"></script>

</head>
<body>
<!-- WRAPPER -->
	<div id="wrapper">
		<div class="container" style="padding-top: 150px">
			<div class="row">
				<div class="col-sm-12">
					<center>
						<div class="well" style="height: 350px;width: 600px; background-color: #ffffff ">
							<div class="content">
								<img src="tools/care2.jpg" style="height: 60px">
								<br><br>
									<?php 
		  							 $user_id=$_SESSION['user_id'];
		  							 $uselect = "SELECT * FROM users WHERE username='$user_id'";
							         $result = mysqli_query($connection,$uselect); 
							         $rows = mysqli_num_rows($result);
							         $fetchdata=mysqli_fetch_array($result);
							         $pic=$fetchdata['userimg'];
							         $Name=$fetchdata['name'];
							         if ($rows==1 and $pic=="") {
							         	echo "<img src='tools/user2.jpg' style='  width: 70px; margin-left: auto;margin-right: auto;  border-radius: 50%; '>";
							         }
							         else{
							         	echo "<img src='tools/profileimgs/".$fetchdata['userimg']."'  alt='User Profile Picture' style=' height: 90px; width: 90px; margin-left: auto;margin-right: auto;  border-radius: 50%; '>";
							         } 
							         echo "<br>";
							         
							         echo "<h4>";
							         echo "$Name";
							         echo "</4>";  
				  					?>
				  					<br><br>
				  					<div class="input-group" style="width: 310px">
				  						<form method="post">
										<span class="input-group-btn"><input type="password" class="form-control" name="pwd" placeholder="Enter your password ..." style="-moz-box-shadow: none;-webkit-box-shadow: none;box-shadow: none;-webkit-border-radius: 2px;-moz-border-radius: 2px; border-radius: 2px; background-color: #f9f9f9; border-color: #dadada; color: #777; }"><button type="submit" name="lock" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-right"></span></button></span>
										</form>
										<?php

							            //session_start();
							            
							            if (isset($_POST['lock'])){ 
							            $user_id=$_SESSION['user_id'];
							            $password=$_POST['pwd'];

							            $uselect = "SELECT * FROM users WHERE username='$user_id' AND password='$password'";
							            $result = mysqli_query($connection,$uselect); 
							              $rows = mysqli_num_rows($result);
							              $fetchdata=mysqli_fetch_array($result); 
							              if($rows){
							              $_SESSION['password'] = $_POST['pwd'];
							              header("location:home.php?action=projectanalytics");

							            }else if($password ==""){
							            echo '<p style="text-align:center"><font color="red" size="-1" >You forgot to fill your password </font></p>';
							            }
							            
							            else{
							            echo '<p style="text-align:center"><font color="red" size="-1" >Wrong password! Try again</font></p>';
							            }
							          	}
							     
										?>
									</div>
							</div>
						</div>
					</center>
				</div>
			</div>	
		</div>
		
	</div>
	<!-- END WRAPPER -->
</body>
</html>