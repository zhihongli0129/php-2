<html>
    <head>
        <title>修改使用者</title>
    </head>

    <body>

    <?php
    // 關閉錯誤訊息顯示（避免畫面出現警告）
    error_reporting(0);

    // 啟動 Session
    session_start();

    // 檢查是否已登入
    if (!$_SESSION["id"]) {

        // 未登入提示訊息
        echo "請登入帳號";

        // 3秒後跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";

    } else {

        // 已登入 → 連接資料庫
        $conn = mysqli_connect(
            "120.105.96.90",
            "immust",
            "immustimmust",
            "immust"
        );

        // 依照 GET 傳入的 id 查詢該使用者資料
        $result = mysqli_query(
            $conn,
            "select * from user where id='{$_GET['id']}'"
        );

        // 取出查詢結果（轉成陣列）
        $row = mysqli_fetch_array($result);

        // 顯示修改表單
        echo "
        <form method=post action=20.user_edit.php>

            <!-- 隱藏欄位：傳送帳號（不可修改） -->
            <input type=hidden name=id value={$row['id']}>

            <!-- 顯示帳號（僅供查看） -->
            帳號：{$row['id']}<br>

            <!-- 可修改密碼欄位 -->
            密碼：<input type=text name=pwd value={$row['pwd']}><p></p>

            <!-- 提交按鈕 -->
            <input type=submit value=修改>

        </form>
        ";
    }
    ?>

    </body>
</html>
