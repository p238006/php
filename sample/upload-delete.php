<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (isset($_SESSION['customer'])) {
	$pdo=new PDO('mysql:host=localhost;dbname=db;charset=utf8', 
		'staff', 'password');
	$sql=$pdo->prepare('delete from img where id=?');
	$sql->execute([$_REQUEST['id']]);
	echo '画像を削除しました。';
	echo '<hr>';
} else {
	echo '画像を削除するには、ログインしてください。';
}
require 'upload.php';
?>
<?php require '../footer.php'; ?>
