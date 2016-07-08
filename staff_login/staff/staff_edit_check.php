<?php

require_once('../../common/common.php');

$post = sanitize($_POST);

$staff_code = $post['code'];  
$staff_name = $post['name']; 
$staff_pass = $post['pass'];
$staff_pass2 = $post['pass2'];

//エラーを代入する配列

$error = array();

//HTMLを代入する配列

$validate_staff_name ='';
$staff_edit_check = '';


$validate_staff_name ='';
$validate_staff_pass ='';
$validate_staff_pass2 ='';


if($staff_name == ''){

  $error['staff_name'] = '<p>スタッフ名が入力されていません</p>';

}else{

  $validate_staff_name = '<p>スタッフ名: ' .$staff_name. "</p>";

}

if($staff_pass == ''){

   $error['staff_pass'] = '<p>パスワードが入力されていません</p>';

}

if($staff_pass != $staff_pass2){

   $error['staff_pass2'] = '<p>パスワードが一致しません</p>';

}

//同じ変数名に、エラー時/成功時に別々のHTMLを代入する。

if(count($error) === 0){ 
  
  $staff_pass = md5($staff_pass);
  $staff_edit_check .= '<form method="post" action="staff_edit_done.php">';
  $staff_edit_check .= '<input type="hidden" name="code" value="'.$staff_code.'">';
  $staff_edit_check .= '<input type="hidden" name="name" value="'.$staff_name.'">';
  $staff_edit_check .= '<input type="hidden" name="pass" value="'.$staff_pass.'">';
  $staff_edit_check .= '<input type="button" onclick="history.back()" value="戻る">';
  $staff_edit_check .= '<input type="submit" value="OK">';
  $staff_edit_check .= '</form>';

}else{

  $staff_edit_check .= '<form>';
  $staff_edit_check .= '<input type="button" onclick="history.back()" value="戻る">';
  $staff_edit_check .= '</form>';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <!--エラー文章-->

  <ul>

     <?php foreach ($error as $error_text) { ?>

      <li><?php echo $error_text ?></li>

     <?php } ?>

  </ul>

  <p>修正します</p>

  <p><?php echo $validate_staff_name ?></p>

  <div class="form">
    
    <?php echo $staff_edit_check ?>

  <div>

</body>
</html>

