<?php
    // 關閉錯誤訊息顯示（避免畫面出現警告）
    error_reporting(0);

    // 啟動 Session，用來判斷使用者是否登入
    session_start();

    // 檢查是否已登入
    if (!$_SESSION["id"]) {

        // 未登入提示訊息
        echo "請登入帳號";

        // 3 秒後導向登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{

        // 連接資料庫
        $conn = mysqli_connect(
            "120.105.96.90",   // 主機位址
            "immust",          // 帳號
            "immustimmust",    // 密碼
            "immust"           // 資料庫名稱
        );

        // 建立刪除 SQL 指令
        // 根據網址傳入的 bid（公告編號）刪除對應資料
        $sql = "delete from bulletin where bid='{$_GET["bid"]}'";

        // 除錯用：顯示 SQL 指令（需要時可取消註解）
        // echo $sql;

        // 執行刪除指令
        if (!mysqli_query($conn, $sql)) {

            // 刪除失敗
            echo "佈告刪除錯誤";

        } else {

            // 刪除成功
            echo "佈告刪除成功";
        }

        // 3 秒後回到佈告欄列表頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
