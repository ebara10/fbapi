<?php
    $flag = setcookie("visited", 1);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

<head><title>PHP TEST</title></head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
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
内容:<textarea name="content" rows="4" cols="40" alt="test"></textarea><br>
<input type="submit" name="btn1" value="送信">
</form>

<?php

$name = $_POST["name"];
$content = $_POST["content"];

//改行を自動で挿入
$content = nl2br($content);

print('<p>投稿者:'.$name.'</p>');
print('<p>内容:</p>');
print('<p>'.$contents.'</p>');


?>
</p>

おわりんご。

</body>
</html>
