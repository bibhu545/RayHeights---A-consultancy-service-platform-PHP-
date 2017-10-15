<?php include('includes/login-header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

    if(isset($_REQUEST["submit"]))
    {
      $company_id = mysqli_real_escape_string($db,$_REQUEST["company"]);
      $post_title = mysqli_real_escape_string($db,$_REQUEST["title"]);
      $description = mysqli_real_escape_string($db,$_REQUEST["description"]);
      $eligibility = mysqli_real_escape_string($db,$_REQUEST["eligibility"]);
      $salary = mysqli_real_escape_string($db,$_REQUEST["salary"]);
      $vacancy = mysqli_real_escape_string($db,$_REQUEST["vacancy"]);
      $date = mysqli_real_escape_string($db,$_REQUEST["date"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);

      $sql = "INSERT INTO outsourcing(companyid,post_title,post_description,Eligibility,Salary,Vacancy,lastdate) values('$company_id','$post_title','$description','$eligibility','$salary','$vacancy','$date')";
      $row = mysqli_query($db,$sql);

      $emailid='users@rayheights.com';
      //$to="bibhuranjan.500@gmail.com";
      $to="office@rayheights.com";
      $subject="OutSourcing :: on date : ".$date;
      $msg="<html><body>Sender : ".$email."<br> Name : ".$company_id."<br>post_title : $post_title<br><br>description : $description<br><br>eligibility : $eligibility<br>salary : $salary<br><br>vacancy : $vacancy<br><br>Last : date : $date<br></body></html>";
      //echo $emailid;
      //echo $msg;
       $headers  =  "From:".$emailid."\r\n".'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       
       $result= mail($to, $subject, $msg, $headers);
       if($result)
       {
        header('location:index.php?success=Message Sent');
       }

    }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">

      <div class="row" >
        <div class="col-xs-0 col-sm-1"></div>
        <div class="col-xs-12 col-sm-10">
          <br>
          <center><h3>We care for your Requirement</h3></center>
      <center>
      <?php if(isset($_REQUEST["success"])): ?>
        <div class="alert alert-primary alert-dismissable" style="width: 50%">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?php echo htmlentities($_REQUEST["success"]); ?>.....<a href="../index.php">Go Back to Home</a></strong>
        </div>
      <?php endif; ?>
      </center>
          <form method="post">
          <div class="form-group">
            <label>Company : </label>
            <input type="text" name="company" placeholder="Enter Company Name" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Company Email : </label>
            <input type="email" name="email" placeholder="Enter Company Email" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Phone: </label>
            <input type="text" name="phone" placeholder="Enter Company Phone Number" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Post Title : </label>
            <input type="text" name="title" placeholder="Enter Job Title" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Post Description/Requirement : </label>
            <textarea name="description" placeholder="Enter Job Description" class="form-control contact" required="required" rows="8"></textarea>
          </div>
          <div class="form-group">
            <label>Eligibility/Skills : </label>
            <input type="text" name="eligibility" placeholder="Enter Job Eligibility (skills/requirements)" class="form-control contact" required="required">
          </div>

          <div class="form-group">
            <label>Salary : </label>
            <input type="text" name="salary" placeholder="Enter minimum Salary" class="form-control contact" required="required">
          </div>


          <div class="form-group">
            <label>Vacancy : </label>
            <input type="text" name="vacancy" placeholder="Enter number of positions" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Last Date : </label>
            <input type="date" name="date" placeholder="Enter Last date of apply" class="form-control contact" required="required">
          </div>
          <br>
          <div>
          <center>
            <input type="submit" name="submit" value="Submit Requirement" class="btn btn-primary">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="../index.php" class="btn btn-danger">Cancel</a>
          </center>
          </div>
        </form>
          <br>
        </div>
        <div class="col-xs-0 col-sm-1"></div>
      </div>
      <!-- /.row -->

      <div class="row">

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>