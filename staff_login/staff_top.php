<?php

session_start(); 

//すでにセッションが開始されているので、
//この場合、サーバ側で保存されている、セッション変数を利用できるように準備する

if(isset($_SESSION['login']) == FALSE){

  echo "<p>ログインされていません</p>";
  echo '<p><a href="./">ログイン画面へ</a></p>';
  exit();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>staff-top</title>
</head>
<body>

    <p><?php echo $_SESSION['staff_name']; ?>さんログイン中</p>
    
    <h1>ショップ管理トップメニュー</h1>


    <p><a href="./staff/">スタッフ管理</a></p>
    <p><a href="./product/">商品管理</a></p>

</body>
</html>