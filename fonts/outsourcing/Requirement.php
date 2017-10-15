<?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container-fluid">

      <div class="row" >
        <div class="col-xs-0 col-sm-1"></div>
        <div class="col-xs-12 col-sm-10">
          <br>
          <center><h3>We care for your Requirement</h3></center>
          <form method="post">
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