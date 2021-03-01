<?php
/* Smarty version 3.1.34-dev-7, created on 2021-03-01 16:08:00
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\ProductEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_603d03504b6353_06953342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b861e21569a8a2b7e3a44fdda5e78e94750c723b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\ProductEditView.tpl',
      1 => 1614611278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_603d03504b6353_06953342 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184348623603d0350451150_86765081', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_1884029881603d035047d073_07237901 extends Smarty_Internal_Block
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
class Block_184348623603d0350451150_86765081 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_184348623603d0350451150_86765081',
  ),
  'messages' => 
  array (
    0 => 'Block_1884029881603d035047d073_07237901',
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
productSave" method="post" class="pure-form pure-form-aligned">
                                <legend>Dane produktu</legend>
                                <div class="top-margin">
                                    <label for="product_name">Nazwa produktu</label>
                                    <input id="product_name" type="text" placeholder="nazwa produktu" name="product_name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->product_name;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="category">Kategoria</label>
                                    <input id="category" type="text" placeholder="kategoria" name="category" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->category;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="price">Cena</label>
                                    <input id="price" type="text" placeholder="cena" name="price" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->price;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="quantity">Ilość</label>
                                    <input id="quantity" type="text" placeholder="ilość" name="quantity" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->quantity;?>
">
                                </div>
                                <div class="top margin" style="display: flex">
                                    <a class="pure-button button-secondary" style="width: 35%" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productList">Powrót</a>
                                    &nbsp;
                                    <input type="submit" class="pure-button pure-button-primary"  style="width: 65%" value="Zapisz"/>
                                </div>
                                <input type="hidden" name="IDproduct" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDproduct;?>
">
                            </form>	
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1884029881603d035047d073_07237901', 'messages', $this->tplIndex);
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
