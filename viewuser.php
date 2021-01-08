
<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();
if(empty($_SESSION['user_id']) OR empty($_SESSION['password']) ) {  
  
header('Location: index.php?login=access_denied' );
}
?>



<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>PMS | Care</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
		<link href="css/main.css" type="text/css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/style.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
      	<script type="text/javascript" src="js/bootstrap.min.js"></script>
      	<script type="text/javascript" src="js/zingchart.min.js"></script>
		</head>
			<body>
				<div class="wrapper">
	
			  			<!--Navbar-->
			  				<nav id="navbar1"  class="navbar navbar-default navbar-fixed-top" style="border-color: orange; border-width: 1px; background-color: #F2F4F7" >
			  					<div class="container-fluid">
			  						
			  						<!--Logo-->
			  						
			  							<a href="home.php"><img src="tools/care.jpg" style="height: 49px"></a>
			  						
			  						<!--end Logo-->

			  						<!--LogoutMenu in navBar-->
			  						<div class="navbar-right" >
											<ul class="nav navbar-nav">
										            <li >
										        		<form class="navbar-form navbar-left">
													      <div class="input-group">
													        <input type="text" style="background-color: transparent;" class="form-control" placeholder="Search" name="search">
													        <div class="input-group-btn">
													          <button class="btn btn-default" type="submit" style="background-color: transparent;">
													            <span class="glyphicon glyphicon-search"></span>
													          </button>
													        </div>
													      </div>
													    </form>
										            </li>
										            <li class="divider-vertical" style="height: 50px; border-left: 1px solid orange; opacity: 0.5; margin: 0 23px;">
										              <a class="nav-link" href="#notifications" style="color: #000000"><span class="glyphicon glyphicon-bell" style="color:orange; font-size: 20px"></span> Notifications</a>
										            </li>
										            <li class="divider-vertical" style="height: 50px; border-left: 1px solid orange; opacity: 0.5; margin: 0 -18px;">
										              <a class="nav-link" href="#messages" style="color: #000000"><span class="glyphicon glyphicon-envelope" style="color:orange; font-size: 20px"></span> Messages</a>
										            </li>
										            <li  class="divider-vertical" style="height: 50px; border-left: 1px solid orange; float: right;opacity: 0.5; margin: 0 15px;">
										              <a class="nav-link" href="logout.php" style="color: #000000"><span class="glyphicon glyphicon-log-out" style="color:orange; font-size: 20px;"></span> Log out</a>
								        			
										            </li>
								          	</ul>
			  						</div>
			  					</div>
			  				</nav>
			  			<!--End Navbar-->
			  	
			  				

			  				<div class="sidebar-nav-fixed affix" style="padding-top: 50px; height: 0px;  ">

				  				<nav  class="navbar navbar-default navbar-fixed-left" style="padding-bottom: 100px; width: 300px; border-color: orange; background-color: #F2F4F7;  height: 93.7%; position: fixed;overflow-y: scroll;" >
				  				<center>
				  						<h3 class="page-header" >
				  							<?php 
				  							 $user_id=$_SESSION['user_id'];
				  							 $uselect = "SELECT * FROM users WHERE username='$user_id'";
									         $result = mysqli_query($connection,$uselect); 
									         $rows = mysqli_num_rows($result);
									         $fetchdata=mysqli_fetch_array($result);
									         $pic=$fetchdata['userimg'];
									         $Name=$fetchdata['name'];
									         if ($rows==1 and $pic=="") {
									         	echo "<img src='tools/user2.jpg' style=' height: 150px; width: 150px; margin-left: auto;margin-right: auto;  border-radius: 50%;border:3px solid orange; '>";
									         }
									         else{
									         	echo "<img src='tools/profileimgs/".$fetchdata['userimg']."'  alt='User Profile Picture' style=' height: 150px; width: 150px; margin-left: auto;margin-right: auto;  border-radius: 50%;border:3px solid orange; '>";
									         } 
									         echo "<br>";
									         echo "<br>";
									         echo "<br>";
									         echo "$Name";  
				  						?>
				  					</center></h3>
				  					<ul class="nav" style="  height: 500px">
				  						<li class="active" style="padding-bottom: 6px; " ><a href="?action=projectanalytics" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'"><span class="glyphicon glyphicon-home" style="margin-right: 20px;"></span>DASHBOARD</a></li>
				  						<li style="padding-bottom: 6px;"><a href="?action=addpdetails" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'"><span class="glyphicon glyphicon-plus" style="margin-right: 20px"></span>ADD A PROJECT</a> </li>
				  						<li style="padding-bottom: 6px;"><a href="?action=pdetails" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'"><span class="glyphicon glyphicon-folder-open" style="margin-right: 20px"></span>PROJECT DETAILS</a></li>
				  						<li style="padding-bottom: 6px;"><a href="?action=impstatus" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'"><span class="glyphicon glyphicon-equalizer" style="margin-right: 20px"></span>IMPLEMENTATION STATUS</a></li>
				  						<li style="padding-bottom: 6px;"><a href="report.php" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'"><span class="glyphicon glyphicon-file" style="margin-right: 20px"></span>VIEW REPORTS</a></li>
				  						<li style="padding-bottom: 6px;"><a href="?action=manageusers" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'"><span class="glyphicon glyphicon-user" style="margin-right: 20px"></span>MANAGE USERS</a></li>
				  						<li style="padding-bottom:  6px;"><a href="?action=settings" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'" ><span class="glyphicon glyphicon-wrench" style="margin-right: 20px"></span>SETTINGS</a></li>
				  						<li style="padding-bottom: 6px;"><a href="lockscreen.php" onMouseOver="this.style.background='#FFB226'"   onMouseOut="this.style.background='#F2F4F7'"><span class="glyphicon glyphicon-off" style="margin-right: 20px"></span>LOCK SCREEN</a></li>
				  					</ul>
				  				</nav>
			  				</div>
			  			

			  			<!-- END LEFT SIDEBAR -->
						



						<!-- MAIN CONTENT -->
						<div class="panel panel-default" style="padding-top: 50px; height:auto; margin-left: 290px; background-color: #FBFBFB ;" >

						  <div class="panel-body" style="padding-top: 50px; height:auto; margin-left: 20px; background-color: #FBFBFB ; ">
						  	<h3 class="page-header" style="color: orange">
						    <?php
								echo "".date('l, F j, Y');
								echo " | ".date('g:i a');
							?>	 
							</h3>



							<!-- Action project analytics-->
									<?php
									$action=$_REQUEST['action'];
									if($action=='projectanalytics'){
									 ?>
									 <div class="section-heading clearfix">
										<h3 class="section-title" style="margin-left: 860px; color: #0F9AC7   "><span class="glyphicon glyphicon-object-align-right"></span> PROJECTS ANALYTICS</h3>
									</div>
									 <p></p>
									 <hr>
											<div>	
											  <?php 
											include('connection.php');
											$condition = " Proj_status='Completed' ";
											$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
											$result=mysqli_query($connection,$sql);
											$result = mysqli_fetch_assoc( $result );
											$total = $result['num'];

											

											$condition = " Proj_status='Running' ";
											$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
											$result=mysqli_query($connection,$sql);
											$result = mysqli_fetch_assoc( $result );
											$total2 = $result['num'];



											$condition = " Proj_status='Stalled' ";
											$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
											$result=mysqli_query($connection,$sql);
											$result = mysqli_fetch_assoc( $result );
											$total3 = $result['num'];

											

											$condition = " Proj_status='Terminated' ";
											$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
											$result=mysqli_query($connection,$sql);
											$result = mysqli_fetch_assoc( $result );
											$total4 = $result['num'];

											mysqli_close($connection);

											?>
											  <div id='myChart'></div>
											  <script>
											    var myData = [<?php echo "$total,$total2,$total3,$total4";?>];

											    var myConfig = {
											      "graphset": [{
											        "type": "area",
											        "plot": {
												    "marker": {
												      "background-color": "orange",
												      "border-color": "black",
												      "border-width": 2
												    }
												  },
											        "background-color":"#FBFBFB",
											        "title": {
											          "text": " Overview"
											        },
											        "scale-x": {
											          "labels": ["Completed", "Running", "Stalled", "Terminated"]
											        },
											        "series": [{
											          "values": myData
											        }]
											      }]
											    };

											    zingchart.render({
											      id: 'myChart',
											      data: myConfig,
											      height: "90%",
											      width: "50%"
											    });
											  </script>
											  <div class="divider-vertical"></div>
											</div>

									<?php } ?>
									<!-- End project analytics-->

						
									

									<!-- Action add newProject details-->

									<?php
									$action=$_REQUEST['action'];
									if($action=='addpdetails'){
									 ?>
												<?php	
												include('connection.php');
	
												if (isset($_POST['submit'])) {
													
												// get the posted data
												 $pcode =trim($_POST['pcode']);
												 $pname = trim($_POST['pname']);
												 $prcode= trim($_POST['prcode']);
												$prtype=trim($_POST['prtype']);
												 $fund=trim($_POST['fund']);
												 $inbusplan = trim($_POST['inbzp']);
												 $initdate = trim($_POST['initdate']);
												 $costInit = trim($_POST['costInit']);
												$pimpl=trim($_POST['pimpl']);
												 $pman=trim($_POST ['pman']);
												 $pcoo=trim($_POST ['pcoo']);
												 $contdate = trim($_POST ['contd']);
												$ppose = trim($_POST ['ppose']);
												$pscope=trim($_POST ['pscope']);
												 $pcost = trim($_POST ['pcost']);
												 $ccost=trim($_POST ['ccost']);
												 $pcdays=trim($_POST ['pcdays']);
												 $impstartdate=trim($_POST ['impenddate']);
												 $impenddate=trim($_POST ['impenddate']);


												$checkpcode=mysqli_query("SELECT * FROM general_information where 1 and Proj_code='$pcode'");
												  $outpcode=mysqli_fetch_array($checkpcode);
												   $rowpcode=mysqli_num_rows($checkpcode);
												 if($rowpcode > 0 ){
												 echo '<font color=red size=-1>Project code exists. please chose different project code.</font><br/>';

												 }
												else if( $pcode=="")
												{
												 echo '<font color=red size=-1>Project code, name can\' t be empty, please fill all the fields. </font><br/>';

												}else{

												$sql = "INSERT INTO general_information VALUES( '$pcode', '$pname', '$prcode', '$prtype', '$fund', '$inbusplan','$initdate','$costInit', '$pimpl', '$pman','$pcoo', '$ppose', '$pscope','$contdate', '$pcost','$ccost','$pcdays', '$impstartdate', '$impenddate')";
												if (mysqli_query($connection, $sql)) { ?>
												<div class="alert alert-success alert-dismissible">
											    <a href="#" class="close" data-dismiss="alert" aria-label="close" data-position="bottom-full-width">&times;</a>
											    <strong>Success!</strong> New record added successful.
											  	</div>

													<?php } else {
													    echo "<script>alert('Error! Project details were not added successfully'); window.location='home.php?action=settings'</script>";
													}

													mysqli_close($connection);
												}
												}
												?>

												 <h2><center> ENTER NEW PROJECT DETAILS</center></h2>
											<form method="post">
											<h4>
											<table class="detail-view table table-hover">
											  <tr>
											    <td>Project code</td>
											    <td><input type="text" name="pcode"   required class="form-control" style="width: 200px" /></td>
											    <td>Project name</td>
											    <td><input type="text" name="pname" required class="form-control" style="width: 350px" /></td>
											  </tr>
											  <tr>
											    <td>Procurement code</td>
											    <td><input type="text" name="prcode" class="form-control" style="width: 200px" /></td>
											    <td>Procurement type</td>
											    <td><select name="prtype" class="form-control" style="width: 200px" >

												<option value="Contract">Contract</option>
												<option value="LPO">LPO</option>
												</select></td>
											  </tr>
											  <tr>
											    <td>Funding</td>
											    <td><select name="fund" class="form-control" style="width: 200px" >

												<option value="Capex">Capex</option>
												<option value="Support Programme">Support Programme</option>
												</select></td>
											    <td>Appears in business plan</td>
											    <td><input type="radio" name="inbzp" value="YES" required " >YES<input type="radio" name="inbzp" value="NO"  />NO</td>
											  </tr>
											  <tr>
											    <td>Date of initiation</td>
											    <td><input type="date" id="SelectedDate" name='initdate' class="form-control" style="width: 200px" /></td>
											    <td>Cost at initiation</td>
											    <td><input type="text" name="costInit" required id="this" class="form-control" style="width: 200px" /></td>
											  </tr>
											  <tr>
											    <td>Project Implementer</td>
											    <td><input type="text" name="pimpl"  class="form-control" style="width: 200px" /></td>
											    <td>Project Manager</td>
											    <td><input type="text" name="pman" class="form-control" style="width: 200px"  /></td>
											  </tr>
											  <tr>
											    <td>Project Coordinator</td>
											    <td><input type="text" name="pcoo" class="form-control" style="width: 200px"  /></td>
											    <td>Date of contract</td>
											    <td><input type="date" id="SelectedDate" name='contd' class="form-control" style="width: 200px" /></td>
											  </tr>
											  <tr>
											    <td>Project purpose</td>
											    <td><textarea name="ppose" rows="3" class="form-control" style="width: 350px; height: 150px"   ></textarea></td>
											    <td>Scope</td>
											    <td><textarea name="pscope" rows="3" class="form-control" style="width: 350px; height: 150px"  ></textarea></td>
											  </tr>
											  <tr>
											    <td>Planned costing</td>
											    <td><input type="text" name="pcost"  id="this" class="form-control" style="width: 200px" /></td>
											    <td>Current costing</td>
											    <td><input type="text" name="ccost"  id="this" class="form-control" style="width: 200px" /></td>
											  </tr>
											  <tr>
											    <td>Planned completion(days)</td>
											    <td><?php 
													  $op;
													  for($t=1;$t<=500;$t++){
													 $op.="<option value=".$t.">".$t."</option>";
													  
													  }
													  ?>
									                <select name="pcdays" class="form-control" style="width: 200px" >
									                  <?php  echo $op;?>
									                </select></td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											  </tr>
											  <tr>
											    <td>Implementation start date</td>
											    <td><input type="date" id="SelectedDate" name='impstartdate' class="form-control" style="width: 200px"  /></td>
											    <td>Implementation end date</td>
											    <td><input type="date" id="SelectedDate" name='impenddate' class="form-control" style="width: 200px" /></td>
											  </tr>
											  <tr>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td>&nbsp;</td>
											    <td><input type="submit" value="SUBMIT" name="submit" class="form-control" style="width: 200px; background-color: #F2F4F7" /></td>
											  </tr>
											  
											</table>
											</h4>
											</form>

											<?php } ?>

											<!-- End add newProject details-->

												
											

											<!-- Action Project details-->

											<?php
											$action=$_REQUEST['action'];
											if($action=='pdetails'){
											?>
											<div class="col-md-3">
												<div class="well" style="background: #ffffff;"><center>
													<h1><span class="glyphicon glyphicon-tasks" aria-hidden="true" style="color: #99cc00"></span><?php 
													$condition = " Proj_status='Completed' ";
													$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
													$result=mysqli_query($connection,$sql);
													$result = mysqli_fetch_assoc( $result );
													$total = $result['num'];

													echo " $total"; ?></h1>
													<h4>Completed Projects</h4></center>
												</div>
											</div>
											<div class="col-md-3">
												<div class="well" style="background: #ffffff"><center>
													<h1><span class="glyphicon glyphicon-stats" aria-hidden="true" style="color: orange"></span> <?php 
													$condition = " Proj_status='Running' ";
													$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
													$result=mysqli_query($connection,$sql);
													$result = mysqli_fetch_assoc( $result );
													$total = $result['num'];

													echo " $total"; ?></h1>
													<h4>Running Projects</h4></center>
												</div>
											</div>
											<div class="col-md-3">
												<div class="well" style="background: #ffffff"><center>
													<h1><span class="glyphicon glyphicon-warning-sign" aria-hidden="true" style="color:#FFF033"></span><?php 
													$condition = " Proj_status='Stalled' ";
													$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
													$result=mysqli_query($connection,$sql);
													$result = mysqli_fetch_assoc( $result );
													$total = $result['num'];

													echo " $total"; ?></h1>
													<h4>Stalled Projects</h4></center>
												</div>
											</div>
											<div class="col-md-3">
												<div class="well" style="background: #ffffff"><center>
													<h1><span class="glyphicon glyphicon-remove-circle" aria-hidden="true" style="color: red"></span><?php 
													$condition = " Proj_status='Terminated' ";
													$sql = "SELECT  COUNT(*) as num FROM implementation_status WHERE" . $condition;
													$result=mysqli_query($connection,$sql);
													$result = mysqli_fetch_assoc( $result );
													$total = $result['num'];

													echo " $total"; ?></h1>
													<h4>Terminated Projects</h4></center>
												</div>
											</div>

											<div class="panel-body">
								              <table class="table table-striped table-hover">
								                <tr style="background: #ffc266">
								                  <th>Proj Code</th>
								                  <th>Proj Name</th>
								                  <th>Proj Manager</th>
								                  <th>Planned Costing</th>
								                  <th>Planned Days</th>
								                  <th>Impl-startDate</th>
								                  <th>Impl-EndDate</th>
								                  <th style="color: white">MORE</th>
								                </tr>	

								                <?php
													include('connection.php');
													
													$sql="select * from general_information";
									                 $result=mysqli_query($connection,$sql);

									                  while($rows=mysqli_fetch_array($result))
									                {
									               
									                  $Proj_code=$rows['Proj_code'];
									                  $Proj_name=$rows['Proj_name'];
									                  $Proj_manager=$rows['Proj_manager'];
									                  $Planned_costing=$rows['Planned_costing'];
									                  $Planned_completion=$rows['Planned_completion'];
									                  $Impl_StartDate=$rows['Impl_StartDate'];
									                  $Impl_EndDate=$rows['Impl_EndDate'];
									  
									                  echo("<tr>");
									                  echo("<td>$Proj_code</td>");
									                  echo("<td>$Proj_name</td>");
									                  echo("<td>$Proj_manager</td>");
									                  echo("<td>$Planned_costing</td>");
									                  echo("<td>$Planned_completion</td>");
									                  echo("<td>$Impl_StartDate</td>");
									                  echo("<td>$Impl_EndDate</td>");
									                  echo("<td><a href='pdetail.php?Proj_code=$Proj_code'>view</a></td>");
									                  echo("</tr>");
									                  
													}?>			
											
												</table>
											</div>
											<?php } ?>

											<?php
												include('connection.php');
												if(isset($_GET['Proj_code'])){
													$Proj_code=$_GET['Proj_code'];
													$sql="SELECT * FROM general_information where Proj_code='$Proj_code'";
									                 $result=mysqli_query($connection,$sql);

									                  while($rows=mysqli_fetch_array($result))
									                {?>

												<h3><?php echo $rows['Proj_code']." - ". $rows['Proj_name'];?></h3>
												<h2 class="page-header"><a  class='btn btn-primary' data-toggle='modal' data-target='#editpdetails' style="margin-left: 1100px;">EDIT</a></h2>
												<form method="post">
												<table class="detail-view table table-hover table-condensed" style="height: 500px">
													  <tr>
													    <th style="background: #ffefcc;">Project code</th>
													    <td><?php echo $rows['Proj_code']; ?></td>
													    <th style="background: #ffefcc;">Project name</th>
													    <td><?php echo $rows['Proj_name']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Procurement code</th>
													    <td><?php echo $rows['Procurement_code']; ?></td>
													    <th style="background: #ffefcc;">Procurement type</th>
													    <td><?php echo $rows['Procurement_type']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Funding</th>
													    <td><?php echo $rows['Funding']; ?></td>
													    <th style="background: #ffefcc;">Appears in business plan</th>
													    <td><?php echo $rows['AppearsIn_BussPlan']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Date of initiation</th>
													    <td><?php echo $rows['DateOf_initiation']; ?></td>
													    <th style="background: #ffefcc;">Cost at initiation</th>
													    <td><?php echo $rows['CostAt_initiation']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc">Project Implementer</th>
													    <td><?php echo $rows['Proj_implementer']; ?></td>
													    <th style="background: #ffefcc">Project Manager</th>
													    <td><?php echo $rows['Proj_manager']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc">Project Coordinator</th>
													    <td><?php echo $rows['Proj_coordinator']; ?></td>
													    <th style="background: #ffefcc">Date of contract</th>
													    <td><?php echo $rows['DateOf_contract']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc">Project purpose</th>
													    <td><?php echo $rows['Purpose']; ?></td>
													    <th style="background: #ffefcc">Scope</th>
													    <td><?php echo $rows['Scope']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc">Planned costing</th>
													    <td><?php echo $rows['Planned_costing']; ?></td>
													    <th style="background: #ffefcc">Current costing</th>
													    <td><?php echo $rows['Current_costing']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc">Planned completion(days)</th>
													    <td><?php echo $rows['Planned_completion']; ?></td>
													    <td>&nbsp;</td>
													    <td>&nbsp;</td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc">Implementation start date</th>
													    <td><?php echo $rows['Impl_StartDate']; ?></td>
													    <th style="background:#ffefcc">Implementation end date</th>
													    <td><?php echo $rows['Impl_EndDate']; ?></td>
													  </tr>
													  <tr>
													    <td>&nbsp;</td>
													    <td>&nbsp;</td>
													    <td>&nbsp;</td>
													    <td>&nbsp;</td>
													  </tr>
													 
  
													</table>
													</form>

													<div class="modal fade" id="editpdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="">
												   <div class="modal-dialog modal-lg" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <center><h3 class="modal-title" id="exampleModalLongTitle" style="color: orange">EDIT PROJECT DETAILS</h3></center>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												        <form role="form" action="editProject.php" method="post">
												        	<h4>
												            <table class="table table table-hover table-condensed">
																<tr>
																    <td>Project code</td>
																    <td><input type="text" name="pcode"   required class="form-control" value="<?php echo $rows['Proj_code']; ?>" /></td>
																</tr>
																<tr>
																    <td>Project name</td>
																    <td><input type="text" name="pname" required class="form-control" value="<?php echo $rows['Proj_name']; ?>" /></td>
																</tr>
																<tr>
																    <td>Procurement code</td>
																    <td><input type="text" name="prcode" class="form-control" value="<?php echo $rows['Procurement_code']; ?>" /></td>
																</tr>
																<tr>
																    <td>Procurement type</td>
																    <td><select name="prtype" class="form-control" value="<?php echo $rows['Procurement_type']; ?>">

																	<option value="Contract">Contract</option>
																	<option value="LPO">LPO</option>
																	</select></td>
																</tr>
																<tr>
																    <td>Funding</td>
																    <td><select name="fund" class="form-control" style="width: 200px" value="<?php echo $rows['Funding']; ?>" >

																	<option value="Capex">Capex</option>
																	<option value="Support Programme">Support Programme</option>
																	</select></td>
																</tr>
																<tr>
																    <td>Appears in business plan</td>
																    <td><input type="radio" name="inbzp" value="YES" required " value="<?php echo $rows['AppearsIn_BussPlan']; ?>" >YES<input type="radio" name="inbzp" value="NO"  value="<?php echo $rows['AppearsIn_BussPlan']; ?>" />NO</td>
																</tr>
																<tr>
																    <td>Date of initiation</td>
																    <td><input type="date" id="SelectedDate" name='initdate' class="form-control" style="width: 200px" value="<?php echo $rows['DateOf_initiation']; ?>" /></td>
																</tr>
																<tr>
																    <td>Cost at initiation</td>
																    <td><input type="text" name="costInit" required id="this" class="form-control" style="width: 200px" value="<?php echo $rows['CostAt_initiation']; ?>" /></td>
																</tr>
																<tr>
																    <td>Project Implementer</td>
																    <td><input type="text" name="pimpl"  class="form-control" style="width: 200px" value="<?php echo $rows['Proj_implementer']; ?>" /></td>
																</tr>
																<tr>
																    <td>Project Manager</td>
																    <td><input type="text" name="pman" class="form-control" style="width: " value="<?php echo $rows['Proj_manager']; ?>" /></td>
																</tr>
																<tr>
																    <td>Project Coordinator</td>
																    <td><input type="text" name="pcoo" class="form-control" style="width:" value="<?php echo $rows['Proj_coordinator']; ?>" /></td>
																</tr>
																<tr>
																    <td>Date of contract</td>
																    <td><input type="date" id="SelectedDate" name='contd' class="form-control" style="width: 200px" value="<?php echo $rows['DateOf_contract']; ?>" /></td>
																</tr>
																<tr>
																    <td>Project purpose</td>
																    <td><textarea name="ppose" rows="3" class="form-control" style="width: ; height: 50px"> <?php echo $rows['Purpose']; ?> </textarea></td>
																</tr>
																<tr>
																    <td>Scope</td>
																    <td><textarea name="pscope" rows="3" class="form-control" style="width: ; height: 50px"> <?php echo $rows['Scope']; ?> </textarea></td>
																</tr>
																<tr>
																    <td>Planned costing</td>
																    <td><input type="text" name="pcost"  id="this" class="form-control" style="width:" value="<?php echo $rows['Planned_costing']; ?>" /></td>
																</tr>
																<tr>
																    <td>Current costing</td>
																    <td><input type="text" name="ccost"  id="this" class="form-control" style="width: 200px" value="<?php echo $rows['Current_costing']; ?>" /></td>
																</tr>
																<tr>
																    <td>Planned completion(days)</td>
																    <td><?php 
																		  $op;
																		  for($t=1;$t<=500;$t++){
																		 $op.="<option value=".$t.">".$t."</option>";
																		  
																		  }
																		  ?>
														                <select name="pcdays" class="form-control" value="<?php echo $rows['Planned_completion']; ?>" >
														                  <?php  echo $op;?>
														                </select></td>
														        </tr>
																<tr>
																    <td>Implementation start date</td>
																    <td><input type="date" id="SelectedDate" name='impstartdate' class="form-control" style="width: 200px" value="<?php echo $rows['Impl_StartDate']; ?>" /></td>
																</tr>
																<tr>
																    <td>Implementation end date</td>
																    <td><input type="date" id="SelectedDate" name='impenddate' class="form-control" style="width: " value="<?php echo $rows['Impl_EndDate']; ?>" /></td>
																</tr>
																											  
																</table>
																</h4>			
												          </div>
												        	<div class="modal-footer">
												             <input type="submit" value="SAVE" name="save" class="btn btn-primary">
												             <button type="button" class="btn btn-default" data-dismiss="modal"> CLOSE
												             </button>

												                
												        </form>
												      </div> 
												      </div>
												  }

												<?php } ?>
												<?php } ?>

										<!-- End Project details-->
												




										<!--Action Implementation status-->

											<?php 

											$action=$_REQUEST['action'];
											if($action=='impstatus'){
											$sql = "SELECT Proj_code FROM general_information WHERE 1 AND Proj_code  NOT IN (SELECT Proj_code FROM implementation_Status) ";
											$result = mysqli_query($connection, $sql);
											$rows=mysqli_num_rows($result);
											if($rows <1){
											echo '<font color="red">No project details found.</font>';
											}else{ 
											}
											?>
												<h2><center>ENTER IMPLEMENTATION STATUS DETAILS</center></h2>
											<form method="post">
												<h4>
											<table class="table hover" >
										  <tr>
										    <td>Project</td>
										    <td> <select  name="pcode" onChange="showpname(this.value)"  class="form-control">
										            
										            <?php  
										$sql = "SELECT Proj_code,Proj_name  FROM general_information WHERE 1 AND Proj_code  NOT IN (SELECT Proj_code FROM implementation_status)   ";
										$result = mysqli_query($connection, $sql);
												while($row = mysqli_fetch_assoc($result))
													{  
														echo '<option value="'.$row['Proj_code'].'">';
														echo $row['Proj_code']." - ".$row['Proj_name'];
														echo '</option>';
													}
												?>
										          </select>
												  
												  
											</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											</tr>
										  <tr>
										    <td>Project</td>
										    <td><p id="txtHint"></p></td</tr>     
										    <td>Implementation code</td>
										    <td><input type="text" name="implcode" required class="form-control" /></td>
										  </tr>
										  <tr>
										    <td>Implementation status</td>
										    <td><textarea name="impstatus" rows="3"  class="form-control" style="width: 350px; height: 150px" ></textarea></td>
										    <td>Project status</td>
										    <td><select name="pstatus" class="form-control">

											<option value="Completed">Completed</option>
											<option value="Running">Running</option>
											<option value="Stalled">Stalled</option>
											<option value="Terminated">Terminated</option>
											</select></td>
											
										  </tr>
										   <tr>
										    <td>Remarks</td>
										    <td><textarea name="remarks" rows="3"  class="form-control" style="width: 350px; height: 150px"  ></textarea></td>
										    <td>Action Required</td>
										    <td><textarea name="actreq" rows="3" class="form-control" style="width: 350px; height: 150px" ></textarea></td>
										  </tr>
										  <tr>
										    <td>&nbsp;</td>
										    <td>&nbsp;</td>
										    <td>&nbsp;</td>
										    <td><input type="submit" value="SUBMIT" name="sub" class="form-control" style="width: 350px; background-color: #F2F4F7"/></td>
										  </tr>
									 </table>
									 </h4>
									 </form>

									<?php

									 if (isset($_POST['sub'])) {
	
									// get the posted data
									$pcod = ( htmlspecialchars( $_POST['pcode']));
									$implcode = $_POST['implcode'];
									$impstatus= $_POST['impstatus'];
									$pstatus=$_POST['pstatus'];
									$remarks=$_POST['remarks'];
									$actreq = $_POST['actreq'];


									$sql = "INSERT INTO implementation_status VALUES( '$pcod', '$implcode', '$impstatus', '$pstatus', '$remarks', '$actreq')";
										if (mysqli_query($connection, $sql)){
										echo "New record created successfully";
										echo '<meta content="2;home.php" http-equiv="refresh" />';
									} else {
										   echo "Error: " . $sql . "<br>" . mysqli_error($connection);
										}

									mysqli_close($connection);

									}
									 
 									?>

									<?php } ?>

									<!--End Implementation status-->




									<!--Action manage users-->

									<?php
									$action=$_REQUEST['action'];
									if($action=='manageusers'){
									?>
									<div class="panel-body">
										<a  class='btn btn-primary' data-toggle='modal' data-target='#addNewuser'>ADD NEW USER</a>
										<div class="modal fade" id="addNewuser" tabindex="-1" role="dialog" 
										     aria-labelledby="myModalLabel" aria-hidden="true">
										    <div class="modal-dialog">
										        <div class="modal-content">
										            <!-- Modal Header -->
										            <div class="modal-header">
										                <button type="button" class="close" 
										                   data-dismiss="modal">
										                       <span aria-hidden="true">&times;</span>
										                       <span class="sr-only">Close</span>
										                </button>
										                <h4 class="modal-title" id="myModalLabel">
										                    <center><font style="color: orange">ADD NEW USER</font></center>
										                </h4>
										            </div>
										            
										            <!-- Modal Body -->
										            <div class="modal-body">
										                
										                <form class="form-horizontal" role="form" action="adduser.php" method="post">
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control" name="user_id" placeholder="User_ID" required="this" />
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control"  name="names" placeholder="Names"/>
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control"  name="department" placeholder="Department"/>
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control"  name="role" placeholder="Role"/>
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="email" class="form-control"  name="email" placeholder="E-mail"/>
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control"  name="gender" placeholder="Gender"/>
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control"  name="telephone" placeholder="Telephone_No"/>
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control"  name="username" placeholder="Username"/>
										                    </div>
										                  </div>
										                  <div class="form-group">
										                    <div class="col-sm-12">
										                        <input type="text" class="form-control"  name="password" placeholder="Password"/>
										                    </div>
										                  </div>
										               
										              </div>
										            
										            <!-- Modal Footer -->
										            <div class="modal-footer">
										             <input type="submit" value="ADD" name="adduser" class="btn btn-primary">
										                <button type="button" class="btn btn-default" data-dismiss="modal"> CLOSE</button>
										                    </form>
										           
										            </div>
										        </div>
										    </div>
										</div>
										
										<p></p>
								              <table class="table table-striped table-hover">
								                <tr style="background: #ffc266">
								                  <th>User ID</th>
								                  <th>Name</th>
								                  <th>Department</th>
								                  <th>E-mail address</th>
								                  <th>Telephone_No</th>
								                  <th>Username</th>
								                  <th style="color: white">MORE</th>
								                </tr>				
													<?php
													include('connection.php');
													
													$sql="select * from users";
									                 $result=mysqli_query($connection,$sql);

									                  while($rows=mysqli_fetch_array($result))
									                {
									               
									                  $user_id=$rows['user_id'];
									                  $name=$rows['name'];
									                  $department=$rows['department'];
									                  $email_address=$rows['email_address'];
									                  $gender=$rows['gender'];
									                  $telephone=$rows['telephone_no'];
									                  $username=$rows['username'];
									                 									  
									                  echo("<tr>");
									                  echo("<td>$user_id</td>");
									                  echo("<td>$name</td>");
									                  echo("<td>$department</td>");
									                  echo("<td>$email_address</td>");
									                  echo("<td>$telephone</td>");
									                  echo("<td>$username</td>");
									                  echo("<td><a href='viewuser.php?user_id=$user_id'>view</a></td>");
									                  echo("</tr>");
									                  
													}?>
												</table>
										</div>

										<?php } ?>

											
											<?php
												include('connection.php');
												if(isset($_GET['user_id'])){
													$user_id=$_GET['user_id'];
													$sql="SELECT * FROM users where user_id='$user_id'";
									                 $result=mysqli_query($connection,$sql);

									                  while($rows=mysqli_fetch_array($result))
									                {?>

												<h3><?php echo $rows['user_id']." - ". $rows['name'];?></h3>
												<h2 class="page-header"><a  class='btn btn-primary' data-toggle='modal' data-target='#edituser' style="margin-left: 1100px;">EDIT</a></h2>

												<form method="post">
												<table class="detail-view table table-hover table-condensed" style="height: 420px">
													  <tr>
													    <th style="background: #ffefcc;">User_ID</th>
													    <td><?php echo $rows['user_id']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Names</th>
													    <td><?php echo $rows['name']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Department</th>
													    <td><?php echo $rows['department']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Role</th>
													    <td><?php echo $rows['role']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Email Address</th>
													    <td><?php echo $rows['email_address']; ?></td>
													  </tr>
													  <tr>
													    <td>&nbsp;</td>
													    <td>&nbsp;</td>
													  </tr>
													  <tr>
													    <td>&nbsp;</td>
													    <td>&nbsp;</td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Gender</th>
													    <td><?php echo $rows['gender']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Telephone No</th>
													    <td><?php echo $rows['telephone_no']; ?></td>
													  </tr>
													  <tr>
													    <th style="background: #ffefcc;">Username</th>
													    <td><?php echo $rows['username']; ?></td>
													  </tr>
													 
  
													</table>
													</form>
													<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="">
												   <div class="modal-dialog modal-lg" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <center><h3 class="modal-title" id="exampleModalLongTitle" style="color: orange">EDIT USER DETAILS</h3></center>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												        <form role="form" action="edituser.php" method="post">
												        	<h4>
												            <table class="table table table-hover table-condensed">
																<tr>
																    <td>User ID</td>
																    <td><input type="text" name="user_id"   required class="form-control" value="<?php echo $rows['user_id']; ?>"/></td>
																</tr>
																<tr>
																    <td>Names</td>
																    <td><input type="text" name="names" required class="form-control" value="<?php echo $rows['name']; ?>" /></td>
																</tr>
																<tr>
																    <td>Department</td>
																    <td><input type="text" name="department" class="form-control" value="<?php echo $rows['department']; ?>" /></td>
																</tr>
																<tr>
																    <td>Role</td>
																    <td><textarea name="role" rows="3" class="form-control" style="width: ; height: 50px"> <?php echo $rows['role']; ?> </textarea></td>
																</tr>
																<tr>
																    <td>Email address</td>
																    <td><input type="email" name="email_address" required id="this" class="form-control"  value="<?php echo $rows['email_address']; ?>" /></td>
																</tr>
																<tr>
																    <td>Gender</td>
																    <td><input type="text" name="gender"  class="form-control"  value="<?php echo $rows['gender']; ?>" /></td>
																</tr>
																<tr>
																    <td>Telephone No</td>
																    <td><input type="text" name="telephone" class="form-control" style="width: " value="<?php echo $rows['telephone_no']; ?>" /></td>
																</tr>
																<tr>
																    <td>Username</td>
																    <td><input type="text" name="username" class="form-control" style="width:" value="<?php echo $rows['username']; ?>" /></td>
																</tr>							  
																</table>
																</h4>			
												          </div>
												        	<div class="modal-footer">
												             <input type="submit" value="SAVE" name="save" class="btn btn-primary">
												             <button type="button" class="btn btn-default" data-dismiss="modal"> CLOSE
												             </button>

												                
												        </form>
												      </div> 
												      </div>

												

												<?php } ?>
												<?php } ?>

									<!--End manage users-->




									<!-- Action settings-->

									<?php
									$action=$_REQUEST['action'];
									if($action=='settings'){
									 ?>

									 <?php 
									 $user_id=$_SESSION['user_id'];
				  							 $uselect = "SELECT * FROM users WHERE username='$user_id'";
									         $result = mysqli_query($connection,$uselect); 
									         $rows = mysqli_num_rows($result);
									         while($data=mysqli_fetch_array($result)){?>


									<div id="main-content">
									<div class="container-fluid">
										<div class="section-heading">
											<h3 class="page-title">USER PROFILE</h3>
										</div>
										<ul class="nav nav-tabs" role="tablist">
											<li class="active"><a href="#myprofile" role="tab" data-toggle="tab">My Profile</a></li>
											<li><a href="#account" role="tab" data-toggle="tab">Account</a></li>
										</ul>
										<form method="post"  enctype="multipart/form-data">
											<div class="tab-content content-profile">
												<!-- MY PROFILE -->
												<div class="tab-pane fade in active" id="myprofile">
													<div class="profile-section">
														<h4 class="profile-heading">Profile Photo</h4>
														<div class="media">
															<div class="media-left">
															<?php 
															$pic=$data['userimg'];
									         				$Name=$data['name'];
															if ($rows==1 and $pic=="") {
												         	echo "<img src='tools/user2.jpg' style='width: 150px;border-radius:10px'>";
																         }
													         else{
													         	echo "<img src='tools/profileimgs/".$data['userimg']."'  alt='User Profile Picture' style=' width: 150px;border-radius:10px'>";
													         }
													         ?>
															</div>
															<br>
															<div class="media-body">
																<?php
																include('connection.php');
																if (isset($_POST['profilepic'])) {
																	$target = "tools/profileimgs/".basename($_FILES['image']['name']);

																	$userid = $_POST['user_id'];
																	$image = $_FILES['image']['name'];

																	$sql = "UPDATE users SET userimg='$image' WHERE user_id='$userid'";
																	mysqli_query($connection,$sql);

																	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
																		echo '<meta content="2;home.php?action=settings" http-equiv="refresh" />';
																	}
																	else if($image ==""){
														            echo '<font color="red" size="-1" >You forgot to choose an image file </font>';
														            }
            													else {
																	echo "<font color='red'>Invalid file format,choose another picture</font>";
																	}
																	}
																?>
																<p>Upload your photo.
																	<br> <em>Image should be at least 140px x 140px</em></p>
																<input type="hidden" name="user_id"  class="form-control" value="<?php echo $data['user_id']; ?>" hidden>
																<input type="file" name="image">
																<button type="submit" class="btn btn-default-dark" name="profilepic">Upload Photo</button>
																
															</div>
														</div>
													</div>
												</form>
													
													<form method="post" action="edituser1.php">
													<div class="profile-section">
														<h3 class="profile-heading">Basic Information</h3>
														<div class="clearfix">
															<div class="row">
															<!-- LEFT SECTION -->
															<br>
																<div class="col-md-6">
																	<div class="left">
																		<div class="form-group">
																			<input type="hidden" name="user_id"  class="form-control" value="<?php echo $data['user_id']; ?>" hidden>
																		</div>
																		<div class="form-group">
																			<label>Names</label>
																			<input type="text" class="form-control" name="names" value="<?php echo $data['name']; ?>">
																		</div>
																		<div class="form-group">
																			<label>Gender</label>
																			<input type="text" class="form-control" name="gender" value="<?php echo $data['gender']; ?>">
																		</div>
																		
																		<div class="form-group">
																			<label>Department</label>
																			<input type="text" class="form-control" name="department" value="<?php echo $data['department']; ?>" disabled>
																		</div>	
																	</div>
																</div>
															<!-- END LEFT SECTION -->

															<!-- RIGHT SECTION -->
																<div class="col-md-6">
																	<div class="left">
																	<div class="form-group">
																		<label>Role</label>
																		<input type="text" class="form-control" name="role" value="<?php echo $data['role']; ?>" disabled>
																	</div>
																	</div>
																</div>
															<!-- END RIGHT SECTION -->
															</div>
														</div>
														<p class="margin-top-30">
															<input type="submit" name="save" value="UPDATE" class="btn btn-primary">
															 &nbsp;&nbsp;
															<button type="reset" class="btn btn-default">Cancel</button>
														</p>
													</div>
												</div>
												<!-- END MY PROFILE -->
												
												<!-- ACCOUNT -->
												<div class="tab-pane fade" id="account">
													<div class="profile-section">
														<div class="clearfix">
															<div class="row">
																<!-- LEFT SECTION -->
																<div class="col-md-6">
																	<div class="left">
																		<h3 class="profile-heading">Account Data</h3>
																		<br>
																		<div class="form-group">
																			<label>Username</label>
																			<input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
																		</div>
																		<div class="form-group">
																			<label>Email</label>
																			<input type="email" class="form-control" name="email_address" value="<?php echo $data['email_address']; ?>">
																		</div>
																		<div class="form-group">
																			<label>Phone Number</label>
																			<input type="text" class="form-control" name="telephone" value="<?php echo $data['telephone_no']; ?>">
																		</div>
																	</div>
																</div>
																<!-- END LEFT SECTION -->

																<!-- RIGHT SECTION -->
																<div class="col-md-6">
																	<div class="right">
																		<h3 class="profile-heading">Change Password</h3>
																		<br>
																		<div class="form-group">
																			<label>Current Password</label>
																			<input type="password" name="old_pass" class="form-control">
																		</div>
																		<div class="form-group">
																			<label>New Password</label>
																			<input type="password" name="new_pass" class="form-control">
																		</div>
																		<div class="form-group">
																			<label>Confirm New Password</label>
																			<input type="password" name="re_pass" class="form-control">
																		</div>
																		<input type="submit" value="CHANGE" name="chngpwd" class="btn btn-primary">
																	</div>
																</div>
																<!-- END RIGHT SECTION -->
															</div>
															<p class="margin-top-30">
															<input type="submit" name="save" value="UPDATE" class="btn btn-primary">
															 &nbsp;&nbsp;
															<button type="reset" class="btn btn-default">Cancel</button>
															</p>	
														</div>
														
													</div>
												</div>
												<!-- END ACCOUNT -->
												
											</div>
										</form>
									</div>
									</div>
									<?php } ?>
									
									

									<?php } ?>

									<!-- End settings -->
			  				
					  		


					  	</div>
						<div class="panel-footer" style="margin-left: 0px; padding-bottom: 2px"><center><p class="copyright">&copy; 2018 All Rights Reserved:  angelobusee@gmail.com</p></center></div>
						</div>

						
		</div>

	</body>		
</html>