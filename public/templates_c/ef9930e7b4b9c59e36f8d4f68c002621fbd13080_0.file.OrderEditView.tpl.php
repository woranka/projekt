<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-31 16:43:07
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\OrderEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6016d00bab2685_99128562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef9930e7b4b9c59e36f8d4f68c002621fbd13080' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\OrderEditView.tpl',
      1 => 1612107734,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6016d00bab2685_99128562 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9973401096016d00ba28cd4_84190658', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_20969225306016d00ba5d8f1_64627155 extends Smarty_Internal_Block
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
class Block_9973401096016d00ba28cd4_84190658 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9973401096016d00ba28cd4_84190658',
  ),
  'messages' => 
  array (
    0 => 'Block_20969225306016d00ba5d8f1_64627155',
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
                                    <label for="order_number">Numer zamówienia</label>
                                    <input id="order_number" type="text" placeholder="Numer zamówienia" name="order_number" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->order_number;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="order_completed">Status</label>
                                    <input id="order_compleyec" type="text" placeholder="Status [0/1]" name="order_completed" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->order_completed;?>
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20969225306016d00ba5d8f1_64627155', 'messages', $this->tplIndex);
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
