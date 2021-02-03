<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-02 21:20:31
  from 'C:\xampp\htdocs\PROJEKTY\sklep\app\views\StartView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6019b40f6b7f87_97309243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5752d189d1d05fd0f2a0ecba6d006def07217be8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\PROJEKTY\\sklep\\app\\views\\StartView.tpl',
      1 => 1612297226,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6019b40f6b7f87_97309243 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3049749956019b40f67d3a7_43746830', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_3049749956019b40f67d3a7_43746830 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_3049749956019b40f67d3a7_43746830',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <!-- Header -->
    <header id="head">
            <div class="container">
                <div class="row">
                    <h1 class="lead">TU ODKRYJESZ NOWE SMAKI</h1><br>
                </div>
                <div class="searchbox">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
start" class="pure-form">
                        <fieldset>
                            <input type="text" placeholder="Nazwa produktu..." name="product_name" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->product_name;?>
" />
                            <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                        </fieldset>
                    </form>    
                </div>
            </div>
    </header>
    <!-- /Header -->

    <!-- Intro -->
    <div class="container text-center">
        <div class="col-md-12">
            <h3 class="text-center thin">Dostępne produkty: </h3></br>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
            <tr><li class="msg search-results"><td><?php echo $_smarty_tpl->tpl_vars['p']->value["product_name"];?>
</td>&nbsp;<td><?php echo $_smarty_tpl->tpl_vars['p']->value["price"];?>
</td>&nbsp;<td><?php echo $_smarty_tpl->tpl_vars['p']->value["quantity"];?>
</td></li></tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
    <!-- /Intro-->

    <!-- Highlights - jumbotron -->
    <div class="jumbotron top-space">
        <div class="container">
            <h3 class="text-center thin">Polecane produkty <i class="fa fa-heart fa-5"></i></h3></br>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/images/sl1.png">
                    </div>

                    <div class="item">
                      <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/images/sl2.png">
                    </div>

                    <div class="item">
                      <img src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/images/sl3.png">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="sr-only">Next</span>
                  </a>
                </div>

        </div>
    </div>
    <!-- /Highlights -->   
<?php
}
}
/* {/block 'content'} */
}
