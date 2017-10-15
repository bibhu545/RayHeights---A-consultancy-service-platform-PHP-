<?php include('includes/header.php'); ?>
<?php include('includes/Database.php'); ?>
<?php 

    if(isset($_REQUEST["submit"]))
    {
      $company_id = mysqli_real_escape_string($db,$_REQUEST["company"]);
      $post_title = mysqli_real_escape_string($db,$_REQUEST["title"]);
      $description = mysqli_real_escape_string($db,$_REQUEST["description"]);
      $date = mysqli_real_escape_string($db,$_REQUEST["date"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);


      $emailid='users@rayheights.com';
      //$to="bibhuranjan.500@gmail.com";
      $to="office@rayheights.com";
      $subject=" :: Event Management :: ";
      $msg="<html><body>Sender : ".$email."<br> Name : ".$company_id."<br>post_title : $post_title<br><br>description : $description<br><br>Last : date : $date<br></body></html>";
      //echo $emailid;
      //echo $msg;
       $headers  =  "From:".$emailid."\r\n".'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       
       $result= mail($to, $subject, $msg, $headers);
       if($result)
       {
        header('location:event_management.php?success=Message Sent');
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
            <label>Name : </label>
            <input type="text" name="company" placeholder="Enter Name" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Email : </label>
            <input type="email" name="email" placeholder="Enter Email" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Phone: </label>
            <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Event Title : </label>
            <input type="text" name="title" placeholder="Enter Event Title" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Event Description : </label>
            <textarea name="description" placeholder="Enter Event Description" class="form-control contact" required="required" rows="8"></textarea>
          </div>
          <div class="form-group">
            <label>Date : </label>
            <input type="date" name="date" placeholder="Enter Event Date" class="form-control contact" required="required">
          </div>


          <br>
          <div>
          <center>
            <input type="submit" name="submit" value="Submit Requirement" class="btn btn-primary">
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="home.php" class="btn btn-danger">Cancel</a>
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