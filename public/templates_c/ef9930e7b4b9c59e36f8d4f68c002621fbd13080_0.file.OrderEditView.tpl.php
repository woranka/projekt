<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-26 16:43:48
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\OrderEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60391734caf949_96639085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef9930e7b4b9c59e36f8d4f68c002621fbd13080' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\OrderEditView.tpl',
      1 => 1614354225,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60391734caf949_96639085 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_162033094460391734c03181_89663637', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_38718946260391734c56aa7_67079830 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
                        <div class="messages">
                            <ul>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                            <li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </ul>
                        </div>
                    <?php }?>
                <?php
}
}
/* {/block 'messages'} */
/* {block 'content'} */
class Block_162033094460391734c03181_89663637 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_162033094460391734c03181_89663637',
  ),
  'messages' => 
  array (
    0 => 'Block_38718946260391734c56aa7_67079830',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <header id="head" class="secondary"></header> 
    <div class="container">
              
        <ol class="breadcrumb">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
start">Start</a></li>
            <li class="active">Panel pracownika</li>
        </ol><br/>
        
        <div class="row">
            <article class="col-xs-12 maincontent">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderSave" method="post" class="pure-form pure-form-aligned">
                                <legend>Dane zamówienia</legend>
                                <div class="top-margin">
                                    <label for="order_date">Data zamówienia</label>
                                    <input id="order_date" type="text" readonly="" name="order_date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->order_date;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="order_number">Numer zamówienia</label>
                                    <input id="order_number" type="text" placeholder="Numer zamówienia" name="order_number" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->order_number;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="status">Status</label>
                                    <input id="status" type="text" placeholder="Status [0/1]" name="status" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->status;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="IDproduct">ID produktu</label>
                                    <input id="IDproduct" type="text" placeholder="ID produktu" name="IDproduct" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDproduct;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="IDcustomer">ID klienta</label>
                                    <input id="IDcustomer" type="text" readonly="" name="IDcustomer" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDcustomer;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="IDemployee">ID pracownika</label>
                                    <input id="IDemployee" type="text" readonly="" name="IDemployee" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDemployee;?>
">
                                </div>
                                <div class="top-margin">
                                    <input type="submit" class="pure-button pure-button-primary" value="Zapisz"/>
                                    <a class="pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderList">Powrót</a>
                                </div>
                                <input type="hidden" name="IDorder" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDorder;?>
">
                            </form>	
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_38718946260391734c56aa7_67079830', 'messages', $this->tplIndex);
?>

                </div>
            </article>
        </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
