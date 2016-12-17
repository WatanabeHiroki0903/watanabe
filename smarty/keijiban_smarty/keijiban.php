<?php
require_once('require.php');

//テキストがポストされている時データベースに書き込み
if(isset($_POST['text']) && !(trim($_POST['text'])==='')){
    $smartyObj->assign('kakikomi', 'yes');
    $contents=trim($_POST['text']);
    $contents=es($contents);
    $user_id=$_SESSION['customer']['id'];
    $date=date('Y/n/j G:i:s', time());
    $sql=$pdo->prepare('insert into post (contents, user_id, date) values (:contents, :user_id, :date)');
    $sql->bindValue(':contents', $contents, PDO::PARAM_STR);
    $sql->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $sql->bindValue(':date', $date, PDO::PARAM_STR);
    $sql->execute();
};

//ログインに関わらずデータベースを読み込んで表示
$sql=$pdo->prepare('select post.contents, post.date, member.name from post, member where post.user_id=member.id');
$sql->execute();
$postList=$sql->fetchAll(PDO::FETCH_ASSOC);
foreach($postList as &$row){
    $row['contents']=nl2br($row['contents']);
};
$smartyObj->assign('postList', $postList);

$smartyObj->display('keijiban.tpl');