<?php
session_start();
include 'functions.php';
require('database.php');
$id = $_SESSION['id'];
$sql="select * from articles where user_id={$id}";
$res=mysqli_query($con,$sql);
?>
<?=template_header('Read')?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Export data to excel in PHP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <a href="export.php"><button type="button" class="btn btn-primary" style="background-color: #32A367;">Export</button></a>
  <table class="table table-bordered  table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Overview</th>
        <th>Content</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
	 <?php while($row=mysqli_fetch_assoc($res)){?>	
	 <tr>
        <td><?php echo $row['id']?></td>
        <td><?php echo $row['title']?></td>
        <td><?php echo $row['overview']?></td>
        <td><?php echo $row['content']?></td>
        <td><?php echo $row['created']?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<style>
.btn{
	float: right;
    margin-bottom: 20px;
    margin-top: 20px;
}
</style>
</body>
</html>
<?=template_footer()?>