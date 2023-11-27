<?php
$file= '././upload/'.$_SESSION['customer']['id'].'/'.$_REQUEST['name'];
#$cmd = '"C:\xampp\htdocs\php\sample\Project1\x64\Debug\Project1.exe" "././upload/1/1.jpg"';
$cmd = '"C:\xampp\htdocs\php\sample\Project1\x64\Debug\Project1.exe" "'.$file.'"';
#---
ob_start();
exec($cmd,$output,$result);
$var = ob_get_contents();
ob_end_clean();
#print_r($output);
/*
if ($result==0) {
    echo '<p>','プログラムは正常に動作を終了しました。','</p>';
}
else {
    echo '<p>','失敗しました。','</p>';
}
*/
echo $result;

echo '<hr>';
/*
ob_start();
passthru($cmd);
$var = ob_get_contents();
ob_end_clean();
*/
?>
