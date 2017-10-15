<?php 

  include('../includes/Database.php');
  session_start();
  if(isset($_REQUEST["login"]))
  {
      $admin_id = mysqli_real_escape_string($db,$_REQUEST["admin_id"]);
      $password = mysqli_real_escape_string($db,$_REQUEST["password"]);
      $sql = "SELECT * FROM admin_master WHERE admin_user = '$admin_id' AND password = '$password'";
      $row = mysqli_query($db,$sql);
      $result = mysqli_fetch_assoc($row);
      
      if(mysqli_num_rows($row) == 1)
      {
        header("location:adminHome.php");
        $_SESSION["admin"] = $admin_id;
      }
      else
      {
        header("location:index.php?err=Invalid Identity");
      }
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>RayHeights - Admin Authentication</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <center>
      <?php if(isset($_REQUEST["err"])): ?>
        <div class="alert alert-primary alert-dismissable" style="width: 50%">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?php echo htmlentities($_REQUEST["err"]); ?></strong>
        </div>
      <?php endif; ?>
      </center>
      <form class="form-signin">
        <center><h2 class="form-signin-heading">Sign-in</h2></center>
        <label for="inputEmail" class="sr-only">Admin id</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Admin Id" required autofocus name="admin_id">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
<!--         <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <input class="btn btn-lg btn-primary btn-block" type="submit" vlaue="Sign in" name="login">
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript -->
        <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>









