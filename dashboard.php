<?php 
    session_start();
  
    if(!$_SESSION['id_member']){
        header('location:login.php');
    }

  
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="dashboard.css"/>
    <script src="ckeditor/ckeditor.js"></script>


<script src="tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#editor'
});
</script>


    </head>

<body>
<h2 style="font-size: 1.55em;color:red; font-family:'Times New Roman', Times, serif">Welcome <?php echo ucfirst($_SESSION['first_name']); ?></h2>


<nav class="navbar-primary">
  <a href="#" class="btn-expand-collapse"><span class="glyphicon glyphicon-menu-left"></span></a>
  <ul class="navbar-primary-menu">
    <li>
      <a href="/add_blog.php"><span class="glyphicon glyphicon-list-alt"></span><span class="nav-label">ADD Article</span></a>
      <a href="#"><span class="glyphicon glyphicon-envelope"></span><span class="nav-label">Profile</span></a>
      <a href="#"><span class="glyphicon glyphicon-cog"></span><span class="nav-label">Settings</span></a>
      <a href="#"><span class="glyphicon glyphicon-film"></span><span class="nav-label">Notification</span></a>
      <a href="#"><span class="glyphicon glyphicon-calendar"></span><span class="nav-label">Monitor</span></a>
      <a href="logout.php?logout=true" style="margin-top: 130%;">LOGOUT</a>
     
    </li>
  </ul>
</nav>
<div class="main-content">
<form method="post" action="submit.php">
    <textarea name="editor" id="editor" rows="10" cols="80">
    This is my textarea to be replaced with HTML editor.
    </textarea>
    <input type="submit" name="submit" value="SUBMIT">
</form>
</div>
<script>
CKEDITOR.replace('editor');
</script>
</body>
</html>