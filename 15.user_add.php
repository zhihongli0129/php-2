<?php
// 載入資料庫連線設定
include("db.php");

// 取得網址傳來的會員編號
$id = $_GET['id'];

// 刪除指定會員資料
$sql = "DELETE FROM user WHERE id='$id'";

// 執行 SQL 指令
mysqli_query($conn, $sql);

// 刪除完成後返回會員列表頁面
header("Location:user.php");
?>
