<?php
session_start();
require_once('header.php');
require_once('util.php');
?>

<h1>会員登録</h1>

<?php
//エンコードチェック
if(!cken($_POST)){
    $encoding=$mb_internal_encoding();
    $err='Encoding err! The expected encoding is '. $encoding;
    exit($err);
};
//データベースに接続
try{
    $pdo = new PDO('mysql:host=localhost; dbname=keijiban; charset=utf8', 'keijibanuser', 'soccer0903');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'データベースの接続に失敗しました。';
    exit();
};

$errors=array();

if(isset($_SESSION['customer'])) {
    echo 'ログインしています。<br>新しく会員登録するにはログアウトしてください。';
}else{
    ?>
    <form action="<?php echo es($_SERVER['PHP_SELF']); ?>" method="post">
        <ul>
            <li><label>ユーザー名：<input type="text" name="name"></label></li>
            <li><label>ユーザーID：<input type="text" name="id"></label></li>
            <li><label>パスワード：<input type="password" name="password"></label></li>
            <li><input type="submit" value="登録する"></li>
        </ul>
    </form>
<?php
    if (isset($_POST['name']) && isset($_POST['id']) && isset($_POST['password'])) {
//値が空ではないかチェック
        if ($_POST['name'] === '') {
            $errors[] = 'ユーザー名を入力してください。';
        };
        if ($_POST['id'] === '') {
            $errors[] = 'ユーザーIDを入力してください。';
        };
        if ($_POST['password'] === '') {
            $errors[] = 'パスワードを入力してください。';
        };
        $name = es($_POST['name']);
        $id = es($_POST['id']);
        $password = es($_POST['password']);
//ユーザー名、ユーザーID、パスワードがそれぞれ未使用なものかそれぞれチェック
        $nameSql = $pdo->prepare('select * from member where name = :name');
        $nameSql->bindValue(':name', $name, PDO::PARAM_STR);
        $nameSql->execute();
        $nameList = $nameSql->fetchAll(PDO::FETCH_ASSOC);
        if (count($nameList) > 0) {
            $errors[] = 'ユーザー名が既に使われています。';
        };

        $idSql = $pdo->prepare('select * from member where id = :id');
        $idSql->bindValue(':id', $id, PDO::PARAM_STR);
        $idSql->execute();
        $idList = $idSql->fetchAll(PDO::FETCH_ASSOC);
        if (count($idList) > 0) {
            $errors[] = 'ユーザーIDが既に使われています。';
            print_r($idList);
        };

        $passwordSql = $pdo->prepare('select * from member where password = :password');
        $passwordSql->bindValue(':password', $password, PDO::PARAM_STR);
        $passwordSql->execute();
        $passwordList = $passwordSql->fetchAll(PDO::FETCH_ASSOC);
        if (count($passwordList) > 0) {
            $errors[] = 'パスワードが既に使われています。';
        };
//ここまでにエラーがあれば表示して以下のスクリプトを行わずストップ
        if (count($errors) > 0) {
            echo '<hr>';
            echo implode('<br>', $errors);
            exit();
        };

//データベースに登録
        try {
            $insertSql = $pdo->prepare('insert into member (id, name, password) values (:id, :name, :password)');
            $insertSql->bindValue(':id', $id, PDO::PARAM_STR);
            $insertSql->bindValue(':name', $name, PDO::PARAM_STR);
            $insertSql->bindValue(':password', $password, PDO::PARAM_STR);
            if ($insertSql->execute()) {
                echo '<hr>会員登録が完了しました。';
                echo '<br>ユーザー名：' . $name;
                echo '<br>ユーザーID：' . $id;
                echo '<br>パスワード：' . $password;
            } else {
                echo '<hr>';
                echo '会員登録にエラーがありました。';
            }
        } catch (Exception $e) {
            echo '<hr>';
            echo '会員登録にエラーがありました。';
            exit();
        };
    };
};

require_once('footer.php')
?>
