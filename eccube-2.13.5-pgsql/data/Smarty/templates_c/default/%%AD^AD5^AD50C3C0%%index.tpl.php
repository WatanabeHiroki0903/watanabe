<?php /* Smarty version 2.6.27, created on 2017-01-30 02:53:12
         compiled from /vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/mypage/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'script_escape', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/mypage/index.tpl', 26, false),array('modifier', 'h', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/mypage/index.tpl', 26, false),array('modifier', 'sfDispDBDate', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/mypage/index.tpl', 61, false),array('modifier', 'n2s', '/vagrant/www/eccube-2.13.5-pgsql/html/../data/Smarty/templates/default/mypage/index.tpl', 65, false),)), $this); ?>

<div id="mypagecolumn">
    <h2 class="title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_title'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h2>
    <?php if (((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ""): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=$this->_tpl_vars['tpl_navi'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => (@TEMPLATE_REALDIR)."mypage/navi.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <div id="mycontents_area">
        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<?php echo ((is_array($_tmp=@TRANSACTION_ID_NAME)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['transactionid'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <input type="hidden" name="order_id" value="" />
            <input type="hidden" name="pageno" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['objNavi']->nowpage)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
" />
            <h3><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['tpl_subtitle'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</h3>

            <?php if (((is_array($_tmp=$this->_tpl_vars['objNavi']->all_row)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) > 0): ?>

                <p><span class="attention"><?php echo ((is_array($_tmp=$this->_tpl_vars['objNavi']->all_row)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
件</span>の購入履歴があります。</p>
                <div class="pagenumber_area">
                    <!--▼ページナビ-->
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['objNavi']->strnavi)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>

                    <!--▲ページナビ-->
                </div>

                <table summary="購入履歴">
                    <tr>
                        <th class="alignC">購入日時</th>
                        <th class="alignC">注文番号</th>
                        <th class="alignC">お支払い方法</th>
                        <th class="alignC">合計金額</th>
                        <?php if (((is_array($_tmp=@MYPAGE_ORDER_STATUS_DISP_FLAG)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                        <th class="alignC">ご注文状況</th>
                        <?php endif; ?>
                        <th class="alignC">詳細</th>
                    </tr>
                    <?php unset($this->_sections['cnt']);
$this->_sections['cnt']['name'] = 'cnt';
$this->_sections['cnt']['loop'] = is_array($_loop=((is_array($_tmp=$this->_tpl_vars['arrOrder'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cnt']['show'] = true;
$this->_sections['cnt']['max'] = $this->_sections['cnt']['loop'];
$this->_sections['cnt']['step'] = 1;
$this->_sections['cnt']['start'] = $this->_sections['cnt']['step'] > 0 ? 0 : $this->_sections['cnt']['loop']-1;
if ($this->_sections['cnt']['show']) {
    $this->_sections['cnt']['total'] = $this->_sections['cnt']['loop'];
    if ($this->_sections['cnt']['total'] == 0)
        $this->_sections['cnt']['show'] = false;
} else
    $this->_sections['cnt']['total'] = 0;
if ($this->_sections['cnt']['show']):

            for ($this->_sections['cnt']['index'] = $this->_sections['cnt']['start'], $this->_sections['cnt']['iteration'] = 1;
                 $this->_sections['cnt']['iteration'] <= $this->_sections['cnt']['total'];
                 $this->_sections['cnt']['index'] += $this->_sections['cnt']['step'], $this->_sections['cnt']['iteration']++):
$this->_sections['cnt']['rownum'] = $this->_sections['cnt']['iteration'];
$this->_sections['cnt']['index_prev'] = $this->_sections['cnt']['index'] - $this->_sections['cnt']['step'];
$this->_sections['cnt']['index_next'] = $this->_sections['cnt']['index'] + $this->_sections['cnt']['step'];
$this->_sections['cnt']['first']      = ($this->_sections['cnt']['iteration'] == 1);
$this->_sections['cnt']['last']       = ($this->_sections['cnt']['iteration'] == $this->_sections['cnt']['total']);
?>
                        <tr>
                            <td class="alignC"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['create_date'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('sfDispDBDate', true, $_tmp) : SC_Utils_Ex::sfDispDBDate($_tmp)); ?>
</td>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
</td>
                            <?php $this->assign('payment_id', ($this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['payment_id'])); ?>
                            <td class="alignC"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrPayment'][$this->_tpl_vars['payment_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                            <td class="alignR"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['payment_total'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('n2s', true, $_tmp) : smarty_modifier_n2s($_tmp)); ?>
円</td>

                            <?php if (((is_array($_tmp=@MYPAGE_ORDER_STATUS_DISP_FLAG)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <?php $this->assign('order_status_id', ($this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['status'])); ?>
                                <?php if (((is_array($_tmp=$this->_tpl_vars['order_status_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)) != ((is_array($_tmp=@ORDER_PENDING)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp))): ?>
                                <td class="alignC"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCustomerOrderStatus'][$this->_tpl_vars['order_status_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                                <?php else: ?>
                                <td class="alignC attention"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrCustomerOrderStatus'][$this->_tpl_vars['order_status_id']])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)))) ? $this->_run_mod_handler('h', true, $_tmp) : smarty_modifier_h($_tmp)); ?>
</td>
                                <?php endif; ?>
                            <?php endif; ?>
                            <td class="alignC"><a href="<?php echo ((is_array($_tmp=@ROOT_URLPATH)) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
mypage/history.php?order_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['arrOrder'][$this->_sections['cnt']['index']]['order_id'])) ? $this->_run_mod_handler('script_escape', true, $_tmp) : smarty_modifier_script_escape($_tmp)); ?>
">詳細</a></td>
                        </tr>
                    <?php endfor; endif; ?>
                </table>

            <?php else: ?>
                <p>購入履歴はありません。</p>
            <?php endif; ?>
        </form>
    </div>
</div>