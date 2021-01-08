<?php error_reporting('E_NOTICE') ?>
<?php 
include('connection.php');
session_start();
if(empty($_SESSION['user_id']) OR empty($_SESSION['password']) ) {  
  
   header('Location: index.php?login=access_denied' );   
}?>

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
       	<script type="text/javascript" src="js/main.js"></script>
       	<link type="text/css" href="css/print.css" rel="stylesheet">
        <script type="text/javascript" src="js/print.js"></script>
      
	</head>
			<body>
				<div class="row">
					<div class="col-md-12">
						<div style="background-color: #ffc266; height: 60px;-webkit-box-shadow: 0 10px 15px -6px #777;" class="navbar navbar-default navbar-fixed-top">

											<font size="3" style="color: white;margin-left:">
											<?php 
				  							 $user_id=$_SESSION['user_id'];
				  							 $uselect = "SELECT * FROM users WHERE username='$user_id'";
									         $result = mysqli_query($connection,$uselect); 
									         $rows = mysqli_num_rows($result);
									         $fetchdata=mysqli_fetch_array($result);
									         $pic=$fetchdata['userimg'];
									         $Name=$fetchdata['name'];
									         if ($rows==1 and $pic=="") {
									         	echo "<img src='tools/user2.jpg' style='  width: 30px; margin-left: auto;margin-right: auto;  border-radius: 50%; '>";
									         }
									         else{
									         	echo "<img src='tools/profileimgs/".$fetchdata['userimg']."'  alt='User Profile Picture' style=' height: 45px; width: 45px; margin-left: auto;margin-right: auto;  border-radius: 50%; '>";
									         } 
									         echo " ";
									         echo "$Name"
				  							?>
											</font>
				  			<button type="button" class="btn btn-primary pull-right" style="margin-right: 2px;background-color: transparent;"><a class="nav-link" href="logout.php" style="color: #000000"><span class="glyphicon glyphicon-log-out" style="color:white; font-size: 20px;"></span><font style="color: white"> LOGOUT</font> </a></button>
				  		</div>
					</div>
				</div>
				
				<br><br><br><br><br><br>
				<div class="container">
				 <nav class="navbar navbar-default" style="background-color:#FEFDFA;">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <a class="navbar-brand" href="home.php" style="color: black"><span class="glyphicon glyphicon-triangle-left"></span>BACK</a>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
					      	<ul class="nav navbar-nav navbar-right">
					        <li class="dropdown">
					          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: black">CHOOSE A REPORT TO GENERATE <span class="caret"></span></a>
					          <ul class="dropdown-menu">
					            <li><a href="?action=stdprojectreport" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'" onMouseOut="this.style.background='#FEFDFA'">STANDARD PROJECT REPORT</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="?action=statusofprojects" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'" onMouseOut="this.style.background='#FEFDFA'">STATUS OF PROJECTS</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="?action=completedprojects" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'" onMouseOut="this.style.background='#FEFDFA'">COMPLETED PROJECTS</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="?action=runningprojects" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'" onMouseOut="this.style.background='#FEFDFA'">RUNNING PROJECTS</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="?action=stalledprojects" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'" onMouseOut="this.style.background='#FEFDFA'">STALLED PROJECTS</a></li>
					            <li role="separator" class="divider"></li>
					            <li><a href="?action=terminatedprojects" style=":active {background: orange}" onMouseOver="this.style.background='#FFB226'" onMouseOut="this.style.background='#FEFDFA'">TERMINATED PROJECTS</a></li>
					          </ul>
					        </li>
					      </ul>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>
				</div>

				<div class="container-full" style="margin: 50px;border-radius: 7px">
				<!-- Action standard project report-->
				
				<?php
				$action=$_REQUEST['action'];
				if($action=='stdprojectreport'){
				 ?>

				 <h3><center>PLEASE SELECT FIELDS TO DISPLAY |<font color="#0F9AC7"> Standard Project Report</font></center></h3>
				 	
						<div class="form-check form-check-inline">
							<form method="post">
							<table class="table table-sm detail-view  table-condensed" style="background-color: #FEFDFA;">
								
								<tr>
									<th scope="col"></th>
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCodeCheck" name="c1" value="Proj_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Project Code  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjNameCheck" name="c2" value="Proj_name" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Name</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcCodeCheck" name="c3" value="Procurement_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Procurement Code</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcTypeCheck" name="c4" value="Procurement_type" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Procurement Type  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="fundCheck" name="c5" value="Funding" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2"> Funding</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="bsAppCheck" name="c6" value="AppearsIn_Bussplan" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">AppearsBussPlan</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inDateCheck" name="c7" value="DateOf_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Date of Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inCostCheck" name="c8" value="CostAt_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2">Cost at Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjImpCheck" name="c9" value="Proj_implementer" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Project Implementer</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjManCheck" name="c10" value="Proj_manager" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Project Manager</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCoodCheck" name="c11" value="Proj_coordinator" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Coordinator</label></th>
									</tr>

									<tr>
									<th scope="col">&nbsp;</th>
									  <th scope="col">&nbsp;</th>
									  <th scope="col"><input  type="checkbox" id="ppsCheck" name="c12" value="Purpose" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Purpose</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="scopeCheck" name="c13" value="Scope" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Scope</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="cntDateCheck" name="c14" value="DateOf_contract" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Date of contract</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnCostCheck" name="c15" value="Planned_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Planned costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="crCostCheck" name="c16" value="Current_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Current costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnDaysCheck" name="c17" value="Planned_completion" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Planned completion(days)</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="strtDateCheck" name="c18" value="Impl_StartDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation StartDate</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="endDateCheck" name="c19" value="Impl_EndDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation EndDate</label></th>
									  
									  <th scope="col"><button type="button" class="Button btn-primary" onclick="printDiv()">PRINT</button></th>
									  <th scope="col">&nbsp;</th>
									</tr>	 
							</table>
							</form>
						</div>
									
						<?php
						include('connection.php');
						$get="SELECT * 
						FROM general_information";?>
											<div  style="overflow-x:scroll;">
											<div id="printableTable">
											<table id="example" class="table table-striped table-hover table-condensed table-bordered table-dark">
												<tr style="background-color:#fff5e6">
													<th class="prjCodeTd">Proj.Code</th>
													<th class="prjNameTd">Proj.Name</th>
													<th class="pcCodeTd">Proc.Code</th>
													<th class="pcTypeTd">Proc.Type</th>
													<th class="fundTd">Funding</th>
													<th class="bsAppTd">Appear B/P</th>
													<th class="inDateTd">In.Date</th>
													<th class="inCostTd">Cost@In</th>
													<th class="prjImpTd">Proj.Imp</th>
													<th class="prjManTd">Proj.Man</th>
													<th class="prjCoodTd">Proj.Cordt</th>
													<th class="ppsTd">Purpose</th>
													<th class="scopeTd">Scope</th>
													<th class="cntDateTd">Date.Ctrct</th>
													<th class="plnCostTd">Planned.Cst</th>
													<th class="crCostTd">Current.Cst</th>
													<th class="plnDaysTd">PlannedDays</th>
													<th class="strtDateTd">Impl.Strt</th>
													<th class="endDateTd">Impl-End</th>
												</tr>
												
												<?php $run_sql=mysqli_query($connection,$get);
																    
												while($fetch=mysqli_fetch_array($run_sql)){	?>

						<tr bgcolor="white">
						<?php
						echo '<td class="prjCodeTd">'.$fetch['Proj_code'].'</td><td class="prjNameTd">'.$fetch['Proj_name'].'</td>';
						 echo '<td class="pcCodeTd">'.$fetch['Procurement_code'].'</td><td class="pcTypeTd">'.$fetch['Procurement_type'].'</td>';
						 echo '<td class="fundTd">'.$fetch['Funding'].'</td><td class="bsAppTd">'.$fetch['AppearsIn_BussPlan'].'</td>';
						echo '<td class="inDateTd">'.$fetch['DateOf_initiation'].'</td><td class="inCostTd">'.$fetch['CostAt_initiation'].'</td>';
						echo '<td class="prjImpTd">'.$fetch['Proj_implementer'].'</td><td class="prjManTd">'.$fetch['Proj_manager'].'</td>';
						echo '<td class="prjCoodTd">'.$fetch['Proj_coordinator'].'</td><td class="ppsTd">'.$fetch['Purpose'].'</td>';
						echo '<td class="scopeTd">'.$fetch['Scope'].'</td><td class="cntDateTd">'.$fetch['DateOf_contract'].'</td>';
						echo '<td class="plnCostTd">'.$fetch['Planned_costing'].'</td><td class="crCostTd">'.$fetch['Current_costing'].'</td>';
						echo '<td class="plnDaysTd">'.$fetch['Planned_completion'].'</td><td class="strtDateTd">'.$fetch['Impl_StartDate'].'</td>';
						echo '<td class="endDateTd">'.$fetch['Impl_EndDate'].'</td>';
						}?>
					</tr>
						</table>
						<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
						</div>
					</div>

				 <?php } ?>

				<!-- End action standard project report-->


				
				<!-- Action status of projects-->

				<?php
				$action=$_REQUEST['action'];
				if($action=='statusofprojects'){
				 ?>

				 <h3><center>PLEASE SELECT FIELDS TO DISPLAY | <font color="#0F9AC7">Status of projects</font></center></h3>
				 	
						<div class="form-check form-check-inline">
							<form method="post">
							<table class="table table-sm detail-view  table-condensed" style="background-color: #FEFDFA;">
								
								<tr>
									<th scope="col"></th>
									  <th scope="col">&nbsp;</th>
									  <th scope="col">&nbsp;</th>
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCodeCheck" name="c1" value="Proj_code" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Project Code  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjNameCheck" name="c2" value="Proj_name" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2"> Implemenation Code</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcCodeCheck" name="c3" value="Procurement_code" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation Status</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="bsAppCheck" name="c4" value="Procurement_type" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Project Status</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcTypeCheck" name="c5" value="Funding" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2"> Remarks</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="fundCheck" name="c6" value="AppearsIn_Bussplan" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Action Required</label></th>

									  <th scope="col"><button class="Button btn-primary" onclick="printDiv()">PRINT</button></th>

									</tr>	 
							</table>
							</form>
						</div>
									
						<?php
						include('connection.php');
						$get="SELECT * 
						FROM implementation_status";?>
											<div  style="overflow-x:scroll;">
											<div id="printableTable">
											<table id="results" class="table table-striped table-hover table-condensed table-bordered" style="height: 400px">
												<tr style="background-color:#fff5e6">
													<th class="prjCodeTd">Proj.Code</th>
													<th class="prjNameTd">Impl.Code</th>
													<th class="pcCodeTd">Impl.Status</th>
													<th class="pcTypeTd">Remarks</th>
													<th class="fundTd">Action.Required</th>
													<th class="bsAppTd">Proj.Status</th>
												</tr>
												
												<?php $run_sql=mysqli_query($connection,$get);
																    
												while($fetch=mysqli_fetch_array($run_sql)){	?>

						<tr bgcolor="white">
						<?php
						echo '<td class="prjCodeTd">'.$fetch['Proj_code'].'</td><td class="prjNameTd">'.$fetch['Impl_code'].'</td>';
						echo '<td class="pcCodeTd">'.$fetch['Impl_status'].'</td><td class="pcTypeTd">'.$fetch['Remarks'].'</td>';
						echo '<td class="fundTd">'.$fetch['Action_required'].'</td><td class="bsAppTd">'.$fetch['Proj_status'].'</td>';
						}?>
					</tr>
						</table>
						<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
						</div>

					</div>

				 <?php } ?>

				<!-- End action status of projects -->


				
				
				<!-- Action completed projects-->

				<?php
				$action=$_REQUEST['action'];
				if($action=='completedprojects'){
				 ?>

				 <h3><center>PLEASE SELECT FIELDS TO DISPLAY |<font color="#0F9AC7"> Completed Projects Report</font></center></h3>
				 	
						<div class="form-check form-check-inline">
							<form method="post">
							<table class="table table-sm detail-view  table-condensed" style="background-color: #FEFDFA;">
								
								<tr>
									<th scope="col"></th>
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCodeCheck" name="c1" value="Proj_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Project Code  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjNameCheck" name="c2" value="Proj_name" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Name</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcCodeCheck" name="c3" value="Procurement_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Procurement Code</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcTypeCheck" name="c4" value="Procurement_type" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Procurement Type  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="fundCheck" name="c5" value="Funding" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2"> Funding</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="bsAppCheck" name="c6" value="AppearsIn_Bussplan" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">AppearsBussPlan</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inDateCheck" name="c7" value="DateOf_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Date of Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inCostCheck" name="c8" value="CostAt_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2">Cost at Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjImpCheck" name="c9" value="Proj_implementer" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Project Implementer</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjManCheck" name="c10" value="Proj_manager" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Project Manager</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCoodCheck" name="c11" value="Proj_coordinator" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Coordinator</label></th>
									</tr>

									<tr>
									<th scope="col">&nbsp;</th>
									  <th scope="col">&nbsp;</th>
									  <th scope="col"><input  type="checkbox" id="ppsCheck" name="c12" value="Purpose" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Purpose</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="scopeCheck" name="c13" value="Scope" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Scope</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="cntDateCheck" name="c14" value="DateOf_contract" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Date of contract</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnCostCheck" name="c15" value="Planned_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Planned costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="crCostCheck" name="c16" value="Current_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Current costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnDaysCheck" name="c17" value="Planned_completion" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Planned completion(days)</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="strtDateCheck" name="c18" value="Impl_StartDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation StartDate</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="endDateCheck" name="c19" value="Impl_EndDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation EndDate</label></th>
									  
									  <th scope="col"><button class="Button btn-primary" onclick="printDiv()">PRINT</button></th>
									  <th scope="col">&nbsp;</th>
									</tr>	 
							</table>
							</form>
						</div>
						<?php
           				include('connection.php');
					      $get="SELECT * FROM implementation_status, general_information
					      WHERE general_information.Proj_code=implementation_status.Proj_code AND Proj_status='Completed'"?>
      									<div  style="overflow-x:scroll;">
      										<div id="printableTable">
											<table id="results" class="table table-striped table-hover table-condensed table-bordered">
												<tr style="background-color:#fff5e6">
													<th class="prjCodeTd">Proj.Code</th>
													<th class="prjNameTd">Proj.Name</th>
													<th class="pcCodeTd">Proc.Code</th>
													<th class="pcTypeTd">Proc.Type</th>
													<th class="fundTd">Funding</th>
													<th class="bsAppTd">Appear B/P</th>
													<th class="inDateTd">In.Date</th>
													<th class="inCostTd">Cost@In</th>
													<th class="prjImpTd">Proj.Imp</th>
													<th class="prjManTd">Proj.Man</th>
													<th class="prjCoodTd">Proj.Cordt</th>
													<th class="ppsTd">Purpose</th>
													<th class="scopeTd">Scope</th>
													<th class="cntDateTd">Date.Ctrct</th>
													<th class="plnCostTd">Planned.Cst</th>
													<th class="crCostTd">Current.Cst</th>
													<th class="plnDaysTd">PlannedDays</th>
													<th class="strtDateTd">Impl.Strt</th>
													<th class="endDateTd">Impl-End</th>
													<th>Proj.Status</th>
												</tr>
					      <?php $run_sql=mysqli_query($connection,$get);
					      while($fetch=mysqli_fetch_array($run_sql)){ 	?>

						<tr bgcolor="white"> 

				         <?php 
				         echo '<td class="prjCodeTd">'.$fetch['Proj_code'].'</td><td class="prjNameTd">'.$fetch['Proj_name'].'</td>';
						 echo '<td class="pcCodeTd">'.$fetch['Procurement_code'].'</td><td class="pcTypeTd">'.$fetch['Procurement_type'].'</td>';
						 echo '<td class="fundTd">'.$fetch['Funding'].'</td><td class="bsAppTd">'.$fetch['AppearsIn_BussPlan'].'</td>';
						 echo '<td class="inDateTd">'.$fetch['DateOf_initiation'].'</td><td class="inCostTd">'.$fetch['CostAt_initiation'].'</td>';
						 echo '<td class="prjImpTd">'.$fetch['Proj_implementer'].'</td><td class="prjManTd">'.$fetch['Proj_manager'].'</td>';
						 echo '<td class="prjCoodTd">'.$fetch['Proj_coordinator'].'</td><td class="ppsTd">'.$fetch['Purpose'].'</td>';
						 echo '<td class="scopeTd">'.$fetch['Scope'].'</td><td class="cntDateTd">'.$fetch['DateOf_contract'].'</td>';
						 echo '<td class="plnCostTd">'.$fetch['Planned_costing'].'</td><td class="crCostTd">'.$fetch['Current_costing'].'</td>';
						 echo '<td class="plnDaysTd">'.$fetch['Planned_completion'].'</td><td class="strtDateTd">'.$fetch['Impl_StartDate'].'</td>';
						 echo '<td class="endDateTd">'.$fetch['Impl_EndDate'].'</td><td>'.$fetch['Proj_status'].'</td>';
				          
						}		
						mysqli_close($connection);
				        ?>
					</tr>
					</table>
					<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
					</div>
					</div>

				 <?php } ?>

				<!-- End action completed projects -->


				
				<!-- Action running projects-->

				<?php
				$action=$_REQUEST['action'];
				if($action=='runningprojects'){
				 ?>

				 <h3><center>PLEASE SELECT FIELDS TO DISPLAY |<font color="#0F9AC7"> Running Projects Report</font></center></h3>
				 	
						<div class="form-check form-check-inline">
							<form method="post">
							<table class="table table-sm detail-view  table-condensed" style="background-color: #FEFDFA;">
								
								<tr>
									<th scope="col"></th>
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCodeCheck" name="c1" value="Proj_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Project Code  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjNameCheck" name="c2" value="Proj_name" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Name</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcCodeCheck" name="c3" value="Procurement_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Procurement Code</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcTypeCheck" name="c4" value="Procurement_type" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Procurement Type  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="fundCheck" name="c5" value="Funding" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2"> Funding</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="bsAppCheck" name="c6" value="AppearsIn_Bussplan" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">AppearsBussPlan</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inDateCheck" name="c7" value="DateOf_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Date of Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inCostCheck" name="c8" value="CostAt_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2">Cost at Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjImpCheck" name="c9" value="Proj_implementer" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Project Implementer</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjManCheck" name="c10" value="Proj_manager" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Project Manager</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCoodCheck" name="c11" value="Proj_coordinator" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Coordinator</label></th>
									</tr>

									<tr>
									<th scope="col">&nbsp;</th>
									  <th scope="col">&nbsp;</th>
									  <th scope="col"><input  type="checkbox" id="ppsCheck" name="c12" value="Purpose" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Purpose</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="scopeCheck" name="c13" value="Scope" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Scope</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="cntDateCheck" name="c14" value="DateOf_contract" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Date of contract</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnCostCheck" name="c15" value="Planned_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Planned costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="crCostCheck" name="c16" value="Current_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Current costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnDaysCheck" name="c17" value="Planned_completion" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Planned completion(days)</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="strtDateCheck" name="c18" value="Impl_StartDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation StartDate</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="endDateCheck" name="c19" value="Impl_EndDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation EndDate</label></th>
									  
									  <th scope="col"><button class="Button btn-primary" onclick="printDiv()">PRINT</button></th>
									  <th scope="col">&nbsp;</th>
									</tr>	 
							</table>
							</form>
						</div>
						<?php
           				include('connection.php');
					      $get="SELECT * FROM implementation_status, general_information
					      WHERE general_information.Proj_code=implementation_status.Proj_code AND Proj_status='Running'"?>
      									<div  style="overflow-x:scroll;">
      										<div id="printableTable">
											<table id="results" class="table table-striped table-hover table-condensed table-bordered">
												<tr style="background-color:#fff5e6">
													<th class="prjCodeTd">Proj.Code</th>
													<th class="prjNameTd">Proj.Name</th>
													<th class="pcCodeTd">Proc.Code</th>
													<th class="pcTypeTd">Proc.Type</th>
													<th class="fundTd">Funding</th>
													<th class="bsAppTd">Appear B/P</th>
													<th class="inDateTd">In.Date</th>
													<th class="inCostTd">Cost@In</th>
													<th class="prjImpTd">Proj.Imp</th>
													<th class="prjManTd">Proj.Man</th>
													<th class="prjCoodTd">Proj.Cordt</th>
													<th class="ppsTd">Purpose</th>
													<th class="scopeTd">Scope</th>
													<th class="cntDateTd">Date.Ctrct</th>
													<th class="plnCostTd">Planned.Cst</th>
													<th class="crCostTd">Current.Cst</th>
													<th class="plnDaysTd">PlannedDays</th>
													<th class="strtDateTd">Impl.Strt</th>
													<th class="endDateTd">Impl-End</th>
													<th>Proj.Status</th>
												</tr>
					      <?php $run_sql=mysqli_query($connection,$get);
					      while($fetch=mysqli_fetch_array($run_sql)){ 	?>

						<tr bgcolor="white"> 

				         <?php 
				         echo '<td class="prjCodeTd">'.$fetch['Proj_code'].'</td><td class="prjNameTd">'.$fetch['Proj_name'].'</td>';
						 echo '<td class="pcCodeTd">'.$fetch['Procurement_code'].'</td><td class="pcTypeTd">'.$fetch['Procurement_type'].'</td>';
						 echo '<td class="fundTd">'.$fetch['Funding'].'</td><td class="bsAppTd">'.$fetch['AppearsIn_BussPlan'].'</td>';
						 echo '<td class="inDateTd">'.$fetch['DateOf_initiation'].'</td><td class="inCostTd">'.$fetch['CostAt_initiation'].'</td>';
						 echo '<td class="prjImpTd">'.$fetch['Proj_implementer'].'</td><td class="prjManTd">'.$fetch['Proj_manager'].'</td>';
						 echo '<td class="prjCoodTd">'.$fetch['Proj_coordinator'].'</td><td class="ppsTd">'.$fetch['Purpose'].'</td>';
						 echo '<td class="scopeTd">'.$fetch['Scope'].'</td><td class="cntDateTd">'.$fetch['DateOf_contract'].'</td>';
						 echo '<td class="plnCostTd">'.$fetch['Planned_costing'].'</td><td class="crCostTd">'.$fetch['Current_costing'].'</td>';
						 echo '<td class="plnDaysTd">'.$fetch['Planned_completion'].'</td><td class="strtDateTd">'.$fetch['Impl_StartDate'].'</td>';
						 echo '<td class="endDateTd">'.$fetch['Impl_EndDate'].'</td><td>'.$fetch['Proj_status'].'</td>';
				          
						}		
						mysqli_close($connection);
				        ?>
					</tr>
					</table>
					<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
					</div>
					</div>

				 <?php } ?>

				<!-- End action running projects -->



				<!-- Action stalled projects-->

				<?php
				$action=$_REQUEST['action'];
				if($action=='stalledprojects'){
				 ?>

				 <h3><center>PLEASE SELECT FIELDS TO DISPLAY |<font color="#0F9AC7"> Stalled Projects Report</font></center></h3>
				 	
						<div class="form-check form-check-inline">
							<form method="post">
							<table class="table table-sm detail-view  table-condensed" style="background-color: #FEFDFA;">
								
								<tr>
									<th scope="col"></th>
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCodeCheck" name="c1" value="Proj_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Project Code  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjNameCheck" name="c2" value="Proj_name" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Name</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcCodeCheck" name="c3" value="Procurement_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Procurement Code</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcTypeCheck" name="c4" value="Procurement_type" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Procurement Type  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="fundCheck" name="c5" value="Funding" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2"> Funding</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="bsAppCheck" name="c6" value="AppearsIn_Bussplan" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">AppearsBussPlan</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inDateCheck" name="c7" value="DateOf_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Date of Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inCostCheck" name="c8" value="CostAt_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2">Cost at Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjImpCheck" name="c9" value="Proj_implementer" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Project Implementer</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjManCheck" name="c10" value="Proj_manager" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Project Manager</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCoodCheck" name="c11" value="Proj_coordinator" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Coordinator</label></th>
									</tr>

									<tr>
									<th scope="col">&nbsp;</th>
									  <th scope="col">&nbsp;</th>
									  <th scope="col"><input  type="checkbox" id="ppsCheck" name="c12" value="Purpose" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Purpose</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="scopeCheck" name="c13" value="Scope" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Scope</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="cntDateCheck" name="c14" value="DateOf_contract" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Date of contract</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnCostCheck" name="c15" value="Planned_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Planned costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="crCostCheck" name="c16" value="Current_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Current costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnDaysCheck" name="c17" value="Planned_completion" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Planned completion(days)</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="strtDateCheck" name="c18" value="Impl_StartDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation StartDate</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="endDateCheck" name="c19" value="Impl_EndDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation EndDate</label></th>
									  
									  <th scope="col"><button class="Button btn-primary" onclick="printDiv()">PRINT</button></th>
									  <th scope="col">&nbsp;</th>
									</tr>	 
							</table>
							</form>
						</div>
						<?php
           				include('connection.php');
					      $get="SELECT * FROM implementation_status, general_information
					      WHERE general_information.Proj_code=implementation_status.Proj_code AND Proj_status='Stalled'"?>
      									<div  style="overflow-x:scroll;">
      										<div id="printableTable">
											<table id="results" class="table table-striped table-hover table-condensed table-bordered">
												<tr style="background-color:#fff5e6">
													<th class="prjCodeTd">Proj.Code</th>
													<th class="prjNameTd">Proj.Name</th>
													<th class="pcCodeTd">Proc.Code</th>
													<th class="pcTypeTd">Proc.Type</th>
													<th class="fundTd">Funding</th>
													<th class="bsAppTd">Appear B/P</th>
													<th class="inDateTd">In.Date</th>
													<th class="inCostTd">Cost@In</th>
													<th class="prjImpTd">Proj.Imp</th>
													<th class="prjManTd">Proj.Man</th>
													<th class="prjCoodTd">Proj.Cordt</th>
													<th class="ppsTd">Purpose</th>
													<th class="scopeTd">Scope</th>
													<th class="cntDateTd">Date.Ctrct</th>
													<th class="plnCostTd">Planned.Cst</th>
													<th class="crCostTd">Current.Cst</th>
													<th class="plnDaysTd">PlannedDays</th>
													<th class="strtDateTd">Impl.Strt</th>
													<th class="endDateTd">Impl-End</th>
													<th>Proj.Status</th>
												</tr>
					      <?php $run_sql=mysqli_query($connection,$get);
					      while($fetch=mysqli_fetch_array($run_sql)){ 	?>

						<tr bgcolor="white"> 

				         <?php 
				         echo '<td class="prjCodeTd">'.$fetch['Proj_code'].'</td><td class="prjNameTd">'.$fetch['Proj_name'].'</td>';
						 echo '<td class="pcCodeTd">'.$fetch['Procurement_code'].'</td><td class="pcTypeTd">'.$fetch['Procurement_type'].'</td>';
						 echo '<td class="fundTd">'.$fetch['Funding'].'</td><td class="bsAppTd">'.$fetch['AppearsIn_BussPlan'].'</td>';
						 echo '<td class="inDateTd">'.$fetch['DateOf_initiation'].'</td><td class="inCostTd">'.$fetch['CostAt_initiation'].'</td>';
						 echo '<td class="prjImpTd">'.$fetch['Proj_implementer'].'</td><td class="prjManTd">'.$fetch['Proj_manager'].'</td>';
						 echo '<td class="prjCoodTd">'.$fetch['Proj_coordinator'].'</td><td class="ppsTd">'.$fetch['Purpose'].'</td>';
						 echo '<td class="scopeTd">'.$fetch['Scope'].'</td><td class="cntDateTd">'.$fetch['DateOf_contract'].'</td>';
						 echo '<td class="plnCostTd">'.$fetch['Planned_costing'].'</td><td class="crCostTd">'.$fetch['Current_costing'].'</td>';
						 echo '<td class="plnDaysTd">'.$fetch['Planned_completion'].'</td><td class="strtDateTd">'.$fetch['Impl_StartDate'].'</td>';
						 echo '<td class="endDateTd">'.$fetch['Impl_EndDate'].'</td><td>'.$fetch['Proj_status'].'</td>';
				          
						}		
						mysqli_close($connection);
				        ?>
					</tr>
					</table>
					<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
					</div>
					</div>


				 <?php } ?>
				<!-- End action stalled projects -->


				<!-- Action terminated projects-->

				<?php
				$action=$_REQUEST['action'];
				if($action=='terminatedprojects'){
				 ?>

				<h3><center>PLEASE SELECT FIELDS TO DISPLAY |<font color="#0F9AC7"> Terminated Projects Report</font></center></h3>
				 	
						<div class="form-check form-check-inline">
							<form method="post">
							<table class="table table-sm detail-view  table-condensed" style="background-color: #FEFDFA;">
								
								<tr>
									<th scope="col"></th>
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCodeCheck" name="c1" value="Proj_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Project Code  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjNameCheck" name="c2" value="Proj_name" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Name</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcCodeCheck" name="c3" value="Procurement_code" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Procurement Code</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="pcTypeCheck" name="c4" value="Procurement_type" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Procurement Type  </label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="fundCheck" name="c5" value="Funding" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2"> Funding</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="bsAppCheck" name="c6" value="AppearsIn_Bussplan" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">AppearsBussPlan</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inDateCheck" name="c7" value="DateOf_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Date of Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="inCostCheck" name="c8" value="CostAt_initiation" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox2">Cost at Initiation</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjImpCheck" name="c9" value="Proj_implementer" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Project Implementer</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjManCheck" name="c10" value="Proj_manager" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox1">Project Manager</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="prjCoodCheck" name="c11" value="Proj_coordinator" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Project Coordinator</label></th>
									</tr>

									<tr>
									<th scope="col">&nbsp;</th>
									  <th scope="col">&nbsp;</th>
									  <th scope="col"><input  type="checkbox" id="ppsCheck" name="c12" value="Purpose" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Purpose</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="scopeCheck" name="c13" value="Scope" style="zoom:1.5" checked><br>
									  <label class="form-check-label" for="inlineCheckbox3">Scope</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="cntDateCheck" name="c14" value="DateOf_contract" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Date of contract</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnCostCheck" name="c15" value="Planned_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox2"> Planned costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="crCostCheck" name="c16" value="Current_costing" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Current costing</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="plnDaysCheck" name="c17" value="Planned_completion" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox1">Planned completion(days)</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="strtDateCheck" name="c18" value="Impl_StartDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation StartDate</label></th>
									  
									  <th scope="col"><input class="form-check-input" type="checkbox" id="endDateCheck" name="c19" value="Impl_EndDate" style="zoom:1.5" checked>
									  <label class="form-check-label" for="inlineCheckbox3">Implementation EndDate</label></th>
									  
									  <th scope="col"><button class="Button btn-primary" onclick="printDiv()">PRINT</button></th>
									  <th scope="col">&nbsp;</th>
									</tr>	 
							</table>
							</form>
						</div>
						<?php
           				include('connection.php');
					      $get="SELECT * FROM implementation_status, general_information
					      WHERE general_information.Proj_code=implementation_status.Proj_code AND Proj_status='Terminated'"?>
      									<div  style="overflow-x:scroll;">
      										<div id="printableTable">
											<table id="results" class="table table-striped table-hover table-condensed table-bordered">
												<tr style="background-color:#fff5e6">
													<th class="prjCodeTd">Proj.Code</th>
													<th class="prjNameTd">Proj.Name</th>
													<th class="pcCodeTd">Proc.Code</th>
													<th class="pcTypeTd">Proc.Type</th>
													<th class="fundTd">Funding</th>
													<th class="bsAppTd">Appear B/P</th>
													<th class="inDateTd">In.Date</th>
													<th class="inCostTd">Cost@In</th>
													<th class="prjImpTd">Proj.Imp</th>
													<th class="prjManTd">Proj.Man</th>
													<th class="prjCoodTd">Proj.Cordt</th>
													<th class="ppsTd">Purpose</th>
													<th class="scopeTd">Scope</th>
													<th class="cntDateTd">Date.Ctrct</th>
													<th class="plnCostTd">Planned.Cst</th>
													<th class="crCostTd">Current.Cst</th>
													<th class="plnDaysTd">PlannedDays</th>
													<th class="strtDateTd">Impl.Strt</th>
													<th class="endDateTd">Impl-End</th>
													<th>Proj.Status</th>
												</tr>
					      <?php $run_sql=mysqli_query($connection,$get);
					      while($fetch=mysqli_fetch_array($run_sql)){ 	?>

						<tr bgcolor="white"> 

				         <?php 
				         echo '<td class="prjCodeTd">'.$fetch['Proj_code'].'</td><td class="prjNameTd">'.$fetch['Proj_name'].'</td>';
						 echo '<td class="pcCodeTd">'.$fetch['Procurement_code'].'</td><td class="pcTypeTd">'.$fetch['Procurement_type'].'</td>';
						 echo '<td class="fundTd">'.$fetch['Funding'].'</td><td class="bsAppTd">'.$fetch['AppearsIn_BussPlan'].'</td>';
						 echo '<td class="inDateTd">'.$fetch['DateOf_initiation'].'</td><td class="inCostTd">'.$fetch['CostAt_initiation'].'</td>';
						 echo '<td class="prjImpTd">'.$fetch['Proj_implementer'].'</td><td class="prjManTd">'.$fetch['Proj_manager'].'</td>';
						 echo '<td class="prjCoodTd">'.$fetch['Proj_coordinator'].'</td><td class="ppsTd">'.$fetch['Purpose'].'</td>';
						 echo '<td class="scopeTd">'.$fetch['Scope'].'</td><td class="cntDateTd">'.$fetch['DateOf_contract'].'</td>';
						 echo '<td class="plnCostTd">'.$fetch['Planned_costing'].'</td><td class="crCostTd">'.$fetch['Current_costing'].'</td>';
						 echo '<td class="plnDaysTd">'.$fetch['Planned_completion'].'</td><td class="strtDateTd">'.$fetch['Impl_StartDate'].'</td>';
						 echo '<td class="endDateTd">'.$fetch['Impl_EndDate'].'</td><td>'.$fetch['Proj_status'].'</td>';
				          
						}		
						mysqli_close($connection);
				        ?>
					</tr>
					</table>
					<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
					</div>
					</div>

				 <?php } ?>

				<!-- End action terminated projects -->
			

			</div>
		<div class="panel-footer" style="margin-left: 0px; padding-bottom: 2px"><center><p class="copyright">&copy; 2018 All Rights Reserved:  angelobusee@gmail.com</p></center></div>
	</body>
</html>
