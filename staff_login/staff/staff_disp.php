<?php

session_start(); 

if(isset($_SESSION['login']) == FALSE){

  echo "<p>ログインされていません</p>";
  echo '<p><a href="./../">ログイン画面へ</a></p>';
  exit();

}

try{

require_once('../../common/common.php');

//サニタイズ

//$post = sanitize($_POST);
$staff_code = $_GET['staffcode'];

//DB接続

$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password = 'root';

$dbh = new PDO($dsn,$user,$password);//DBの種類に依存せずにDB接続のできる関数　or （どのDBを使用しているかを隠蔽できる）
$dbh->query('SET NAMES utf-8'); // ステートメントを実行し、結果セットを PDOStatement オブジェクトとして返す

$sql = 'SELECT name FROM mst_staff WHERE code=?';
$stmt = $dbh->prepare($sql);// PDOStatement->execute() メソッドによって実行される SQL ステートメントを準備します。

$data[] = $staff_code;
$stmt->execute($data); //プリペアドステートメントを実行する。引数にはデータを代入する変数をいれる。

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name = $rec['name'];
$dbh = null;
  
/*
▼実現したい処理 : ブラウザにスタッフコードを入力したら、スタッフの名前が帰ってくる

▼処理の流れ : 

1. ブラウザから、スタッフコードを受け取る
2. DBに接続して、受け取ったスタッフコードを手掛かりに、DBから、名前を見つける
3. DBから名前を持ってきて、変数にコピーする

*/


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
  <p>スタッフ参照</p>

  <p>スタッフコード : <?php echo $staff_code ?></p>
  <p>スタッフ名 :<?php echo $staff_name;?></p>
  <div><input type="button" onclick="history.back()" value="戻る"></div>


</body>
</html>
