<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-11 17:13:45
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\EmployeeEditView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602557b99aaf65_40842696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ba99c823be2bbe68d05f81bae670fbe96eafffc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\EmployeeEditView.tpl',
      1 => 1613059231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602557b99aaf65_40842696 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1800071571602557b992d699_57737997', 'content');
?>



<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'messages'} */
class Block_487987517602557b996f3c8_48684071 extends Smarty_Internal_Block
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
class Block_1800071571602557b992d699_57737997 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1800071571602557b992d699_57737997',
  ),
  'messages' => 
  array (
    0 => 'Block_487987517602557b996f3c8_48684071',
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
employeeSave" method="post" class="pure-form pure-form-aligned">
                                <legend>Dane pracownika</legend>
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
                                    <label for="hire_date">Data zatrudnienia</label>
                                    <input id="hire_date" type="text" placeholder="data zatrudnienia [Y-m-d]" name="hire_date" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->hire_date;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="login">Login</label>
                                    <input id="login" type="text" placeholder="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="password">Hasło</label>
                                    <input id="password" type="text" placeholder="hasło" name="password" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->password;?>
">
                                </div>
                                <div class="top-margin">
                                    <label for="role">Rola pracownika</label>
                                    <input id="role" type="text" placeholder="rola [admin/user]" name="role" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->role;?>
">
                                </div>
                                <div class="top margin" style="display: flex">
                                    <a class="pure-button button-secondary" style="width: 35%" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
employeeList">Powrót</a>
                                    &nbsp;
                                    <input type="submit" class="pure-button pure-button-primary"  style="width: 65%" value="Zapisz"/>
                                </div>
                                <input type="hidden" name="IDcustomer" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->IDemployee;?>
">
                            </form>	
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_487987517602557b996f3c8_48684071', 'messages', $this->tplIndex);
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
