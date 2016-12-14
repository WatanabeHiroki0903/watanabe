<?php
session_start();
require_once('header.php');
require_once('util.php');
?>

<h1>ログアウト</h1>

<?php
if(isset($_SESSION['customer'])){
    ?>
    <form action="<?php echo es($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="submit" name="logout" value="ログアウト">
    </form>
<?php
    if(isset($_POST['logout'])){
        unset($_SESSION['customer']);
        echo 'ログアウトしました。';
    };
}else{
    echo '既にログアウトしています。';
}

require_once('footer.php');
?>