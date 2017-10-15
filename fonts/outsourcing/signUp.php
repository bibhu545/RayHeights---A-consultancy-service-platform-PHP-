<?php include('includes/login-header.php'); ?>

    <!-- Page Content -->
    <div class="container-fluid" >

      <div class="row" style="">
        <div class="col-xs-0 col-sm-3"></div>
        <div class="col-xs-12 col-sm-6" style="margin: 15px;">
          <div class="login" style="padding: 0px">
            <br>
          <center><h3>Join and hire from 3000 aspirants</h3><br></center>
          <div style="padding-left: 20%">
            <form class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" placeholder="Enter email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10"> 
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="pwd">ReType Password:</label>
                <div class="col-sm-10"> 
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
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
                    <button type="submit" class="btn btn-success">Sign Up</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Have an Account?</button>
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