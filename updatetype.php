<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $id=$_GET['id'];
    $type=$_POST['type'];
     $status=$_POST['status'];
     
    $query=mysqli_query($con, "update typeexpense set ExpenseType ='$type',ExpenseStatus ='$status' where id ='$id'");
if($query){
echo "<script>alert('TypeExpense has been updated');</script>";
echo "<script>window.location.href='type_manage.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>";

}
  
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || update Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<?php include_once('includes/header.php');?>
	<?php include_once('includes/sidebar.php');?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Expense update</li>
			</ol>
		</div><!--/.row-->
		
		
				
		
		<div class="row">
			<div class="col-lg-12">
			
				
				
				<div class="panel panel-default">
					<div class="panel-heading">Expense update</div>
					<div class="panel-body">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<div class="col-md-12">
						<?php
              $userid=$_GET['id'];
$ret=mysqli_query($con,"select * from typeexpense where id ='$userid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
							
							<form role="form" method="POST" action="">
                            <div class="form-group">
                            <label for="type">Type Expense:</label>
  <select name="type" id="type">
  <option value="">Type</option>
    <option value="Online" <?php if( $row['ExpenseType']=="Online")
                                                             {echo "selected";}
                                             ?>>Online</option>
    <option value="Offline" <?php if( $row['ExpenseType']=="Offline")
                                                             {echo "selected";}
                                             ?>>Offline</option>
    
  </select>  
    <label for="status">Status:</label>
  <select name="status" id="status">
  <option value="">Type</option>
    <option value="Active" <?php if( $row['ExpenseStatus']=="Active")
                                                             {echo "selected";}
                                             ?>>Active</option>
    <option value="Inactive" <?php if( $row['ExpenseStatus']=="Inactive")
                                                             {echo "selected";}
                                             ?>>Inactive</option>
    
  </select></div>
  
								
																
								<div class="form-group has-success">
									<button type="submit" class="btn btn-primary" name="submit">update</button>
								</div>
								
								
								
								
							
								<?php } ?>
							</form>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
			<?php include_once('includes/footer.php');?>
		</div><!-- /.row -->
	</div><!--/.main-->
	
<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>
<?php 
} 
?>
