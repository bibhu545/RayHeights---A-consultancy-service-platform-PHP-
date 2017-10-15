<?php include('includes/header.php'); ?>
<?php 

  include '../includes/Database.php';
  session_start();
  if(!isset($_SESSION["admin"]))
  {
    header("location:index.php?err=You Have to Login First");
  }
  else
  {
    $sql1 = "SELECT * FROM outsourcing";
    $num = mysqli_query($db,$sql1);
    $row = mysqli_num_rows($num);
  }
?>

  
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h3>RayHeights - Admin Area</h3><br>
          <center>
          <?php if(isset($_REQUEST["msg"])): ?>
            <div class="alert alert-success alert-dismissable" style="width: 50%">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo htmlentities($_REQUEST["msg"]); ?></strong>
            </div>
          <?php endif; ?>
          </center>
        </div>
        <br>
        <br>
        <center>
          <a href="outsource.php" class="btn btn-primary btn-lg button">
            Outsourcing <span class="badge"><?php echo $row; ?></span>
          </a>
        </center><br>
        <center><a href="outsource.php" class="btn btn-primary btn-lg button">Training &amp; Placement <span class="badge">5</span></a></center><br>
        <center><a href="outsource.php" class="btn btn-primary btn-lg button">Car Loan <span class="badge">5</span></a></center><br>
        <center><a href="outsource.php" class="btn btn-primary btn-lg button">Home Loan <span class="badge">5</span></a></center><br>
        <center><a href="outsource.php" class="btn btn-primary btn-lg button">Term Life <span class="badge">5</span></a></center><br>
        <center><a href="outsource.php" class="btn btn-primary btn-lg button">Health Insurance <span class="badge">5</span></a></center><br>
      </div>
    </div>
  <footer>
    <div class="col-xs-12" style="background-color: #444141;padding: 45px;color: white">
      <center>&copy; CopyRight RayHeights pvt. ltd.</center>
    </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
