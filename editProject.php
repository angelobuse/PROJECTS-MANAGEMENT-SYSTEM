<?php	
include('connection.php');
if (isset($_POST['save'])) {


$pcode = $_POST['pcode'];
$pname = $_POST['pname'];
$prcode= $_POST['prcode'];
$prtype=$_POST['prtype'];
$fund=$_POST['fund'];
$inbusplan = $_POST['inbzp'];
$initdate = $_POST['initdate'];
$costInit = $_POST['costInit'];
$pimpl=$_POST['pimpl'];
$pman=$_POST['pman'];
$pcoo=$_POST['pcoo'];
$contdate = $_POST['contd'];
$ppose = $_POST['ppose'];
$pscope=$_POST['pscope'];
$pcost = $_POST['pcost'];
$ccost=$_POST['ccost'];
$pcdays=$_POST['pcdays'];
$impstartdate=$_POST['impstartdate'];
$impenddate=$_POST['impenddate'];


$sql="UPDATE general_information SET Proj_name='$pname',Procurement_code='$prcode',Procurement_type='$prtype', Funding='$fund',AppearsIn_BussPlan='$inbusplan', DateOf_initiation='$initdate', CostAt_initiation='$costInit', Proj_implementer='$pimpl', Proj_manager='$pman', Proj_coordinator='$pcoo', Purpose='$ppose', Scope='$pscope', DateOf_Contract='$contdate', Planned_costing='$pcost', Current_Costing='$ccost', Planned_completion='$pcdays', Impl_StartDate='$impstartdate', Impl_EndDate='$impenddate' WHERE Proj_code='$pcode' ";
$run_sql=mysqli_query($connection,$sql);
if($run_sql){
header ("location:pdetail.php?Proj_code=$pcode");


}else {
echo "<script>alert('Error! Project was not updated successfully'); window.location='home.php?action=settings'</script>";
}
}
?>
												

