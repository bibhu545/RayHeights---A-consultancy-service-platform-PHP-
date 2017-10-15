<?php include('includes/home-header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if(!isset($_SESSION["student"]))
    header("location:index.php?msg=You Have to Login First");
  else
  {
    $studentid = $_SESSION["student"];
    $sql = "SELECT * FROM student_users WHERE student_email = '$studentid'";
    $row2 = mysqli_query($db,$sql);
    $student_result = $row2->fetch_assoc();
  }

?>
<?php 

  if (isset($_REQUEST["update"])) 
  {
      $name = mysqli_real_escape_string($db,$_REQUEST["name"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $address = mysqli_real_escape_string($db,$_REQUEST["address"]);

      $sql = "UPDATE student_users SET
              student_name = '$name',
              student_email = '$email',
              address = '$address',
              student_phone = '$phone' WHERE student_email = '$studentid'";
      $row = mysqli_query($db,$sql);
      
      if($row)
      {
        header("location:student_view_profile.php?msg=Profile Updated");
      }
      else
      {
        header("location:student_edit_profile.php?msg=Failed...Try Again.");
      }
  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 400px">
      	<div class="col-xs-0 col-sm-0 col-md-1"></div>
        <div class="col-xs-0 col-sm-0 col-md-10">
            <br><center><h3><span style="color: blue"><?php echo $student_result["student_name"]; ?></span> - Your Details</h3></center><br>
            <h4>Details:</h4><br>
            <form>
            <table class="table table-striped">
                <tr>
                  <th>Name : </th>
                  <th>
                    <input type="text" name="name" value="<?php echo $student_result["student_name"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
                <tr>
                  <th>Email : </th>
                  <th>
                    <input type="email" name="email" value="<?php echo $student_result["student_email"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
                <tr>
                  <th>Address : </th>
                  <th>
                    <textarea name="address" required="required" class="form-control" rows="5"><?php echo $student_result["address"]; ?></textarea>
                  </th>
                </tr>
                <tr>
                  <th>Contact No : </th>
                  <th>
                    <input type="text" name="phone" value="<?php echo $student_result["student_phone"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
            </table>
            <br>
            <center>
                <input type="submit" name="update" class="btn btn-primary" onclick="return sure()" value="Update Profile">&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="studentHome.php" class="btn btn-success" >Cancel</a>
            </form>
            </center>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>