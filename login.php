<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
 ?>

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title>PMS | Login</title>
  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="css/main.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: #FBFBFB">
  <div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <p class="tip"><center><h2 class="page-header" style="color: grey">PMS | Care</h2></center></p>
      <br>
    </div>
  </div>


<!-- Material form login -->

    
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="panel panel-default" style="margin-right: 360px; margin-left: 360px; border-width: 1px; height: 430px">
        <div class="" style="margin-right: 60px; margin-left: 60px; border-width: 2px" >
        
          <form method="post">
            <br>
            <p>&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;</p>

            <center><img src="tools/care2.jpg" style="height: 90px"></center>
            <br>
            <p>&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;&nbsp;
            &nbsp;</p>
            <input type="text" name="username" id="defaultFormLoginEmailEx" class="form-control" placeholder="Username" style="background-color: transparent;height:45px;border-color: orange">
            <br>
            <input type="password" name="password" id="defaultFormLoginPasswordEx" class="form-control" placeholder="Password" style="background-color: transparent;height:45px;border-color: orange;">
            <br>
            <center><button  type="submit" name="login" class="btn btn-default" style="border-radius: 40px; background-color: orange;width: 180px; height: 40px">LOGIN</button></center>
            <br>
          
        </form>
        </div>
        <?php
            //session_start();
            
            if (isset($_POST['login'])){ 
            
            include_once("connection.php");
            $username=$_POST['username'];
            $password=$_POST['password'];

            $uselect = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($connection,$uselect); 
              $rows = mysqli_num_rows($result);
              $fetchdata=mysqli_fetch_array($result); 
              if($rows){
              session_start();
              //session_register("user_id", "username");  
              $_SESSION['user_id']=$_POST['username'];
              $_SESSION['password'] = $_POST['password'];
              header("location:home.php?action=projectanalytics");

            }else if($username =="" || $password ==""){
            echo '<p style="text-align:center"><font color="red" size="-1" >You forgot to fill all the fields </font></p>';
            }
            
            else{
            echo '<p style="text-align:center"><font color="red" size="-1" >Wrong username or password! Try again</font></p>';
            }
          }
        ?>
        </div>
        
        
      </div> 
      </div>
    </div>
    
  </div>
  </div>                   
</body>

</html>


