<?php include('includes/header.php'); ?>
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
        header('location:contactUs.php?success=Message Sent');
       }
  }

?>

    <!-- Page Content -->
    <div class="container">
        <center><h3>Let's Get Connected...</h3></center><br>
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
        <br><center><input type="submit" name="send" class="btn btn-primary contact" value="Send Message"></center>
        </form>
    </div><br>
    <!-- Header with Background Image -->
    <header class="map wow bounceInUp">
        <br>
        <center><h3>Where are we...</h3></center><br>
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
                <center><div id="map" style="width:1150px;height:400px;background:grey"></div></center>
          </div>
        </div>
      </div>
    </header>
    <br>
    <!-- /.container -->
<?php include('includes/footer.php'); ?>

    <!-- Map -->
    <script>
      function initMap() {
        var uluru = {lat: 20.310914, lng: 85.833743};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC34bUMfymJH-Xtp1Awj8YOeKMMI7nae1c&callback&callback=initMap">
    </script>




