<?php

session_start(); 

if(isset($_SESSION['login']) == FALSE){

  echo "<p>ログインされていません</p>";
  echo '<p><a href="./../">ログイン画面へ</a></p>';
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
  <p>スタッフが選択されていません</p>

  <a href ="./">戻る</a>

</body>
</html>