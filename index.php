<?php include('includes/header.php'); ?>
<?php include('includes/Database.php'); ?>
<?php

  
  if(isset($_REQUEST["send"]))
  {
      $firstname = mysqli_real_escape_string($db,$_REQUEST["firstname"]);
      $phone = mysqli_real_escape_string($db,$_REQUEST["phone"]);
      $email = mysqli_real_escape_string($db,$_REQUEST["email"]);
      $message = mysqli_real_escape_string($db,$_REQUEST["feedback"]);
      
      $date = date("Y-m-d h:i:sa");
      $emailid='users@rayheights.com';
      //$to="bibhuranjan.500@gmail.com";
      $to="feedback@rayheights.com";
      $subject="Feedback About Company";
      $msg="<html><body>Sender : ".$email."<br> Name : ".$firstname.$lastname."<br>Phone : $phone<br> ".$message."</body></html>";
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

    <!-- Header with Background Image -->
    <header class="business-header wow bounceInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <img src="images/brand.jpg" height="100%" width="100%" style="border: 1px solid red;border-radius: 0 40px 0 40px">
          </div>
        </div>
      </div>
    </header>
    <br>
    <!-- Page Content -->
    <div class="container-fluid">

      <div class="row" style="padding-left: 5%;padding-right: 5%;font-size: 18px">
        <div class="col-sm-12">
          <center><h3 class="mt-4">We help, You grow </h3><br>
          <p>RayHeights Consultancy&trade; is a business out-sourcing and finance consultant firm with a focus on the demands of future. It is a Bhubaneswar based organization having wide network and alliances and still growing. We have a team of skilful innovative members, having expertise in their related fields.
         
          In a demanding business with high expectations and standards, we honestly represent our clients to candidates and our candidates to clients.</center>
            <center><a class="btn btn-primary btn-lg contact buttonAnm" href="aboutUs.php">Find Out More &raquo;</a></center>
          </p>
        </div>
      </div>
      <!-- /.row -->

      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4" >
          <div class="card wow slideInLeft">
            <img class="card-img-top" src="images/finance.jpg" height="170" alt="car loan" style="border-radius: 20px 0 0 0">
            <div class="card-body">
              <h4 class="card-title">Loan &amp; Financing</h4>
              <p class="card-text">We provide with a range of finance consulting services that help you drive greater efficiency and effectiveness throughout your financial decisions.</p>
            </div>
            <div class="card-footer">
              <a href="finance/home.php" class="btn btn-primary">Explore Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="images/place.jpg" alt=""  style="border-radius: 20px 0 0 0">
            <div class="card-body">
              <h4 class="card-title">Placement &amp; Training</h4>
              <p class="card-text">Where on one hand there is a large state of unemployment,on the other hand,there exists huge shortage of skilled and experienced manpower for the industry</p>
            </div>
            <div class="card-footer">
              <a href="placement/index.php" class="btn btn-primary">Explore Now</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4" >
          <div class="card">
            <img class="card-img-top" src="images/out.jpg" alt="" height="170" style="border-radius: 20px 0 0 0">
            <div class="card-body">
              <h4 class="card-title">Outsourcing</h4>
              <p class="card-text">Placing great people in the right positions is the key to achieving outstanding business and career development results</p>
            </div>
            <div class="card-footer">
              <a href="outsourcing/index.php" class="btn btn-primary">Apply Now!</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card wow slideInRight">
            <img class="card-img-top" src="images/business_loan.jpg" alt=""  style="border-radius: 20px 0 0 0">
            <div class="card-body">
              <h4 class="card-title">Event Management</h4>
              <p class="card-text">Event planning requires foresight, follow through and attention to detail. One needs to see the big picture as well as the tiniest of details. This is why we started RayHeights Event Management.</p>
            </div>
            <div class="card-footer">
              <a href="outsourcing/event_management.php" class="btn btn-primary">Apply Now!</a>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->
      <br>
    
      <div class="row stats" style="background:#414749">
        
          
          <div class="col-sm-12 col-md-3">
            <center><h4>14+</h4>
            <p>Partners</p></center>
          </div>
          <div class="col-sm-12 col-md-3">
            <center><h4>55+</h4>
            <p>Projects Done</p></center>
          </div>
          <div class="col-sm-12 col-md-3">
            <center><h4>89+</h4>
            <p>Happy Clients</p></center>
          </div>
          <div class="col-sm-12 col-md-3">
            <center><h4>140</h4>
            <p>Meetings</p></center>
          </div>
          
        
      </div>
      
      <div class="row contact_front">
        <div class="col-sm-4 address_front wow slideInLeft">
          <h2 class="mt-4">Contact Us</h2>
          <address>
            <strong>RayHeights Pvt. Ltd.</strong>
            <br>Flat no : 302 3rd Floor
            <br>Sainik School Square, GajpatiNagar
            <br>Bhubaneswar, Odisha
            <br>
          </address>
          <address>
            <abbr title="Phone">Phone</abbr>
            076068 46868
            <br>
            <abbr title="Email">Email</abbr>
            <a href="mailto:#">support@rayheights.com</a>
          </address>
        </div>
        <div class="col-sm-8 col-xs-12 wow slideInRight" style="padding-left: 5%;padding-right: 0px;color: black">
        <center><h3>Leave A Message <br>and <br>we will get back to you</h3></center><br>
      <center>
      <?php if(isset($_REQUEST["success"])): ?>
        <div class="alert alert-primary alert-dismissable" style="width: 50%">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong><?php echo htmlentities($_REQUEST["success"]); ?></strong>
        </div>
      <?php endif; ?>
      </center>
        <form>
        <div class="row">
            
            <div class="col-sm-4">
                <input type="text" class="form-control contact" name="firstname" placeholder="Your name here" required="required">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control contact" name="phone" placeholder="Your Phone no. here" required="required">
            </div>
            <div class="col-sm-4">
                <input type="email" class="form-control contact" name="email" placeholder="Your mail here" required="required">
            </div>
            <br>
        </div>
        <br>
        <div class="row">
            
            <div class="col-sm-12">
                <textarea rows="6" style="width: 100%" class="contact" placeholder="Your Message Here..." required="required" name="feedback"></textarea>
            </div>

        </div>
        <br><center><input type="submit" name="send" class="btn btn-primary contact buttonAnm" value="Send Message"></center>
        </form>
        </div>
      </div>

    </div>


    <!-- /.container -->
<?php include('includes/footer.php'); ?>