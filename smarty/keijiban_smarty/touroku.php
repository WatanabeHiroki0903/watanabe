<?php
require_once('require.php');


$errors=array();
//値がポストされている時の処理
if(isset($_POST['name']) && isset($_POST['id']) && isset($_POST['password'])){
    $smartyObj->assign('post', 'yes');
    //値が空の時エラー表示
    if(trim($_POST['name'])===''){
        $errors[]='ユーザー名を入力してください。';
    };
    if(trim($_POST['id'])===''){
        $errors[]='ユーザーIDを入力してください。';
    }else if(!preg_match('/^[a-zA-Z0-9]+$/', trim($_POST['id']))){
        $errors[]='ユーザーIDは英数字のみで入力してください。';
    }
    if(trim($_POST['password'])===''){
        $errors[]='パスワードを入力してください。';
    };

    $name=$_POST['name'];
    $id=$_POST['id'];
    $password=$_POST['password'];

    //値が既に使われている時エラー表示
    try {
        $pdo->beginTransaction();
        $nameSql = $pdo->prepare('select * from member where name=:name');
        $nameSql->bindValue(':name', $name, PDO::PARAM_STR);
        $nameSql->execute();
        $nameList = $nameSql->fetchAll(PDO::FETCH_ASSOC);
        if (count($nameList) > 0) {
            $errors[] = 'ユーザー名が既に使われています。';
        };
        $idSql = $pdo->prepare('select * from member where id=:id');
        $idSql->bindValue(':id', $id, PDO::PARAM_STR);
        $idSql->execute();
        $idList = $idSql->fetchAll(PDO::FETCH_ASSOC);
        if (count($idList) > 0) {
            $errors[] = 'ユーザーIDが既に使われています。';
        };
        $passSql = $pdo->prepare('select * from member where password=:password');
        $passSql->bindValue(':password', $password, PDO::PARAM_STR);
        $passSql->execute();
        $passList = $passSql->fetchAll(PDO::FETCH_ASSOC);
        if (count($passList) > 0) {
            $errors[] = 'パスワードが既に使われています。';
        };

        if (count($errors) > 0) {
            $smartyObj->assign(array('err' => 'yes', 'errors' => $errors));
        } else {
            //エラーがないときデータベースに挿入
            $insertSql = $pdo->prepare('insert into member (name, id, password) values (:name, :id, :password)');
            $insertSql->bindValue(':name', $name, PDO::PARAM_STR);
            $insertSql->bindValue(':id', $id, PDO::PARAM_STR);
            $insertSql->bindValue(':password', $password, PDO::PARAM_STR);
            $insertSql->execute();
            //パスワードの表示を*で表示
            $secPass = '';
            for ($i = 0; $i < mb_strlen($password); $i++) {
                $secPass .= '*';
            };
            $smartyObj->assign(array('name' => $name, 'id' => $id, 'password' => $secPass));
        };
        $pdo->commit();
    }catch(Exception $e){
        echo 'データベースにエラーがありました。';
        echo $e->getMessage();
        $pdo->rollBack();
    };
};


$smartyObj->display('touroku.tpl');