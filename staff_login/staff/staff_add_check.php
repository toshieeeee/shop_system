<?php

session_start(); 

if(isset($_SESSION['login']) == FALSE){

  echo "<p>ログインされていません</p>";
  echo '<p><a href="./../">ログイン画面へ</a></p>';
  exit();

}

require_once('../../common/common.php');

$post = sanitize($_POST); // POSTで受け取ったデータを一括でサニタイズ
$staff_name = $post['name']; //連想配列から、データを取り出して、変数にコピー
$staff_pass = $post['pass'];
$staff_pass2 = $post['pass2'];

//画像を受け取る

$pro_images=$_FILES['images']; 

//HTMLを代入する変数

$validate_staff_name ='';
$validate_staff_pass ='';
$validate_staff_pass2 ='';
$staff_add_check = '';


if($staff_name == ''){

  $validate_staff_name .= '<p>スタッフ名が入力されていません</p>';

}else{

  $validate_staff_name .= '<p>スタッフ名: ' .$staff_name. "</p>";

}

if($staff_pass == ''){

  $validate_staff_pass .= '<p>パスワードが入力されていません</p>';

}

if($staff_pass != $staff_pass2){

  $validate_staff_pass2 .= '<p>パスワードが一致しません</p>';

}

if($pro_images['size'] > 0){ //画像の有無の判定

  if($pro_images['size'] > 100000000){

    echo '画像サイズが大きすぎます';



  }else{

    //move_uploaded_file — アップロードされたファイルを新しい位置に移動する
    //引数 : 1.アップロードしたファイルのファイル名。 2. ファイルの移動先。
    //返り値 : 成功した場合に TRUE を返します。

    move_uploaded_file($pro_images['tmp_name'],'../../images/'.$pro_images['name']);
    echo '<img src="../../images/'.$pro_images['name'].'">'; //これでHTML側で、画像を参照できるようになる

  }

}

//同じ変数名に、エラー時/成功時に別々のHTMLを代入する。

if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2){

  $staff_add_check .= '<form>';
  $staff_add_check .= '<input type="button" onclick="history.back()" value="戻る">';
  $staff_add_check .= '</form>';

}else{

  $staff_pass = md5($staff_pass);

  $staff_add_check .= '<form method="post" action="staff_add_done.php">';
  $staff_add_check .= '<input type="hidden" name="name" value="'.$staff_name.'">';
  $staff_add_check .= '<input type="hidden" name="pass" value="'.$staff_pass.'">';
  $staff_add_check .= '<input type="hidden" name="images_name" value="'.$pro_images['name'].'">';
  $staff_add_check .= '<input type="button" onclick="history.back()" value="戻る">';
  $staff_add_check .= '<input type="submit" value="OK">';
  $staff_add_check .= '</form>';

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
  <div class="validate">

    <?php echo $validate_staff_name ?>
    <?php echo $validate_staff_pass ?>
    <?php echo $validate_staff_pass2 ?>
    
  </div>

  <div class="form">
    
    <?php echo $staff_add_check ?>

  <div>

</body>
</html>

