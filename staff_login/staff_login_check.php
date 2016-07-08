<?php

try{

require_once('./../common/common.php');

$post = sanitize($_POST);
$staff_code = $post['code'];
$staff_pass = $post['pass'];
$staff_pass = md5($staff_pass);

$dsn = 'mysql:dbname=shop;host=localhost';
$user = 'root';
$password = 'root';

$dbh = new PDO($dsn,$user,$password);//DBの種類に依存せずにDB接続のできる関数　or （どのDBを使用しているかを隠蔽できる）
$dbh->query('SET NAMES utf-8'); // ステートメントを実行し、結果セットを PDOStatement オブジェクトとして返す

$sql = 'SELECT name FROM mst_staff WHERE code=? AND password=?';
$stmt = $dbh->prepare($sql);// PDOStatement->execute() メソッドによって実行される SQL ステートメントを準備します。

$data[] = $staff_code;
$data[] = $staff_pass;

$stmt->execute($data); //プリペアドステートメントを実行する。引数にはデータを代入する変数をいれる。

$dbh = null;

//追加

$rec = $stmt->fetch(PDO::FETCH_ASSOC); 

//PDOStatement::fetch — 結果セットから次の行を取得する
//引数 : PDO::FETCH_ASSOC: は、結果セットに 返された際のカラム名で添字を付けた配列を返します。


if($rec == FALSE){

  echo '<p>スタッフコードかパスワードが間違っています</p>';
  echo '<p><a href ="./">戻る<a></p>';

}else{

  session_start(); 

  //セッションがまだ開始されていない状態でこの関数が呼ばれた場合は、新しいセッションを開始しセッションIDを割り当てます。
  //セッションIDはクライアント側にクッキー名「PHPSESSID」で保存されます。

  session_regenerate_id (true);
  //現在のセッションIDを新しく生成したものと置き換える

  $_SESSION['login'] = 1;
  $_SESSION['staff_code'] = $staff_code;
  $_SESSION['staff_name'] = $rec['name'];

  header('Location:./staff/');

}

}catch(Exception $e){

  echo 'ただいま障害により大変ご迷惑をおかけしております';
  exit();

}

?>
