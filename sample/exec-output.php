<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php 
require 'execute.php';

$id=$_REQUEST['id'];
if (!isset($_SESSION['img'])) {
    $_SESSION['img']=[];
}
$_SESSION['img'][$id]=[
    'customer_id'=>$_REQUEST['customer_id'],
    'name'=>$_REQUEST['name']];

$pdo=new PDO('mysql:host=localhost;dbname=db;charset=utf8', 'staff', 'password');
$exe_id=1;
foreach ($pdo->query('select max(id) from exe') as $row) {
    $exe_id=$row['max(id)']+1;
}
$sql=$pdo->prepare('insert into exe values(?,?)');
if ($sql->execute([$exe_id, $_SESSION['customer']['id']])) {
    foreach ($_SESSION['img'] as $id=>$image) {
        $sql=$pdo->prepare('insert into exe_detail values(?,?,?)');
        $sql->execute([$exe_id, $id, rand()]);
    }
    echo '実行が完了しました。ありがとうございます。';
} else {
    echo '実行中にエラーが発生しました。申し訳ございません。';
}

unset($_SESSION['img'][$id]);
?>
<?php require '../footer.php'; ?>