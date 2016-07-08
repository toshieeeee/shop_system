<?php

try{

//DBに接続

$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password = 'root';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf-8'); 

$sql = 'SELECT code,name FROM mst_staff WHERE 1';
$stmt = $dbh->prepare($sql);
$stmt->execute(); 

//接続解除

$dbh = null;

}catch(Exception $e){

  echo 'ただいま障害により大変ご迷惑をおかけしております';
  exit();
}

$rec = '';
$list = '';

$list .= '<form method="post"  action = "staff_branch.php">'; // submitボタンを押した時の、分岐先を決めるPHP

while(true){

  $rec = $stmt->fetch(PDO::FETCH_ASSOC); // 結果セットから次の行を取得する

  //PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。

  if($rec==false){
    break;
  }

  $list .= '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
  $list .=  $rec['name'].'<br>';

}

$list .= '<input type="submit" name="disp" value="参照">';
$list .= '<input type="submit" name="add" value="追加">';
$list .= '<input type="submit" name="edit" value="修正">';
$list .= '<input type="submit" name="delete" value="削除">';
$list .= '</form>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
  <p>スタッフ一覧</p>

  <?php echo $list ?>

</body>
</html>
