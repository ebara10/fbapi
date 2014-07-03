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

//bbs.phpで入力したデータを引き継ぐ
$name = $_REQUEST["name"];
$title = $_REQUEST["title"];
$body = nl2br($_REQUEST["content"]);
$post_date = date('y/m/d') + time();

//上の変数にはいっているデータをinsert文に入れる
$stmt = $pdo->prepare('INSERT INTO topics (title, body, name, post_date) VALUES (:title, :body, :name, :post_date)');
$stmt -> bindValue(':title', $title,　PDO::PARAM_STR);
$stmt -> bindValue(':body', $body,　PDO::PARAM_STR);
$stmt -> bindValue(':name', $name,　PDO::PARAM_STR);
$stmt -> bindValue(':post_date', $post_date,　PDO::PARAM_STR);

//ここで送る
$stmt->execute();

?>
