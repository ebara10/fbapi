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

<form method="GET" action="./cookie.php">
何回目？：<input type="text" name="times"><br>
<input type="submit" name="btn1" value="送信">
</form>

<p>
<?php
$times = $_GET['times'];
$cookie_del = $_GET["btn2"];


if ($times == $count){
 print "正解<br>";
}else{
print "ぶぶー<br>";
}

echo "正解は${count}回訪問。";
echo "${coocie_del}";


?>
</p>



</body>
</html>
