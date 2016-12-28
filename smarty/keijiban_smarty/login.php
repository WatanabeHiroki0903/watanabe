<?php
require_once('require.php');


$errors=array();
//値がポストされている時の処理
if(isset($_POST['id']) && isset($_POST['password'])) {
    //値が空の時エラーを表示
    $smartyObj->assign('post', 'yes');
    if (trim($_POST['id']) === '') {
        $errors[] = 'ユーザーIDを入力してください。';
    };
    if (trim($_POST['password']) === '') {
        $errors[] = 'パスワードを入力してください。';
    };
    if(count($errors)>0){
        $smartyObj->assign('err', 'yes');
        $smartyObj->assign('errors', $errors);
    }else {

        $id = $_POST['id'];
        $password = $_POST['password'];

        //入力された値をデータベースの情報と照合
        try {
            $pdo->beginTransaction();
            $sql = $pdo->prepare('select * from member where id=:id and password=:password');
            $sql->bindValue(':id', $id, PDO::PARAM_STR);
            $sql->bindValue(':password', $password, PDO::PARAM_STR);
            $sql->execute();
            $memberList = $sql->fetchAll(PDO::FETCH_ASSOC);
            $pdo->commit();
        }catch(Exception $e){
            echo 'データベースの取得に失敗しました。';
            echo $e->getMessage();
            $pdo->rollBack();
        };

        //情報が間違っていればエラーを表示
        if (count($memberList) === 0) {
            $errors[] = 'ユーザーIDまたはパスワードが間違っています。';
        };
        if (count($memberList) > 1) {
            $errors[] = 'データベースにエラーが発生しました。';
        };
        if (count($errors) > 0) {
            $smartyObj->assign('err', 'yes');
            $smartyObj->assign('errors', $errors);
        }else {
            //情報があっていればセッションを定義してログイン
            if (count($memberList) === 1) {
                $name = $memberList[0]['name'];
                $smartyObj->assign('name', $name);
                $_SESSION['customer'] = array('name' => $name, 'id' => $id, 'password' => $password);
            };
        };
    };
};


$smartyObj->display('login.tpl');