<?php /* Smarty version 2.6.30, created on 2016-12-27 10:52:24
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2 class="page-header">ログイン</h2>

<?php if ($this->_tpl_vars['login'] == 'yes'): ?>
    <p>既にログインしています。</p>
<?php else: ?>
    <div style="overflow:hidden;">
        <div style="float:left;">
            <form action="login.php" method="post">
                <ul>
                    <li><label>ユーザーID：<input type="text" name="id"></label></li>
                    <li><label>パスワード：<input type="password" name="password"></label></li>
                    <li><input type="submit" value="ログイン"></li>
                </ul>
            </form>
        </div>
                <?php if ($this->_tpl_vars['post'] == 'yes'): ?>
                        <?php if ($this->_tpl_vars['err'] == 'yes'): ?>
                <div style="float:left;">
                    <ul>
                        <?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                            <li><?php echo $this->_tpl_vars['value']; ?>
</li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </div>
            <?php else: ?>
                <div style="float:left;">
                    <p>ログインしました。</p>
                    <p>ようこそ、<?php echo $this->_tpl_vars['name']; ?>
さん。</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>