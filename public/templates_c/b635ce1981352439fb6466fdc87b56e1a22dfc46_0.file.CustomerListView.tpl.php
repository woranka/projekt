<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-25 13:37:42
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\CustomerListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60379a1663b8c0_93765038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b635ce1981352439fb6466fdc87b56e1a22dfc46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\CustomerListView.tpl',
      1 => 1614256265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60379a1663b8c0_93765038 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_44074625260379a16471675_45950376', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_154634668460379a164ac124_80649271 extends Smarty_Internal_Block
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
class Block_44074625260379a16471675_45950376 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_44074625260379a16471675_45950376',
  ),
  'messages' => 
  array (
    0 => 'Block_154634668460379a164ac124_80649271',
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
                    <h1 class="page-title">Klienci </h1>
                </header>
                
                <div class="bottom-margin">
                    <h3 class="page-title">Wyszukaj: </h3>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
customerList" class="form-inline">
                        <input type="text" placeholder="Nazwisko..." name="surname" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->surname;?>
" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
                <div class="bottom-margin">
                    <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
customerNew">+ nowy klient</a>
                    <a class="pure-button button-error" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
customerList">lista</a>
                </div>	
                
                <div class="top-margin">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_154634668460379a164ac124_80649271', 'messages', $this->tplIndex);
?>

                </div>
                <div class="table-responsive">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nazwisko</th>
                            <th>Imię</th>
                            <th>Nr telefonu</th>
                            <th>Email</th>
                            <th>Miasto</th>
                            <th>Kod pocztowy</th>
                            <th>Ulica</th>
                            <th>Nr budynku</th>
                            <th>Nr lokalu</th>
                            <th>Opcje</th>
                            <th>Zamówienia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['customer']->value, 'c');
$_smarty_tpl->tpl_vars['c']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->do_else = false;
?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['c']->value["IDcustomer"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["surname"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["phone_number"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["email"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["city"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["postal_code"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["street_name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["street_number"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['c']->value["house_number"];?>
</td><td style='display:flex'><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
customerEdit/<?php echo $_smarty_tpl->tpl_vars['c']->value['IDcustomer'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
customerDelete/<?php echo $_smarty_tpl->tpl_vars['c']->value['IDcustomer'];?>
">Usuń</a></td><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['IDproduct']->value;
$_prefixVariable1 = ob_get_clean();
if ((!($_smarty_tpl->tpl_vars['c']->value["IDorder"] == '') && ($_prefixVariable1 == ''))) {?><a class="button-small pure-button button-primary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderList?IDcustomer=<?php echo $_smarty_tpl->tpl_vars['c']->value["IDcustomer"];?>
">Szczegóły</a><?php }
ob_start();
echo $_smarty_tpl->tpl_vars['IDproduct']->value;
$_prefixVariable2 = ob_get_clean();
if ((!($_prefixVariable2 == ''))) {?><a class="button-small pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
orderSave?IDcustomer=<?php echo $_smarty_tpl->tpl_vars['c']->value["IDcustomer"];?>
&IDproduct=<?php echo $_smarty_tpl->tpl_vars['IDproduct']->value;?>
">Wybierz</a><?php }?></td></tr>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </tbody>
                </table>
                </div>
                <div class="top-margin">
                    <?php ob_start();
echo $_smarty_tpl->tpl_vars['IDproduct']->value;
$_prefixVariable3 = ob_get_clean();
if (!($_prefixVariable3 == '')) {?>
                        <a class="pure-button button-secondary" style="float:right" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productList">wróć do listy produktów</a>
                    <?php }?>
                </div>
            </article>
        </div>
    </div>
<?php
}
}
/* {/block 'content'} */
}
