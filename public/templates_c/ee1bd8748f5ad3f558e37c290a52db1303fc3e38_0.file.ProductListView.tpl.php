<?php
/* Smarty version 3.1.34-dev-7, created on 2021-03-01 16:14:50
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\ProductListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_603d04eaa1d013_14133691',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee1bd8748f5ad3f558e37c290a52db1303fc3e38' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\ProductListView.tpl',
      1 => 1614611688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_603d04eaa1d013_14133691 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_469525926603d04ea964d76_55357392', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_605232597603d04ea9917f5_71873743 extends Smarty_Internal_Block
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
class Block_469525926603d04ea964d76_55357392 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_469525926603d04ea964d76_55357392',
  ),
  'messages' => 
  array (
    0 => 'Block_605232597603d04ea9917f5_71873743',
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
            <!--<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['this']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['this']->value->role;?>
</span>-->
        </ol>
        
        <div class="row">
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Produkty </h1>
                </header>
                
                <div class="bottom-margin">
                    <h3 class="page-title">Wyszukaj: </h3>
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productList" class="form-inline">
                        <input type="text" placeholder="Nazwa produktu..." name="product_name" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->product_name;?>
" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
                <div class="bottom-margin">
                    <a class="pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productNew">+ nowy produkt</a>
                    <a class="pure-button button-error" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productList">lista</a>
                </div>	
                
                <div class="top-margin">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_605232597603d04ea9917f5_71873743', 'messages', $this->tplIndex);
?>

                </div>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa produktu</th>
                            <th>Kategoria</th>
                            <th>Cena</th>
                            <th>Ilość</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                        <tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["IDproduct"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["product_name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["category"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["price"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["quantity"];?>
</td><td><a class="button-small pure-button button-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['IDproduct'];?>
">Edytuj</a>&nbsp;<a class="button-small pure-button button-warning" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['IDproduct'];?>
">Usuń</a><?php if ($_smarty_tpl->tpl_vars['p']->value["quantity"] > 0) {?>&nbsp;<a class="button-small pure-button button-success" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
customerList?IDproduct=<?php echo $_smarty_tpl->tpl_vars['p']->value['IDproduct'];?>
">Dodaj do zamówienia</a><?php } else { ?>&nbsp; BRAK<?php }?></td></tr>
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
