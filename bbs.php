<?php
    $url = "localhost";
    $dbname = "bbs";
    $username = bbs;
    $passwd = netmarketing;

    //PDOでDBに接続
    try {
    	$pdo = new PDO($dsn, $username, $passwd);
    } catch (PDOException $e) {
    	exit("データベースに接続できませんでした" . $e->getMessage());
    }
    // 実行
    $stmt = $pdo->prepare('SELECT * FROM bbs');
    $stmt->execute();
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
    <title>PHP TEST</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
<body>
<?php
    if (isset($_COOKIE["visited"])){
        $count = $_COOKIE["visited"] + 1;
    }else{
        $count = 1;
    }
    echo "$stmt";
    $flag = setcookie("visited", $count);
?>

<p>PHPのテストです。</p>

<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
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
$postName = $_POST["name"];
$postTitle = $_POST["title"];
$postContent = nl2br($_POST["content"]);
$postDate = date('y/m/d') + time();

print('<p>投稿者:'.$postName.'</p>');
print('<p>タイトル:'.$postTitle.'</p>');
print('<p>投稿日時:'.$postDate.'</p>');
print('<p>内容:</p>');
print('<p>'.$postContent.'</p>');
?>
おわりんご。

</body>
</html>
