<?php include('includes/header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if (isset($_REQUEST["login"])) 
  {
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);
      $password = mysqli_real_escape_string($db,$_REQUEST["password"]);
      
      $sql = "SELECT * FROM student_users WHERE student_email='$email' AND password='$password'";
      $row = mysqli_query($db,$sql);
      $result = mysqli_fetch_assoc($row);
      if(mysqli_num_rows($row) == 1)
      {
        $_SESSION["student"] = $_REQUEST["email"];
        header("location:studentHome.php");
      }
      else
      {
        header("location:student_login.php?msg=Invalid Details");
      }
  }

?>
    <!-- Page Content -->
    <div class="container-fluid" style="font-size: 18px;" >

      <div class="row" style="">
        <div class="col-xs-0 col-sm-3"></div>
        <div class="col-xs-12 col-sm-6" style="margin: 15px;">
          <div class="login" style="padding: 0px">
            <br>
          <center><h3>Login and explore opertunities</h3><br></center>
          <center>
          <?php if(isset($_REQUEST["msg"])): ?>
            <div class="alert alert-danger alert-dismissable" style="width: 50%">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo htmlentities($_REQUEST["msg"]); ?></strong>
            </div>
          <?php endif; ?>
          </center>
          <div style="padding-left: 20%">
            <form class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10"> 
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" required="required" name="password">
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                  </div>
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <center>
                    <input type="submit" class="btn btn-success" value="Login" name="login">&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="student_signup.php" class="btn btn-primary">Join Now</a>
                  </center>
                  <br>
                </div>
              </div>
            </form>            
          </div>
        </div>
        </div>
        <div class="col-xs-0 col-sm-3"></div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php include('includes/footer.php'); ?>