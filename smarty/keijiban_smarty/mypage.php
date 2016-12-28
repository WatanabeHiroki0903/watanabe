<?php
require_once('require.php');

//更新または削除がポストされた時の処理
if(isset($_POST['edit'])){
    switch($_POST['edit']){
        //更新の処理
        case 'update':
            if(trim($_POST['text'])!==''){
                $contents=es($_POST['text']);
                try {
                    $pdo->beginTransaction();
                    $updateSql = $pdo->prepare('update post set contents=:contents where id=:id');
                    $updateSql->bindValue(':contents', $contents, PDO::PARAM_STR);
                    $updateSql->bindValue(':id', $_POST['post_id'], PDO::PARAM_INT);
                    $updateSql->execute();
                    $smartyObj->assign('edit', 'update');
                    $pdo->commit();
                }catch(Exception $e){
                    echo '投稿の更新に失敗しました。';
                    echo $e->getMessage();
                    $pdo->rollBack();
                };
            };
        break;
        //削除の処理
        case 'delete':
            try {
                $pdo->beginTransaction();
                $deleteSql = $pdo->prepare('delete from post where id=:id');
                $deleteSql->bindValue(':id', $_POST['post_id'], PDO::PARAM_INT);
                $deleteSql->execute();
                $smartyObj->assign('edit', 'delete');
                $pdo->commit();
            }catch(Exception $e){
                echo '投稿の削除に失敗しました。';
                echo $e->getMessage();
                $pdo->rollBack();
            };
        break;
    };
};

//ログインユーザーのデータベースを読み込んで表示
if(isset($_SESSION['customer'])) {
    try {
        $pdo->beginTransaction();
        $sql = $pdo->prepare('select * from post where user_id=:id order by id desc');
        $sql->bindValue(':id', $_SESSION['customer']['id'], PDO::PARAM_STR);
        $sql->execute();
        $postList = $sql->fetchAll(PDO::FETCH_ASSOC);
        if (count($postList) > 0) {
            $smartyObj->assign('post', 'yes');
            $smartyObj->assign('postList', $postList);

        };
        $pdo->commit();
    }catch(Exception $e){
        echo 'データベースの取得に失敗しました。';
        echo $e->getMessage();
        $pdo->rollBack();
    };
};



$smartyObj->display('mypage.tpl');
