<?php /* Smarty version 2.6.30, created on 2016-12-26 09:31:02
         compiled from logout.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2 class="page-header">ログアウト</h2>

<?php if ($this->_tpl_vars['login'] == 'yes'): ?>
    <form action="logout.php" method="post">
        <input type="hidden" name="logout" value="logout">
        <input type="submit" value="ログアウト">
    </form>
    <?php if ($this->_tpl_vars['logout'] == 'yes'): ?>
        <hr>
        <p>ログアウトしました。</p>
    <?php endif; ?>
<?php else: ?>
    <p>すでにログアウトしています。</p>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>