<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $overview = isset($_POST['overview']) ? $_POST['overview'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt = $pdo->prepare('UPDATE articles SET id = ?, title = ?, overview = ?, content = ?, created = ? WHERE id = ?');
        $stmt->execute([$id, $title, $overview, $content, $created, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<?=template_header('Read')?>
<html>
    <head>
    <script src="ckeditor/ckeditor.js" ></script>
    </head>
    <body>
<div class="content update">
	<h2>Update Article #<?=$contact['id']?></h2>
    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" value="<?=$contact['title']?>" id="title">
        <label for="overview">Overview</label>
        <input type="text" name="overview" placeholder="Overview" value="<?=$contact['overview']?>" id="overview">
        <label for="content">Content</label>

        <textarea name="content" id="content" rows="10" cols="80" ><?php echo $contact['content'] ?></textarea>
    <script type="text/javascript">

// Initialize CKEditor
CKEDITOR.replace('content',{

  width: "500px",
  height: "300px"

}); 

</script>
        <!-- <input type="text" name="content" placeholder="Content" value="<?=$contact['content']?>" id="content"> -->
        <label for="created">Created</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($contact['created']))?>" id="created">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>