<?php /* Smarty version 2.6.30, created on 2016-12-27 10:53:17
         compiled from header.tpl */ ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>keijiban</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        <?php echo '
        li{list-style-type: none;}
        '; ?>

    </style>
</head>
<body class="container" style="padding-top:50px;">
<nav class="navbar navbar-default navbar-fixed-top container">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="keijiban.php"><span class="glyphicon glyphicon-home"></span>TOP</a></li>
            <li><a href="touroku.php"><span class="glyphicon glyphicon-pencil"></span>会員登録</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-ok"></span>ログイン</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-remove"></span>ログアウト</a></li>
            <li><a href="mypage.php"><span class="glyphicon glyphicon-user"></span>マイページ</a></li>
        </ul>
                <?php if ($this->_tpl_vars['login'] == 'yes'): ?>
            <p class="navbar-text navbar-right">ログインしています。  ユーザー名:<?php echo $this->_tpl_vars['loginname']; ?>
</p>
        <?php endif; ?>
    </div>
</nav>
<div class="jumbotron" style="color:#FFF; background:url(../photo/header-back.jpg); background-size:cover; margin-top:10px;">
    <h1>簡易掲示板</h1>
</div>