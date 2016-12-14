<?php
session_start();
require_once('header.php');
require_once('util.php');
?>

<h1>掲示板</h1>

<?php
//データベースに接続
try{
    $pdo=new PDO('mysql:host=localhost; dbname=keijiban; charset=utf8', 'keijibanuser', 'soccer0903');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    echo 'データベースの接続に失敗しました。';
    exit();
};

if(isset($_SESSION['customer'])){
    ?>
    <form action="keijiban.php" method="post">
        <ul>
            <li><label>テキスト：<textarea name="text" cols=30 rows=5 maxlength=100 placeholder="投稿するテキストを入力"></textarea></label></li>
            <li><input type="submit" value="投稿する"></li>
        </ul>
    </form>
<?php
    //書き込み
    if(isset($_POST['text'])){
        $post=trim($_POST['text']);
        if($post!==''){
            $date=date('Y/n/j G:i:s', time());
            $post=es($post);
            $inputSql=$pdo->prepare('insert into post (contents, user_id, date) values (:post, :id, :date)');
            $inputSql->bindValue(':post', $post, PDO::PARAM_STR);
            $inputSql->bindValue(':id', $_SESSION['customer']['id'], PDO::PARAM_STR);
            $inputSql->bindValue(':date', $date, PDO::PARAM_STR);
            if($inputSql->execute()){
                echo '書き込みました。';
            }else{
                echo '書き込みに失敗しました。';
            };
        };
    };
}else{
    echo '書き込みをするにはログインしてください。';
};


//データベースのデータの表示
$outputSql=$pdo->prepare('select post.contents, post.date, member.name from post, member where post.user_id = member.id');
$outputSql->execute();
$postList=$outputSql->fetchAll(PDO::FETCH_ASSOC);

if(count($postList)>0){
    foreach($postList as $row){
        echo '<hr>';
        echo 'ユーザー名:'. es($row['name']). '　　投稿日時:'. $row['date']. '<br>';
        $contents=nl2br($row['contents'], false);
        echo $contents;
    };
};



require_once('footer.php');
?>