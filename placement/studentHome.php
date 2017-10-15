<?php include('includes/home-header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if(!isset($_SESSION["student"]))
    header("location:index.php?msg=You Have to Login First");
  else
  {
  	$id = $_SESSION["student"];
  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 300px">
      	
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>