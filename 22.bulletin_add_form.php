<?php
    // 關閉錯誤訊息顯示（避免使用者看到系統錯誤）
    error_reporting(0);

    // 啟動 Session，用來判斷使用者是否已登入
    session_start();

    // 檢查是否有登入（session id 是否存在）
    if (!$_SESSION["id"]) {

        // 尚未登入時顯示提示訊息
        echo "please login first";

        // 3 秒後自動跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{

        // 已登入，顯示新增佈告的 HTML 表單
        echo "
        <html>
            <head>
                <title>新增佈告</title>
            </head>

            <body>

                <!-- 表單送出方式：POST -->
                <!-- 將資料傳送到 23.bulletin_add.php 做新增處理 -->
                <form method=post action=23.bulletin_add.php>

                    <!-- 佈告標題輸入欄 -->
                    標    題：<input type=text name=title><br>

                    <!-- 佈告內容輸入區（可輸入多行文字） -->
                    內    容：<br>
                    <textarea name=content rows=20 cols=20></textarea><br>

                    <!-- 佈告類型選擇（單選按鈕） -->
                    佈告類型：
                    <input type=radio name=type value=1>系上公告 
                    <input type=radio name=type value=2>獲獎資訊
                    <input type=radio name=type value=3>徵才資訊<br>

                    <!-- 發布日期選擇 -->
                    發布時間：<input type=date name=time><p></p>

                    <!-- 送出與重設按鈕 -->
                    <input type=submit value=新增佈告>
                    <input type=reset value=清除>

                </form>

            </body>
        </html>
        ";
    }
?>
