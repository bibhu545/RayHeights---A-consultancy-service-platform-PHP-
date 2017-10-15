<?php include('includes/header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if(!isset($_SESSION["company"]))
    header("location:index.php?msg=You Have to Login First");
  else
  {
    $id = $_REQUEST["id"];
    $sql = "SELECT * FROM outsourcing WHERE outsource_id = '$id'";
      $row = mysqli_query($db,$sql);
      $result = $row->fetch_assoc();
  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 300px">
      	<div class="col-xs-0 col-sm-0 col-md-1"></div>
        <div class="col-xs-0 col-sm-0 col-md-10">
            <br><center><h3>Post Details</h3></center><br>
            <h4 style="color: blue"><b><?php echo $result["post_title"]; ?></b></h4>
            <p style="font-size: 19px"><?php echo $result["post_description"];?></p>
            <h4>Details:</h4><br>
            <table class="table table-striped">
                <tr><th>Eligibility : </th><th><?php echo $result["Eligibility"]; ?></th></tr>
                <tr><th>Salary : </th><th><?php echo $result["Salary"]; ?></th></tr>
                <tr><th>Vacancy : </th><th><?php echo $result["Vacancy"]; ?></th></tr>
                <tr><th>Last Date : </th><th><?php echo $result["lastdate"]; ?></th></tr>
                <tr><th>Post Date : </th><th><?php echo $result["postdate"]; ?></th></tr>
                <tr><th>Status : </th><th><?php echo $result["status"]; ?></th></tr>
            </table>
            <br>
            <center>
                <a href="delete_post.php?id=<?php echo $result["outsource_id"]; ?>" class="btn btn-danger" >Delete Post</a>
                <a href="Home.php" class="btn btn-primary" >Home</a>
            </center>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>