<?php

session_start(); 

if(isset($_SESSION['login']) == FALSE){

  echo "<p>ログインされていません</p>";
  echo '<p><a href="./../">ログイン画面へ</a></p>';
  exit();

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
  <p><?php echo $_SESSION['staff_name']; ?>さんログイン中</p>
  <p>スタッフ追加</p>

  <form method="post" action="staff_add_check.php" enctype="multipart/form-data">

  <p>スタッフ名を入力してください</p>

  <input type="text" name="name">

  <p>パスワードを入力してください</p>
  <input type="password" name="pass">

  <p>パスワードをもう一度入力してください</p>
  <input type="password" name="pass2">

  <p>画像を選択してください</p>
  <input type="file" name="images">

  <div>

    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">

  </div>

  </form>

</body>
</html>