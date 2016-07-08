<?php

session_start(); 

if(isset($_SESSION['login']) == FALSE){

  echo "<p>ログインされていません</p>";
  echo '<p><a href="./../">ログイン画面へ</a></p>';
  exit();

}

try{

require_once('../../common/common.php');

$post = sanitize($_POST);
$staff_code = $post['code'];

$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password = 'root';

$dbh = new PDO($dsn,$user,$password);//DBの種類に依存せずにDB接続のできる関数　or （どのDBを使用しているかを隠蔽できる）
$dbh->query('SET NAMES utf-8'); // ステートメントを実行し、結果セットを PDOStatement オブジェクトとして返す

$sql = 'DELETE FROM mst_staff WHERE code=?';
$stmt = $dbh->prepare($sql);// PDOStatement->execute() メソッドによって実行される SQL ステートメントを準備します。

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

  <p><?php echo $_SESSION['staff_name']; ?>さんログイン中</p>
  <p>削除しました</p>
  <a href ="./">戻る</a>

</body>
</html>