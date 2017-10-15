<?php include('includes/header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if(!isset($_SESSION["company"]))
    header("location:index.php?msg=You Have to Login First");
  else
  {
  	$id = $_SESSION["company"];
  	$status1 = "active";
  	$sql = "SELECT * FROM outsourcing WHERE companyid = '$id' AND status = '$status1' ORDER BY outsource_id DESC";
  	$row1 = mysqli_query($db,$sql);
  	$status2 = "done";
  	$sql = "SELECT * FROM outsourcing WHERE companyid = '$id' AND status = '$status2' ORDER BY outsource_id DESC";
  	$row2 = mysqli_query($db,$sql);

  }

?>

    <!-- Page Content -->
    <div class="container" style="font-size: 18px;">
      <div class="row" style="min-height: 300px">
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
        							<a href="view_post.php?id=<?php echo $result["outsource_id"]; ?>" class="btn btn-primary">View</a>
        							<a href="delete_post.php?id=<?php echo $result["outsource_id"]; ?>" class="btn btn-danger">Delete</a>
        						</td>
        					</tr>
        				<?php endif; ?>
        			<?php endwhile;?>
        		<?php else: ?>
        			<center><p>You Have No Pending Posts.</p></center>
        		<?php endif; ?>
        	</table><br>
        	<center><h3 style="color: blue">History</h3></center><br>
        	<table class="table table-striped">
        		
        		<?php if(mysqli_num_rows($row2) > 0): ?>
        			<tr><th>#Post Id</th><th>Post Title</th><th>Post Date</th><th>Status</th><th>Action</th></tr>
        			<?php while($success_result = $row2->fetch_assoc()): ?>
        				<?php if($success_result["status"] == "active"): ?>
        					<tr>
        						<td><?php echo $success_result["outsource_id"]; ?></td>
        						<td><?php echo $success_result["post_title"]; ?></td>
        						<td><?php echo $success_result["postdate"]; ?></td>
        						<td><?php echo $success_result["status"]; ?></td>
        						<td>
        							<a href="view_post.php?id=<?php echo $result["outsource_id"]; ?>" class="btn btn-primary">View</a>
        							<a href="delete_post.php?id=<?php echo $result["outsource_id"]; ?>" class="btn btn-danger">Delete</a>
        						</td>
        					</tr>
        				<?php endif; ?>
        			<?php endwhile;?>
        		<?php else: ?>
        			<center><p>You Have No Finished Posts.</p></center>
        		<?php endif; ?>
        	</table>
        </div>
        <div class="col-xs-0 col-sm-0 col-md-1"></div>
      </div>
    </div>
    <!-- /.container -->
    <?php include('includes/footer.php'); ?>