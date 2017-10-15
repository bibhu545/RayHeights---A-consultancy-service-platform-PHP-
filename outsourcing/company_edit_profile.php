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
<?php 

  if (isset($_REQUEST["update"])) 
  {
      $name = mysqli_real_escape_string($db,$_REQUEST["name"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $address = mysqli_real_escape_string($db,$_REQUEST["address"]);

      $sql = "UPDATE company_users SET
              company_name = '$name',
              company_email = '$email',
              address = '$address',
              company_phone = '$phone' WHERE company_email = '$companyid'";
      $row = mysqli_query($db,$sql);
      
      if($row)
      {
        header("location:company_view_profile.php?msg=Profile Updated");
      }
      else
      {
        header("location:company_edit_profile.php?msg=Failed...Try Again.");
      }
  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 400px">
      	<div class="col-xs-0 col-sm-0 col-md-1"></div>
        <div class="col-xs-0 col-sm-0 col-md-10">
            <br><center><h3><span style="color: blue"><?php echo $company_result["company_name"]; ?></span> - Company Details</h3></center><br>
            <h4>Details:</h4><br>
            <form>
            <table class="table table-striped">
                <tr>
                  <th>Company Name : </th>
                  <th>
                    <input type="text" name="name" value="<?php echo $company_result["company_name"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
                <tr>
                  <th>Company Email : </th>
                  <th>
                    <input type="email" name="email" value="<?php echo $company_result["company_email"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
                <tr>
                  <th>Address : </th>
                  <th>
                    <textarea name="address" required="required" class="form-control" rows="5"><?php echo $company_result["address"]; ?></textarea>
                  </th>
                </tr>
                <tr>
                  <th>Contact No : </th>
                  <th>
                    <input type="text" name="phone" value="<?php echo $company_result["company_phone"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
            </table>
            <br>
            <center>
                <input type="submit" name="update" class="btn btn-primary" onclick="return sure()" value="Update Profile">&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="Home.php" class="btn btn-success" >Cancel</a>
            </form>
            </center>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>