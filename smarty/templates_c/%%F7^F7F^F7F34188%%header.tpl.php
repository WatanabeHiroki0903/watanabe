<?php /* Smarty version 2.6.30, created on 2016-12-17 09:45:17
         compiled from header.tpl */ ?>
<html>
<head>
    <meta charset="UTF-8">
    <title>keijiban</title>
    <style>
        <?php echo '
        .menu{overflow: hidden;}
        #menu{float: left;
        margin: 0 15px;}
        li{list-style-type: none;}
        p{font-size: 12px;
        '; ?>

    </style>
</head>
<body>
<div class="menu">
    <a id="menu" href="keijiban.php">TOP</a>
    <a id="menu" href="touroku.php">会員登録</a>
    <a id="menu" href="login.php">ログイン</a>
    <a id="menu" href="logout.php">ログアウト</a>
    <a id="menu" href="mypage.php">マイページ</a>
        <?php if ($this->_tpl_vars['login'] == 'yes'): ?>
        <p id="menu">ログインしています。  ユーザー名:<?php echo $this->_tpl_vars['loginname']; ?>
</p>
    <?php endif; ?>
</div>
<hr>