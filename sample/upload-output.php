<?php
if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    if (!file_exists('upload')) {
        mkdir('upload');
    }
    $customer_id=$_SESSION['customer']['id'];
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
    $sql=$pdo->prepare('insert into img values(null, ?)');
    if($sql->execute([basename($_FILES['image']['name'])])) {
        echo '追加に成功しました。';
    } else {
        echo '追加に失敗しました。';
    }
    
} else {
    echo 'ファイルを選択してください。';
}
?>