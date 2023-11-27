<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
unset($_SESSION['customer']);
$pdo=new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'staff', 'password');
$sql=$pdo->prepare(
	'select * '.
	'from customer '.
	'where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
foreach ($sql as $row) {
	$_SESSION['customer']=[
		'id'=>$row['id'], 
		'login'=>$row['login'], 
		'password'=>$row['password']];
}
if (isset($_SESSION['customer'])) {
	echo 'ようこそ';
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>
<?php require '../footer.php'; ?>
