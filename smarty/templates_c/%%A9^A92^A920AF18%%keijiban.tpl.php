<?php /* Smarty version 2.6.30, created on 2016-12-26 09:32:22
         compiled from keijiban.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2 class="page-header">掲示板</h2>

<?php if ($this->_tpl_vars['login'] == 'yes'): ?>
    <form action="keijiban.php" method="post">
        <ul>
            <li><label>テキスト：<textarea name="text" cols=30 rows=5 maxlength=100 placeholder="投稿内容を入力"></textarea></label></li>
            <li><input type="submit" value="投稿"></li>
        </ul>
    </form>
    <?php if ($this->_tpl_vars['kakikomi'] == 'yes'): ?>
        <p>投稿しました。</p>
    <?php endif; ?>
<?php else: ?>
    <p>書き込みをするにはログインしてください。</p>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['postList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
    <hr>
    <p>ユーザー名：<?php echo $this->_tpl_vars['row']['name']; ?>
　　投稿日時：<?php echo $this->_tpl_vars['row']['date']; ?>
</p>
    <p><?php echo $this->_tpl_vars['row']['contents']; ?>
</p>
<?php endforeach; endif; unset($_from); ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>