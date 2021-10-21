<?php
session_start();
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $overview = isset($_POST['overview']) ? $_POST['overview'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    
    $user_id = $_SESSION['id'];
    // Insert new record into the users table
    $stmt = $pdo->prepare('INSERT INTO articles VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$id, $title, $overview, $content, $created ,$user_id]);
    // Output message
    $msg = 'Created Successfully!';
}
?>



<?=template_header('Create')?>
<html>
    <head>
    <script src="ckeditor/ckeditor.js" ></script>
    </head>
    <body>
<div class="content update">
	<h2>Create Article</h2>
    <form action="create.php" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="26" value="auto" id="id">
        <label for="title">Ttle</label>
        <input type="text" name="title" placeholder="Title" id="title">
        <label for="overview">Overview</label>
        <input type="text" name="overview" placeholder="Overview" id="overview">
        <label for="content">Content</label>
        <textarea name="content" id="content" rows="10" cols="80">
   
    </textarea>
    <script type="text/javascript">

// Initialize CKEditor
CKEDITOR.replace('content',{

  width: "500px",
  height: "300px"

}); 

</script>
            <br><br>
        <label for="created">Date Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i')?>" id="created">
        <!-- <label for="user_id">User_id</label>
        <input type="text" name="user_id" placeholder="26" value="auto" id="user_id"> -->
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</body>
</html>

<?=template_footer()?>