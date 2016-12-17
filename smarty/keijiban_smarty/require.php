<?php
//セッションを開始
session_start();

// エスケープ(htmlspecialchars)の関数
function es($data, $charset="UTF-8"){
    if(is_array($data)){
        return array_map(__METHOD__, $data);
    }else{
        return htmlspecialchars($data, ENT_QUOTES, $charset);
    };
};

//エンコードチェックの関数
function cken(array $data){
    $result=true;
    foreach($data as $key => $value){
        if(is_array($value)){
            $value=implode("", $value);
        };
        if(!mb_check_encoding($value)){
            $result=false;
            break;
        };
    };
    return $result;
};


//Smartyのオブジェクトの作成
require_once('../libs/Smarty.class.php');
$smartyObj=new Smarty();
$smartyObj->template_dir='../templates/';
$smartyObj->compile_dir='../templates_c/';

//データベースに接続
try {
    $pdo = new PDO('mysql:host=localhost; dbname=keijiban; charset=utf8', 'keijibanuser', 'soccer0903');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'データベースの読み込みに失敗しました。';
    exit($e->getMessage());
};

//エンコードチェック
if(!cken($_POST)){
    $encoding=mb_internal_encoding();
    $errLog='Encoding err! The expected encoding is '. $encoding;
    exit($errLog);
};

//ログイン済かどうかで分岐するためにテンプレート変数を定義
if(isset($_SESSION['customer'])){
    $smartyObj->assign('loginname', $_SESSION['customer']['name']);
    $smartyObj->assign('login', 'yes');
};