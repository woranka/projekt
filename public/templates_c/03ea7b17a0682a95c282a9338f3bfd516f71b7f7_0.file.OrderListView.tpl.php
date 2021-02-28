<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-27 19:25:15
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\OrderListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_603a8e8b954414_87190413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03ea7b17a0682a95c282a9338f3bfd516f71b7f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\OrderListView.tpl',
      1 => 1614450313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_603a8e8b954414_87190413 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_154305552603a8e8b8314c0_64311006', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_1777337213603a8e8b861cb7_52004101 extends Smarty_Internal_Block
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
class Block_154305552603a8e8b8314c0_64311006 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_154305552603a8e8b8314c0_64311006',
  ),
  'messages' => 
  array (
    0 => 'Block_1777337213603a8e8b861cb7_52004101',
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
        </ol>
        
        <div class="row">
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Zamówienia </h1>
                </header>
                
                <div class="bottom-margin">
                    <h3 class="page-title">Wyszukaj: </h3> 
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orderList" class="form-inline">
                        <input type="text" placeholder="ID klienta..." name="IDcustomer" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->IDcustomer;?>
" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>	
                <div class="bottom-margin">
                    <a class="pure-button button-error" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderList">lista</a>
                </div>
                <div class="top-margin">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1777337213603a8e8b861cb7_52004101', 'messages', $this->tplIndex);
?>

                </div>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <!--<th>Numer zamówienia</th>-->
                            <th>Data zamówienia</th>
                            <th>Produkt</th>
                            <th>ID klienta</th>
                            <th>Pracownik</th>
                            <th>Wartość [ zł ]</th>
                            <th>Status</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value, 'o');
$_smarty_tpl->tpl_vars['o']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->do_else = false;
?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['o']->value["IDorder"];?>
</td><!--<td><?php echo $_smarty_tpl->tpl_vars['o']->value["order_number"];?>
</td>--><td><?php echo $_smarty_tpl->tpl_vars['o']->value["order_date"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["product_name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["IDcustomer"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["price"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["status"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orderEdit/<?php echo $_smarty_tpl->tpl_vars['o']->value['IDorder'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orderDelete/<?php echo $_smarty_tpl->tpl_vars['o']->value['IDorder'];?>
">Usuń</a></td></tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
                </div> 
            </article>
        </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
