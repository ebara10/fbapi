<?php
    $flag = setcookie("visited", 1);
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

    $flag = setcookie("visited", $count);
?>

<p>PHPのテストです。</p>

<form method="POST" action="<?php print($_SERVER['PHP_SELF']) ?>">
    名前:<input type="text" name="name" value="test"><br>
    タイトル:<input type="text" name="title" value="test"><br>
    <p>内容:</p>
        <p><textarea name="content" rows="4" cols="40" alt="test"></textarea></p>
    <input type="submit" name="btn1" value="送信">
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
