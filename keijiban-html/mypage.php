<?php
session_start();
require_once('header.php');
require_once('util.php');
?>
<h1>マイページ</h1>
<?php
//データベースに接続
try {
    $pdo = new PDO('mysql:host=localhost; dbname=keijiban; charset=utf8', 'keijibanuser', 'soccer0903');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'データベースの接続に失敗しました。';
    exit();
}

if(isset($_SESSION['customer'])){
    //更新または削除で分岐して処理
    if(isset($_POST['id'])){
        switch($_POST['edit']){
            case 'kousin':
                $text=trim($_POST['text']);
                if($text!==""){
                    $text=es($text);
                    $updateSql=$pdo->prepare('update post set contents=:contents where id=:id');
                    $updateSql->bindValue(':contents', $text, PDO::PARAM_STR);
                    $updateSql->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
                    if($updateSql->execute()){
                        echo '更新しました。';
                    };
                };
                break;
            case 'sakujo':
                $deleteSql=$pdo->prepare('delete from post where id=:id');
                $deleteSql->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
                if($deleteSql->execute()){
                    echo '削除しました。';
                };
                break;
            default:
                echo '不正な値が入力されました。';
                break;
        };
    };
//ログインしているユーザーの自分の書き込みを取得して表示
    $sql=$pdo->prepare('select * from post where user_id=:id');
    $sql->bindValue(':id', $_SESSION['customer']['id'], PDO::PARAM_STR);
    $sql->execute();
    $postList=$sql->fetchAll(PDO::FETCH_ASSOC);
    if(count($postList)>0){
?>
        <table>
            <tr>
                <th>投稿日時</th><th>内容</th><th></th><th></th>
            </tr>
<?php
        foreach($postList as $row){
?>

            <tr>
                <form action="mypage.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <td><?php echo $row['date']; ?></td>
                    <td><textarea name="text" cols=70 rows=5 maxlength=100><?php echo $row['contents'] ?></textarea></td>
                    <td><select name="edit">
                            <option value="kousin">更新</option>
                            <option value="sakujo">削除</option>
                        </select></td>
                    <td><input type="submit" value="決定"></td>
                </form>
            </tr>
<?php    }; ?>
        </table>
<?php
    };
}else{
    echo 'マイページを利用するにはログインしてください。';
};



require_once('footer.php');
?>