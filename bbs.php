<?php
    $url = "mysql:host=localhost;";
    $dbname = "dbname=bbs";
    $username = "bbs";
    $passwd = "netmarketing";

    //PDOでDBに接続
    try {
    	$pdo = new PDO($url, $username, $passwd);
    	print("接続に成功しました");
    } catch (PDOException $e) {
    	exit("データベースに接続できませんでした" . $e->getMessage());
    	die();
    }

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
    <title>PHP TEST</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
<body>
<p>PHPのテストです。</p>
<form method="POST" action="insert.php">
<table>
    <tr>
        <td>名前:</td>
        <td><input type="text" name="name" value="test"></td>
    </tr>
    <tr>
        <td>タイトル:</td>
        <td><input type="text" name="title" value="test"></td>
    </tr>
    <tr>
        <td><p>内容:</p></td>>
    </tr>
</table>
        <p><textarea name="content" rows="4" cols="40" alt="test"></textarea></p>
    <input type="submit" name="btn1" value="投稿">
</form>

<?php


print('<p>投稿者:'.$postName.'</p>');
print('<p>タイトル:'.$postTitle.'</p>');
print('<p>投稿日時:'.$postDate.'</p>');
print('<p>内容:</p>');
print('<p>'.$postContent.'</p>');
?>
おわりんご。

</body>
</html>
