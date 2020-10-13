<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 22:32:20
  from 'C:\xampp\htdocs\own-cms\views\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef3b854e6e907_36255906',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a87e6a25c1361796640530835660f03fa8e4196' => 
    array (
      0 => 'C:\\xampp\\htdocs\\own-cms\\views\\home.tpl',
      1 => 1593030738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef3b854e6e907_36255906 (Smarty_Internal_Template $_smarty_tpl) {
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
