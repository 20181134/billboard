<html>
<head>
    <meta charset="utf-8">
    <title>Billboard</title>
</head>
<body>
    <h1>掲示板</h1>
    <!-- 投稿すると同じページに戻る -->
    <form action="" method="post">
        <p>メッセージを入力</p>
        <input type="text" name="message">
        <input type="submit" value="投稿">
    </form>
    <?php
        // $fileにmessages.txtを定義
        $file='messages.txt' ;
        // ファイルが存在する時のみ$fileをデコードした文字列を$boardに保存
        if (file_exists($file)) {
            $board=json_decode(file_get_contents($file));
        }
        // $boardにmessageのデータを追加
        $board[]=$_REQUEST['message'];
        // $fileに$boardのデータをエンコードした文字列を追加
        file_put_contents($file, json_encode($board));
        // 表示の際に全てのメッセージを表示させる
        foreach ($board as $message) {
            echo '<p>', $message, '</p><hr>';
        }
    ?>
</body>
</html>
