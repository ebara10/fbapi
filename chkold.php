<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>PHPテスト</title>
</head>
<body>

<p>PHPのテストです。</p>

<form method="GET" action="./chkold.php">
年齢：<input type="text" name="old"><br>
出身：<input type="text" name="pref">
<input type="submit" name="btn1" value="送信">
</form>

<p>
<?php
$old = $_GET['old'];
$pref = $_GET['pref'];

if ($old > 20 and $old <40 and $pref == 東京){
 print "いいかんじ<br>";
}else{
print "えー<br>";
}
echo "${pref}出身の${old}さい"
?>
</p>

</body>
</html>
