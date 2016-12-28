<?php /* Smarty version 2.6.30, created on 2016-12-28 09:30:27
         compiled from touroku.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2 class="page-header">会員登録</h2>

<?php if ($this->_tpl_vars['login'] == 'yes'): ?>
    <p>新しく会員登録をするにはログアウトしてください。</p>
<?php else: ?>
    <div style="overflow:hidden;">
        <div style="float:left;">
            <form action="touroku.php" method="post">
                <ul>
                    <li><label>ユーザー名：<input type="text" name="name"></label></li>
                    <li><label>ユーザーID：<input type="text" name="id" placeholder="英数字のみ"></label></li>
                    <li><label>パスワード：<input type="password" name="password"></label></li>
                    <li><input type="submit" value="登録"></li>
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
                    <p>会員登録が完了しました。</p>
                    <ul>
                        <li>ユーザー名：<?php echo $this->_tpl_vars['name']; ?>
</li>
                        <li>ユーザーID:<?php echo $this->_tpl_vars['id']; ?>
</li>
                        <li>パスワード：<?php echo $this->_tpl_vars['password']; ?>
</li>
                    </ul>
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