<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (!isset($_SESSION['customer'])) {
	echo '画像を追加するには、ログインしてください。';
} else {
	$customer_id=$_SESSION['customer']['id'];
	if (!is_uploaded_file($_FILES['image']['tmp_name'])) {
		echo 'ファイルを選択してください。';
	} else {
		if (!file_exists('upload')) {
			mkdir('upload');
		}
		if (!file_exists('upload/'.$customer_id)) {
			mkdir('upload/'.$customer_id);
		}
		$file='upload/'.$customer_id.'/'.basename($_FILES['image']['name']);
		if (move_uploaded_file($_FILES['image']['tmp_name'], $file)) {
			echo 'アップロードに成功しました。';
		} else {
			echo 'アップロードに失敗しました。';
		}

		$pdo=new PDO('mysql:host=localhost; dbname=db; charset=utf8', 'staff', 'password');
		$sql=$pdo->prepare('insert into img values(null, ?, ?)');
		$sql->execute([$customer_id, basename($_FILES['image']['name'])]);
		echo '画像を追加しました。';
	}
	echo '<hr>';
	require 'upload.php';
}
?>
<?php require '../footer.php'; ?>
