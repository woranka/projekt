<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-04 23:56:27
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\CustomerEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c7b9bac0e84_79317704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42804a0b9e4f136d2bfe747be01e8739360393d3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\CustomerEditView.tpl',
      1 => 1612479385,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c7b9bac0e84_79317704 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2008638455601c7b9ba2f3e8_95266207', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_485214723601c7b9ba7c999_02528608 extends Smarty_Internal_Block
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
class Block_2008638455601c7b9ba2f3e8_95266207 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_2008638455601c7b9ba2f3e8_95266207',
  ),
  'messages' => 
  array (
    0 => 'Block_485214723601c7b9ba7c999_02528608',
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
customerSave" method="post" class="pure-form pure-form-aligned">
                                <legend>Dane klienta</legend>
                                <div class="top-margin">
                                    <label for="name">Imię</label>
                                    <input id="name" type="text" placeholder="imię" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="surname">Nazwisko</label>
                                    <input id="surname" type="text" placeholder="nazwisko" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->surname;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="phone_number">Nr telefonu</label>
                                    <input id="phone_number" type="text" placeholder="nr telefonu" name="phone_number" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->phone_number;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" placeholder="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->email;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="city">Miasto</label>
                                    <input id="city" type="text" placeholder="miasto" name="city" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->city;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="postal_code">Kod pocztowy</label>
                                    <input id="postal_code" type="text" placeholder="kod pocztowy" name="postal_code" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->postal_code;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="street_name">Ulica</label>
                                    <input id="street_name" type="text" placeholder="ulica" name="street_name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->street_name;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="street_number">Nr budynku</label>
                                    <input id="street_number" type="text" placeholder="nr budynku" name="street_number" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->street_number;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="house_number">Nr lokalu</label>
                                    <input id="house_number" type="text" placeholder="nr lokalu" name="house_number" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->house_number;?>
">
                                </div>
                                <div class="top margin" style="display: flex">
                                    <a class="pure-button button-secondary" style="width: 50%" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
customerList">Powrót</a>
                                    &nbsp;
                                    <input type="submit" class="pure-button pure-button-primary"  style="width: 50%" value="Zapisz"/>
                                </div>
                                <input type="hidden" name="IDcustomer" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDcustomer;?>
">
                            </form>	
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_485214723601c7b9ba7c999_02528608', 'messages', $this->tplIndex);
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
