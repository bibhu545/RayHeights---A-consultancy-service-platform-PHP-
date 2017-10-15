<?php include('includes/home-header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if(!isset($_SESSION["student"]))
    header("location:student_login.php?msg=You Have to Login First");
  else
  {
    $companyid = $_SESSION["student"];
    $sql = "SELECT * FROM student_users WHERE student_email = '$companyid'";
    $row2 = mysqli_query($db,$sql);
    $company_result = $row2->fetch_assoc();
  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 400px">
      	<div class="col-xs-0 col-sm-0 col-md-1"></div>
        <div class="col-xs-0 col-sm-0 col-md-10">
            <br><center><h3><span style="color: blue"><?php echo $company_result["student_name"]; ?></span></h3></center><br>
            <center>
            <?php if(isset($_REQUEST["msg"])): ?>
              <div class="alert alert-primary alert-dismissable" style="width: 50%">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong><?php echo htmlentities($_REQUEST["msg"]); ?></strong>
              </div>
            <?php endif; ?>
            </center>
            <h4>Details:</h4><br>
            <table class="table table-striped">
                <tr><th>Student Id : </th><th><?php echo $company_result["student_id"]; ?></th></tr>
                <tr><th>Name : </th><th><?php echo $company_result["student_name"]; ?></th></tr>
                <tr><th>Email : </th><th><?php echo $company_result["student_email"]; ?></th></tr>
                <tr><th>Address : </th><th><?php echo $company_result["address"]; ?></th></tr>
                <tr><th>Stream : </th><th><?php echo $company_result["stream"]; ?></th></tr>
                <tr><th>Phone : </th><th><?php echo $company_result["student_phone"]; ?></th></tr>
                <tr><th>Skills : </th><th><?php echo $company_result["skills"]; ?></th></tr>
                <tr>
                  <th>Resume : </th>
                  <th>
                    <a href="../images/resumes/<?php echo $company_result["resume"]; ?>"><?php echo $company_result["resume"]; ?></a>
                  </th>
                </tr>
            </table>
            <br>
            <center>
                <a href="studentHome.php" class="btn btn-primary" >Home</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="student_edit_profile.php" class="btn btn-success" >Edit/complete Profile</a>
            </center>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>