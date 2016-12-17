<?php
require_once('require.php');

//ログアウトボタンを押したときの処理。セッションを削除
if(isset($_POST['logout'])){
    $smartyObj->assign('logout', 'yes');
    $_SESSION['customer']='';
    session_destroy();
};



$smartyObj->display('logout.tpl');