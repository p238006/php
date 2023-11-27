<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if (!isset($_SESSION['customer'])) {
	echo '実行を行うにはログインしてください。';
} else 
if (empty($_SESSION['img'])) {
	echo '画像がありません。';
    require 'upload-input.php';
    echo '<hr>';
} else {
    echo '画像を選択してください。';
    require 'upload.php';
    echo '<hr>';
}
require 'upload.php';
?>
<?php require '../footer.php'; ?>