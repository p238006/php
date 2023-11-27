<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (!isset($_SESSION['customer'])) {
	echo '実行履歴を表示するにはログインしてください。';
}
else {
    require 'history.php'; 
}
?>
<?php require '../footer.php'; ?>