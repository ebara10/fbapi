<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require 'src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '379322102207513',
  'secret' => 'ba34d10a0c8c403c4c4d649d90faab01',
));

// User IDを取得
$user = $facebook->getUser();

// User IDがあればFacebookにログインしているとみなす
if ($user) {
    try {
        // ログインしているユーザーのユーザー情報を取得
        $user_profile = $facebook->api('/me');
	$fb_user_friends = $facebook->api('/me/friends?fields=id,name,birthday&limit=10');
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}

// 現在のログイン状況にしたがい、ログインURLもしくはログアウトURLを取得
if ($user) {
    $logoutUrl = $facebook->getLogoutUrl();
} else {
    $loginUrl = $facebook->getLoginUrl();
}

// たとえばNaitik Shahさんの公開データはこうやって取得します
$naitik = $facebook->api('/chihiro.ebara');

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<title>facebook api test</title>
 <meta charset="UTF-8" />


<style>
body {
    font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
}

h1 a {
    text-decoration: none;
    color: #3b5998;
}

h1 a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
        <a href="<?php echo $logoutUrl; ?>">ログアウト</a>
    <?php else: ?>
    <div>
        <a href="<?php echo $loginUrl; ?>">Facebookにログイン</a>
    </div>
    <?php endif ?>

    <h3>PHP セッション</h3>
    <pre>
        <?php print_r($_SESSION); ?>
    </pre>

    <?php if ($user): ?>
    <h3>あなたの情報</h3>
    <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
    <pre>友達リスト<?php print_r($fb_user_friends); ?></pre>
    <h3>あなたのUser Object(/me)</h3>
    <pre>
        <?php print_r($user_profile); ?>
    </pre>
    <?php else: ?>
    <strong><em>ログインしていません</em> </strong>
    <?php endif ?>

</body>
</html>
