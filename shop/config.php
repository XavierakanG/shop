<?php
//建立資料連線
session_start();
$link = mysqli_connect("localhost","root","","#") or die('Unable to connect') ;
// 輸入中文編碼
mysqli_set_charset($link, "utf8");

// 檢查連線
if($link === false){
      die('ERROR: Could not connect. ' . mysqli_connect_error());
  }
  else{
      return $link;
  }
?>


