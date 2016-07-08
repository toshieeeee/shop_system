<?php

//おそらくリダイレクトの処理を走らせる

if(isset($_POST['disp']) == TRUE){

  if(isset($_POST['staffcode']) == FALSE){

    header('Location:staff_ng.php');

  }

  $staff_code = $_POST['staffcode']; //ちゃんと$_POSTのでーたを受け取る事を忘れないこと
  header('Location:staff_disp.php?staffcode='.$staff_code);

}


if(isset($_POST['add']) == TRUE){

  header('Location:staff_add.php');

  //スタッフコードを渡す必要がないので、書く必要がないのか

}

if(isset($_POST['edit']) == TRUE){

  if(isset($_POST['staffcode']) == FALSE){

    header('Location:staff_ng.php');

  }
  
  $staff_code = $_POST['staffcode'];
  header('Location:staff_edit.php?staffcode='.$staff_code);

}

if(isset($_POST['delete']) == TRUE){

  if(isset($_POST['staffcode']) == FALSE){

    header('Location:staff_ng.php');

  }
 
  $staff_code = $_POST['staffcode'];
  header('Location:staff_delete.php?staffcode='.$staff_code);
}


?>