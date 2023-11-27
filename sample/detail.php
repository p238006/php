<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=db;charset=utf8', 
	'staff', 'password');
$sql=$pdo->prepare(
	'select * '.
	'from img '.
	'where id=?');
$sql->execute([$_REQUEST['id']]);
foreach ($sql as $row) {
	$file='upload/'.$_SESSION['customer']['id'].'/'.$row['name'];
	echo '<p><img alt="upload" src="', $file, '"></p>';
	echo '<form action="exec-output.php" method="post">';
	echo '<p>ファイル名：', $row['name'], '</p>';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="hidden" name="customer_id" value="', $row['customer_id'], '">';
	echo '<input type="hidden" name="name" value="', $row['name'], '">';
	echo '<p><input type="submit" value="実行"></p>';
	echo '</form>';
}
?>
<?php require '../footer.php'; ?>
