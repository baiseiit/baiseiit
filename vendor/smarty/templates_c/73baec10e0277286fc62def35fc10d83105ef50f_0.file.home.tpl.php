<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 11:18:40
  from 'C:\xampp\htdocs\baiseiit\views\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f843b903ce7c7_58155589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '73baec10e0277286fc62def35fc10d83105ef50f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\baiseiit\\views\\home.tpl',
      1 => 1593030738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f843b903ce7c7_58155589 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>Test view</title>
</head>
<body>
	Welcome, <?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
!
	<ul>	
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
			<li><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</li>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</body>
</html><?php }
}
