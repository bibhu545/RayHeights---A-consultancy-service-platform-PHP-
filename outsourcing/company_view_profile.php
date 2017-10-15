<?php include('includes/header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if(!isset($_SESSION["company"]))
    header("location:index.php?msg=You Have to Login First");
  else
  {
    $companyid = $_SESSION["company"];
    $sql = "SELECT * FROM company_users WHERE company_email = '$companyid'";
    $row2 = mysqli_query($db,$sql);
    $company_result = $row2->fetch_assoc();
  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 400px">
      	<div class="col-xs-0 col-sm-0 col-md-1"></div>
        <div class="col-xs-0 col-sm-0 col-md-10">
            <br><center><h3><span style="color: blue"><?php echo $company_result["company_name"]; ?></span> - Company Details</h3></center><br>
            <h4>Details:</h4><br>
            <table class="table table-striped">
                <tr><th>Company Id : </th><th><?php echo $company_result["company_id"]; ?></th></tr>
                <tr><th>Name : </th><th><?php echo $company_result["company_name"]; ?></th></tr>
                <tr><th>Email : </th><th><?php echo $company_result["company_email"]; ?></th></tr>
                <tr><th>Address : </th><th><?php echo $company_result["address"]; ?></th></tr>
                <tr><th>Phone : </th><th><?php echo $company_result["company_phone"]; ?></th></tr>
            </table>
            <br>
            <center>
                <a href="Home.php" class="btn btn-primary" >Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="company_edit_profile.php" class="btn btn-success" >Edit Profile</a>
            </center>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>