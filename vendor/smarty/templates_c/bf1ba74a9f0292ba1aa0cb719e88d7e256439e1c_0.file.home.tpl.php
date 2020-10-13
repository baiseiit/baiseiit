<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 05:24:31
  from '/home/alibek/Desktop/baiseiit-0.4/client/Views/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f853a0f2dd263_46279425',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf1ba74a9f0292ba1aa0cb719e88d7e256439e1c' => 
    array (
      0 => '/home/alibek/Desktop/baiseiit-0.4/client/Views/home.tpl',
      1 => 1602566668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f853a0f2dd263_46279425 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<link rel="stylesheet" type="text/css" href="client/assets/css/style.css">
</head>
<body>
	<h1 class="title"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
	<ul>	
		<li><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</li>
	</ul>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</body>
</html>
<?php }
}
