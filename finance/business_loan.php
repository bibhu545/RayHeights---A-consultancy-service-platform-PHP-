<?php include('includes/header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php

  
  if(isset($_REQUEST["submit"]))
  {
      $firstname = mysqli_real_escape_string($db,$_REQUEST["firstname"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);
      $price = mysqli_real_escape_string($db,$_REQUEST["price"]);
      $addr = mysqli_real_escape_string($db,$_REQUEST["addr"]);
      
      $date = date("Y-m-d h:i:sa");
      $emailid='users@rayheights.com';
      //$to="bibhuranjan.500@gmail.com";
      $to="office@rayheights.com";
      $subject="Finance :: Bisiness Loan on date : ".$date;
      $msg="<html><body>Sender : ".$email."<br> Name : ".$firstname."<br>Phone : $phone<br>Address : $addr<br><br>Price Range: ".$price."<br>Description : $desc<br></body></html>";
      //echo $emailid;
      //echo $msg;
       $headers  =  "From:".$emailid."\r\n".'MIME-Version: 1.0' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       
       $result= mail($to, $subject, $msg, $headers);
       if($result)
       {
        header('location:home.php?success=Message Sent');
       }
  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">

      <div class="row">
        <div class="col-xs-0 col-sm-1"></div>
        <div class="col-xs-12 col-sm-10">
          <br>
          <center><h3>We care for your Requirement</h3></center>
          <form method="post">
          <div class="form-group">
            <label>Name : </label>
            <input type="text" name="firstname" placeholder="Enter Full Name" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Phone : </label>
            <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Email : </label>
            <input type="email" name="email" placeholder="Enter email here" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Max Price : </label>
            <input type="text" name="price" placeholder="Enter a price range or maximum price" class="form-control contact" required="required">
          </div>
          <div class="form-group">
            <label>Address : </label>
            <textarea name="addr" placeholder="Enter Permanent Address" class="form-control contact" rows="6"></textarea>
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