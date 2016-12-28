<?php /* Smarty version 2.6.30, created on 2016-12-27 06:41:59
         compiled from mypage.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h2 class="page-header">マイページ</h2>

<?php if ($this->_tpl_vars['login'] == 'yes'): ?>
        <?php if ($this->_tpl_vars['edit'] == 'update'): ?>
        <p>更新しました。</p>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['edit'] == 'delete'): ?>
        <p>削除しました。</p>
    <?php endif; ?>

        <?php if ($this->_tpl_vars['post'] == 'yes'): ?>
        <table>
            <tr>
                <th>投稿日時</th><th>内容</th><th></th><th></th>
            </tr>
            <?php $_from = $this->_tpl_vars['postList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
                <tr>
                    <form action="mypage.php" method="post">
                                                <input type="hidden" name="post_id" value="<?php echo $this->_tpl_vars['row']['id']; ?>
">
                        <td><?php echo $this->_tpl_vars['row']['date']; ?>
</td>
                        <td><textarea name="text" cols=70 rows=5 maxlength=100><?php echo $this->_tpl_vars['row']['contents']; ?>
</textarea></td>
                        <td><select name="edit">
                                <option value="update">更新</option>
                                <option value="delete">削除</option>
                            </select></td>
                        <td><input type="submit" value="決定"></td>
                    </form>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        </table>
    <?php endif; ?>
<?php else: ?>
    <p>マイページを利用するにはログインしてください</p>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>