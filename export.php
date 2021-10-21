<?php
session_start();
require('database.php');
$id = $_SESSION['id'];
$sql="select * from articles where user_id={$id}";

$res=mysqli_query($con,$sql);
$html='<table><tr><td>id</td><td>title</td><td>overview</td><td>content</td><td>created</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	$html.='<tr><td>'.$row['id'].'</td><td>'.$row['title'].'</td><td>'.$row['overview'].'</td><td>'.$row['content'].'</td><td>'.$row['created'].'</td></tr>';
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');
echo $html;
?>