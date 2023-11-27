<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$login=$_REQUEST['login'];
$password=$_REQUEST['password'];
$pdo=new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'staff', 'password');
if (isset($_SESSION['customer'])) {
	$id=$_SESSION['customer']['id'];
	$sql=$pdo->prepare(
		'select * '.
		'from customer '.
		'where id!=? and login=?');
	$sql->execute([$id, $login]);
} else {
	$sql=$pdo->prepare(
		'select * '.
		'from customer '.
		'where login=?');
	$sql->execute([$login]);
}
if (empty($sql->fetchAll())) {
	if (isset($_SESSION['customer'])) {
		$sql=$pdo->prepare('update customer set login=?, password=? where id=?');
		$sql->execute([$login, $password, $id]);
		$_SESSION['customer']=[
			'id'=>$id, 
			'login'=>$login, 
			'password'=>$password];
		echo 'お客様情報を更新しました。';
	} else {
		$sql=$pdo->prepare('insert into customer values(null,?,?)');
		$sql->execute([$login, $password]);
		echo 'お客様情報を登録しました。';
	}
} else {
	echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require '../footer.php'; ?>
