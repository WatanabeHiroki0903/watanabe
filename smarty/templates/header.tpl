<html>
<head>
    <meta charset="UTF-8">
    <title>keijiban</title>
    <style>
        {literal}
        .menu{overflow: hidden;}
        #menu{float: left;
        margin: 0 15px;}
        li{list-style-type: none;}
        p{font-size: 12px;
        {/literal}
    </style>
</head>
<body>
<div class="menu">
    <a id="menu" href="keijiban.php">TOP</a>
    <a id="menu" href="touroku.php">会員登録</a>
    <a id="menu" href="login.php">ログイン</a>
    <a id="menu" href="logout.php">ログアウト</a>
    <a id="menu" href="mypage.php">マイページ</a>
    {*ログインしている時ユーザー名を表示*}
    {if $login=='yes'}
        <p id="menu">ログインしています。  ユーザー名:{$loginname}</p>
    {/if}
</div>
<hr>