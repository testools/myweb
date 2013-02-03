<?php /* Smarty version Smarty-3.1.13, created on 2013-01-20 14:37:03
         compiled from "D:/wamp/www/myweb/holmsframework/cache_tmp/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:800250fbffc174e4b9-82411551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9020b9cebbcb0010c8866f741b7f539c80b1c1a' => 
    array (
      0 => 'D:/wamp/www/myweb/holmsframework/cache_tmp/templates/index.tpl',
      1 => 1358692619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '800250fbffc174e4b9-82411551',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_50fbffc1b43421_32064909',
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fbffc1b43421_32064909')) {function content_50fbffc1b43421_32064909($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'holmsframework/component/Smarty-3.1.13/libs/plugins/modifier.capitalize.php';
?><html>
<head>
<title>asdasd</title>
<meta charset="utf-8" /> 
</head>
<body>

Information:<p>

Name: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['name']->value);?>
<br>

</body>
</html><?php }} ?>