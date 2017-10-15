<?php include('includes/header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if (isset($_REQUEST["signup"])) 
  {
      $name = mysqli_real_escape_string($db,$_REQUEST["name"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $address = mysqli_real_escape_string($db,$_REQUEST["address"]);
      $stream = mysqli_real_escape_string($db,$_REQUEST["stream"]);
      $password = mysqli_real_escape_string($db,$_REQUEST["password"]);

      $sql = "INSERT INTO student_users(student_name,student_email,address,stream,student_phone,password) VALUES('$name','$email','$address','$stream','$phone','$password')";
      $row = mysqli_query($db,$sql);
      
      if($row)
      {
        header("location:student_login.php?msg=Please Login To Continue.");
      }
      else
      {
        header("location:student_signup.php?msg=Failed...Try Again.");
      }
  }

?>
    <!-- Page Content -->
    <div class="container-fluid" style="font-size: 18px;">

      <div class="row" style="">
        <div class="col-xs-0 col-sm-3"></div>
        <div class="col-xs-12 col-sm-6" style="margin: 15px;">
          <div class="login" style="padding: 0px">
            <br>
          <center><h3>Join and choose from 100+ companies</h3><br></center>
          <div style="padding-left: 20%">
            <form class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-4">Your Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" placeholder="Enter Your Name" name="name" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">Address:</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="email" placeholder="Enter Contact Adress" name="address" required="required"  rows="5"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Stream:</label>
                <div class="col-sm-10">
                <select class="form-control" name="stream">
                  <option value="civil">Civil Engineering</option>
                  <option value="Mechanical">Mechanical Engineering</option>
                  <option value="electrical">Electrical/Electronics Engineering</option>
                  <option value="CSE/IT">CSE/IT</option>
                  <option value="BCA/MCA">BCA/MCA</option>
                  <option value="Diploma">Diploma</option>
                  <option value="BA/LLB">BA/LLB</option>
                </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" placeholder="Enter Phone No" name="phone" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10"> 
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" required="required" name="password">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">ReType Password:</label>
                <div class="col-sm-10"> 
                  <input type="password" class="form-control" id="pwd" placeholder="Re-Enter password" required="required">
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
                    <input type="submit" class="btn btn-success" value="Sign Up" name="signup">&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="student_login.php" class="btn btn-primary">Have an Account?</a>
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