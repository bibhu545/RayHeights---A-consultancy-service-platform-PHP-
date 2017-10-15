<?php include('includes/home-header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();

    $studentid = $_SESSION["student"];
    $sql = "SELECT * FROM student_users WHERE student_email = '$studentid'";
    $row2 = mysqli_query($db,$sql);
    $student_result = $row2->fetch_assoc();
  
?>

<?php 


      if(isset($_FILES['image']))
      {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $expensions= array("jpeg","jpg","png","pdf","doc","docx");
        
        if(in_array($file_ext,$expensions)=== false)
        {
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152)
        {
           $errors[]='File size must be excately 2 MB';
        }
        echo $file_type;
        if(empty($errors)==true)
        {
           move_uploaded_file($file_tmp,"../images/resumes/"."$studentid.".$file_ext);
            $resume = $studentid.".".$file_ext;
            $sql = "UPDATE student_users SET
                    resume = '$resume' WHERE student_email = '$studentid'";
            $row = mysqli_query($db,$sql);
           //echo "Success";
      }else
      {
         print_r($errors);
      }
   }
  

?>
<?php 

  if (isset($_REQUEST["update"])) 
  {
      $name = mysqli_real_escape_string($db,$_REQUEST["name"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $address = mysqli_real_escape_string($db,$_REQUEST["address"]);
      $stream = mysqli_real_escape_string($db,$_REQUEST["stream"]);
      $skills = mysqli_real_escape_string($db,$_REQUEST["skills"]);
      
      $sql = "UPDATE student_users SET
              student_name = '$name',
              student_email = '$email',
              address = '$address',
              stream = '$stream',
              student_phone = '$phone',
              skills = '$skills' WHERE student_email = '$studentid'";
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
<html>
   <body>
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 400px">
         <div class="col-xs-0 col-sm-0 col-md-1"></div>
        <div class="col-xs-0 col-sm-0 col-md-10">
            <br><center><h3><span style="color: blue"><?php echo $student_result["student_name"]; ?></span> - Your Details</h3></center><br>
            <h4>Details:</h4><br>
      <form action="" method="POST" enctype="multipart/form-data">
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
                  <th>Skills : </th>
                  <th>
                  <select class="form-control" name="stream">
                    <option value="civil">Civil Engineering</option>
                    <option value="Mechanical">Mechanical Engineering</option>
                    <option value="electrical">Electrical/Electronics Engineering</option>
                    <option value="CSE/IT">CSE/IT</option>
                    <option value="BCA/MCA">BCA/MCA</option>
                    <option value="Diploma">Diploma</option>
                    <option value="BA/LLB">BA/LLB</option>
                  </select>
                  </th>
                </tr>
                <tr>
                  <th>Contact No : </th>
                  <th>
                    <input type="text" name="phone" value="<?php echo $student_result["student_phone"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
                <tr>
                  <th>Skills : </th>
                  <th>
                    <input type="text" name="skills" value="<?php echo $student_result["skills"]; ?>" required="required" class="form-control">
                  </th>
                </tr>
                <tr>
                  <th>Resume : <br>*(pdf or doc)*</th>
                  <th>
                    <input type="file" class="form-control" name="image" />
                  </th>
                </tr>
            </table>
            <br>
         <center>
         <input type="submit" class="btn btn-primary" name="update" />
         <a href="studentHome.php" class="btn btn-success" >Cancel</a>
         </center>
      </form>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>
   </body>
</html>