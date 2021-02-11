<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-11 15:34:43
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\OrderListView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602540834cd170_98781272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03ea7b17a0682a95c282a9338f3bfd516f71b7f7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\OrderListView.tpl',
      1 => 1613054081,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602540834cd170_98781272 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16795196346025408346f4f8_52856168', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_16795196346025408346f4f8_52856168 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16795196346025408346f4f8_52856168',
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
                        <input type="text" placeholder="Numer zamówienia..." name="order_number" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->IDproduct;?>
" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>	
                
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <!--<th>Numer zamówienia</th>-->
                            <th>Data zamówienia</th>
                            <th>ID produktu</th>
                            <th>ID klienta</th>
                            <th>ID pracownika</th>
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
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["IDproduct"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["IDcustomer"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["IDemployee"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["order_completed"];?>
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
