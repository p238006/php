<?php
$pdo=new PDO('mysql:host=localhost;dbname=db;charset=utf8', 
	'staff', 'password');
$sql_exe=$pdo->prepare(
	'select * '.
	'from exe '.
	'where customer_id=? '.
	'order by id desc');
$sql_exe->execute([$_SESSION['customer']['id']]);
echo '<table>';
echo '<tr><th>番号</th><th>ファイル</th><th>テキスト</th></tr>';
$num=0;
foreach ($sql_exe as $row_exe) {
	$sql_detail=$pdo->prepare(
		'select * '.
		'from exe_detail, img '.
		'where exe_id=? and img_id=id');
	$sql_detail->execute([$row_exe['id']]);
	foreach ($sql_detail as $row_detail) {
		$num++;
		echo '<tr>';
		echo '<td>', $num, '</td>';
		echo '<td><a href="detail.php?id='.$row_detail['id'].'">', 
			$row_detail['name'], '</a></td>';
		echo '<td>', $row_detail['num'], '</td>';
		echo '</tr>';
	}
}
echo '</table>';
echo '<hr>';
?>
