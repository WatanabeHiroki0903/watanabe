<?php
session_start();
require_once('header.php');
require_once('util.php');
?>
<h1>ログイン</h1>

<?php
//エンコードチェック
if(!cken($_POST)){
    $encoding=mb_internal_encoding();
    $err='Encoding err! The expected encoding is '. $encoding;
    exit($err);
};

//データベースに接続
try{
    $pdo=new PDO('mysql:host=localhost; dbname=keijiban; charset=utf8', 'keijibanuser', 'soccer0903');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo '<hr>';
    echo 'データベースに接続できませんでした。';
    exit();
};

$errors=array();

if(isset($_SESSION['customer'])){
    echo '既にログインしています。<br>';
    echo 'ユーザー名：'. $_SESSION['customer']['name'];
}else {
    ?>
    <form action="<?php echo es($_SERVER['PHP_SELF']); ?>" method="post">
        <ul>
            <li><label>ユーザーID：<input type="text" name="id"></label></li>
            <li><label>パスワード：<input type="password" name="password"></label></li>
            <li><input type="submit" value="ログイン"></li>
        </ul>
    </form>
    <?php
//値が適切かチェック
    if (isset($_POST['id']) && isset($_POST['password'])) {

        if ($_POST['id'] === '') {
            $errors[] = 'ユーザーIDを入力してください。';
        };
        if ($_POST['password'] === '') {
            $errors[] = 'パスワードを入力してください。';
        };
        if(count($errors)>0){
            echo '<hr>';
            echo implode('<br>', $errors);
            exit();
        };

        $id = es($_POST['id']);
        $password = es($_POST['password']);
//ユーザーID、パスワードが正しいかチェック。正しければ$_SESSION['customer']を定義
        $sql = $pdo->prepare('select * from member where id=:id and password=:password');
        $sql->bindValue(':id', $id, PDO::PARAM_STR);
        $sql->bindValue(':password', $password, PDO::PARAM_STR);
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_ASSOC);

        if(count($result)===1) {
                $name = $result[0]['name'];
                $_SESSION['customer'] = array('id' => $id, 'name' => $name, 'password' => $password);
                echo '<hr>ログインしました。ようこそ' . $name . 'さん';
        }else if(count($result)===0){
            echo '<hr>ユーザー名またはパスワードが間違っています。';
        }else{
            echo '<hr>データベースでエラーが発生しました。';
        };
    };
};



require_once('footer.php');
?>
