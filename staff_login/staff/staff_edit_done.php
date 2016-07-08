<?php

try{

require_once('../../common/common.php');

$post = sanitize($_POST);

$staff_name = $post['name'];
$staff_pass = $post['pass'];
$staff_code = $post['code'];

$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password = 'root';

$dbh = new PDO($dsn,$user,$password);//DBの種類に依存せずにDB接続のできる関数　or （どのDBを使用しているかを隠蔽できる）
$dbh->query('SET NAMES utf-8'); // ステートメントを実行し、結果セットを PDOStatement オブジェクトとして返す

$sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
$stmt = $dbh->prepare($sql);// PDOStatement->execute() メソッドによって実行される SQL ステートメントを準備します。

$data[] = $staff_name;
$data[] = $staff_pass;
$data[] = $staff_code;
$stmt->execute($data); //プリペアドステートメントを実行する。引数にはデータを代入する変数をいれる。

$dbh = null;

  

}catch(Exception $e){

  echo 'ただいま障害により大変ご迷惑をおかけしております';
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <p>修正しました</p>
  <a href ="./">戻る</a>

</body>
</html>