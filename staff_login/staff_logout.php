<?php

$_SESSION = array(); //セッションの中身を空にする

if(isset($_COOKIE[session_name()]) == TRUE){

  setcookie(session_name(),'',time()-42000,'/'); //クッキーを破棄

  //setcookie(name,value,expire,path) 
  //もしもこの関数をコールする前に何らかの出力がある場合には、 setcookie() は失敗し FALSE を返します。(HTTPの制約) 
  //setcookie() が正常に実行されると、TRUE を返します。 


  //session_name() - 現在のセッション名を取得または設定する
  //time() — 現在の Unix タイムスタンプを返す

}

@session_destroy(); //セッションに登録されたデータを全て破棄する。また、セッションクッキーは破棄しません。 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logout</title>
</head>
<body>
  
  <p>ログアウトしました</p>

  <p><a href="./">ログイン画面へ</a></p>

</body>
</html>