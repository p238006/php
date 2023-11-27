<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$login=$password='';
if (isset($_SESSION['customer'])) {
	$login=$_SESSION['customer']['login'];
	$password=$_SESSION['customer']['password'];
}
echo '<form action="customer-output.php" method="post">';
echo '<table>';
echo '<tr><td>ログイン名</td><td>';
echo '<input type="text" name="login" value="'.$login.'">';
echo '</td></tr>';
echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="password" value="'.$password.'">';
echo '</td></tr>';
echo '</table>';
echo '<input type="submit" value="確定">';
echo '</form>';
?>
<?php require '../footer.php'; ?>
