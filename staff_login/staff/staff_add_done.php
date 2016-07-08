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
$staff_name = $post['name'];
$staff_pass = $post['pass'];
$pro_images_name = $post['images_name'];

$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password = 'root';

$dbh = new PDO($dsn,$user,$password);//DBの種類に依存せずにDB接続のできる関数　or （どのDBを使用しているかを隠蔽できる）
$dbh->query('SET NAMES utf-8'); // ステートメントを実行し、結果セットを PDOStatement オブジェクトとして返す

$sql = 'INSERT INTO mst_staff(name,password,images) VALUES (?,?,?)';
$stmt = $dbh->prepare($sql);// PDOStatement->execute() メソッドによって実行される SQL ステートメントを準備します。

$data[] = $staff_name;
$data[] = $staff_pass;
$data[] = $pro_images_name;
$stmt->execute($data); //プリペアドステートメントを実行する。引数にはデータを代入する変数をいれる。

$dbh = null;
  
  echo $staff_name. 'さんを追加しました<br>';

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
  <a href ="./">戻る</a>

</body>
</html>