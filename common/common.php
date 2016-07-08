<?php

function sanitize($before){

  $after = array();

  foreach ($before as $key => $value) { // 引数のデータを全部取り出す
    
    $after[$key] = htmlspecialchars($value); //beforeの値をサニタイズして、$afterに代入する

  }
  return $after;
}


?>