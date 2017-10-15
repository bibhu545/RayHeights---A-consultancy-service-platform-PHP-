<?php include('includes/header.php'); ?>
<?php include('../includes/Database.php'); ?>
<?php 

  session_start();
  if(!isset($_SESSION["company"]))
    header("location:index.php?msg=You Have to Login First");
  else
  {
    $id = $_REQUEST["id"];
    $sql = "UPDATE outsourcing SET status='deleted' WHERE outsource_id = '$id'";
      $row = mysqli_query($db,$sql);
      header("location:Home.php?msg=Post Deleted");
  }

?>