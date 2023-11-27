<?php
if (isset($_SESSION['customer'])) {
	echo '<table>';
	echo '<tr><th>番号</th><th>ファイル名</th><th></th></tr>';
	$pdo=new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'staff', 'password');
	$sql=$pdo->prepare(
		'select * '.
		'from img '.
		'where customer_id=?');
	$sql->execute([$_SESSION['customer']['id']]);
	$num=0;
	foreach ($sql as $row) {
		$num++;
		$id=$row['id'];
		echo '<tr>';
		echo '<td>', $num, '</td>';
		echo '<td><a href="detail.php?id='.$id.'">', $row['name'], '</a></td>';
		#echo '<td><a href="upload-delete.php?id='.$id.'">削除</a></td>';
		echo '</tr>';
	}
	echo '</table>';
} else {
	echo '画像を表示するには、ログインしてください。';
}
?>
