<?php include 'includes/header.php'; ?>
<?php 

  include '../includes/Database.php';
  session_start();
  if(!isset($_SESSION["admin"]))
  {
    header("location:index.php?err=You Have to Login First");
  }
  else
  {
    $sql1 = "SELECT * FROM outsourcing";
    $num = mysqli_query($db,$sql1);
    $row = mysqli_num_rows($num);
    $status1 = "active";
    
    $sql2 = "SELECT * FROM outsourcing WHERE status ='$status1' ORDER BY outsource_id DESC";
    $row1 = mysqli_query($db,$sql2);
    $sql3 = "SELECT * FROM outsourcing WHERE status !='$status1' ORDER BY outsource_id DESC";
    $row2 = mysqli_query($db,$sql3);
  }
?>


  
    <div class="container" style="min-height: 500px;height: 100%">
      <div class="row">
        <div class="col-xs-12">
          <h3>RayHeights - Admin Area</h3><br>
        </div>
      <div class="col-xs-0 col-sm-0 col-md-1"></div>
              <div class="col-xs-12 col-sm-12 col-md-10">
                <center>
                <?php if(isset($_REQUEST["msg"])): ?>
                  <div class="alert alert-success alert-dismissable" style="width: 50%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><?php echo htmlentities($_REQUEST["msg"]); ?></strong>
                  </div>
                <?php endif; ?>
                </center>
                <center><h3 style="color: blue">Pending Posts</h3></center><br>
                <table class="table table-striped">
                  
                  <?php if(mysqli_num_rows($row1) > 0): ?>
                    <tr><th>#Post Id</th><th>Post Title</th><th>Post Date</th><th>Status</th><th>Action</th></tr>
                    <?php while($result = $row1->fetch_assoc()): ?>
                      <?php if($result["status"] == "active"): ?>
                        <tr>
                          <td><?php echo $result["outsource_id"]; ?></td>
                          <td><?php echo $result["post_title"]; ?></td>
                          <td><?php echo $result["postdate"]; ?></td>
                          <td><?php echo $result["status"]; ?></td>
                          <td>
                            <a href="view_outsource.php?id=<?php echo $result["outsource_id"]; ?>" class="btn btn-primary">View</a>
                            <a href="delete/delete_ousource_post.php?id=<?php echo $result["outsource_id"]; ?>" class="btn btn-danger" onclick="return sure()">Delete Post</a>
                          </td>
                        </tr>
                      <?php endif; ?>
                    <?php endwhile;?>
                  <?php else: ?>
                    <center><p>You Have No Pending Posts.</p></center>
                  <?php endif; ?>
                </table><br>
                <center><h3 style="color: blue">Archives</h3></center><br>
                <table class="table table-striped">
                  
                  <?php if(mysqli_num_rows($row2) > 0): ?>
                    <tr><th>#Post Id</th><th>Post Title</th><th>Post Date</th><th>Status</th><th>Action</th></tr>
                    <?php while($success_result = $row2->fetch_assoc()): ?>
                      <?php if($success_result["status"] == "deleted" || $success_result["status"] == "done"): ?>
                        <tr>
                          <td><?php echo $success_result["outsource_id"]; ?></td>
                          <td><?php echo $success_result["post_title"]; ?></td>
                          <td><?php echo $success_result["postdate"]; ?></td>
                          <td><?php echo $success_result["status"]; ?></td>
                          <td>
                            <a href="view_outsource.php?id=<?php echo $success_result["outsource_id"]; ?>" class="btn btn-primary">View</a>
                          </td>
                        </tr>
                      <?php endif; ?>
                    <?php endwhile;?>
                  <?php else: ?>
                    <center><p>You Have No Archived Posts.</p></center>
                  <?php endif; ?>
                </table>
              </div>
          <div class="col-xs-0 col-sm-0 col-md-1"></div>
          <br>
          <br>

      </div>
    </div>
<?php include('includes/footer.php'); ?>
