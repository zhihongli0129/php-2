<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);

    // 啟動 Session，讀取登入資訊
    session_start();

    // 檢查使用者是否已登入
    if (!$_SESSION["id"]) {

        // 尚未登入時顯示訊息
        echo "請登入帳號";

        // 3秒後自動跳轉至登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{

        // 連線到 MySQL 資料庫
        $conn=mysqli_connect(
            "120.105.96.90",   // 主機位址
            "immust",          // 使用者帳號
            "immustimmust",    // 使用者密碼
            "immust"           // 資料庫名稱
        );

        // 建立刪除使用者的 SQL 指令
        // 從網址取得 id 參數，刪除對應的會員資料
        $sql="delete from user where id='{$_GET["id"]}'";

        // 顯示 SQL 指令（除錯時可取消註解）
        // echo $sql;

        // 執行刪除指令
        if (!mysqli_query($conn,$sql)) {

            // 刪除失敗
            echo "使用者刪除錯誤";

        } else {

            // 刪除成功
            echo "使用者刪除成功";
        }

        // 3秒後自動跳轉回會員管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
