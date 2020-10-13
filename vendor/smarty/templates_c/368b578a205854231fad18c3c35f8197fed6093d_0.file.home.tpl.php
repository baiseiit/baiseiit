<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 04:09:46
  from 'C:\xampp\htdocs\baiseiit\Views\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f85288a937187_59612520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '368b578a205854231fad18c3c35f8197fed6093d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\baiseiit\\Views\\home.tpl',
      1 => 1602562118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f85288a937187_59612520 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
	<h1 class="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
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
