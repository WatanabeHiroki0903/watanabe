<?php
require_once('require.php');

//更新または削除がポストされた時の処理
if(isset($_POST['edit'])){
    switch($_POST['edit']){
        //更新の処理
        case 'update':
            if(trim($_POST['text'])!==''){
                $contents=es($_POST['text']);
                $updateSql=$pdo->prepare('update post set contents=:contents where id=:id');
                $updateSql->bindValue(':contents', $contents, PDO::PARAM_STR);
                $updateSql->bindValue(':id', $_POST['post_id'], PDO::PARAM_INT);
                $updateSql->execute();
                $smartyObj->assign('edit', 'update');
            };
        break;
        //削除の処理
        case 'delete':
            $deleteSql=$pdo->prepare('delete from post where id=:id');
            $deleteSql->bindValue(':id', $_POST['post_id'], PDO::PARAM_INT);
            $deleteSql->execute();
            $smartyObj->assign('edit', 'delete');
        break;
    };
};

//ログインユーザーのデータベースを読み込んで表示
$sql=$pdo->prepare('select * from post where user_id=:id');
$sql->bindValue(':id', $_SESSION['customer']['id'], PDO::PARAM_STR);
$sql->execute();
$postList=$sql->fetchAll(PDO::FETCH_ASSOC);
if(count($postList)>0){
    $smartyObj->assign('post', 'yes');
    $smartyObj->assign('postList', $postList);

};



$smartyObj->display('mypage.tpl');
