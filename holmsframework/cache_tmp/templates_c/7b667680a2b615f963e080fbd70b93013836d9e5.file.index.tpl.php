<?php /* Smarty version Smarty-3.1.13, created on 2013-02-03 08:31:12
         compiled from "D:/wamp/www/myweb/site_www/templates/frontend/home/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30297510042948a1f35-11846985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b667680a2b615f963e080fbd70b93013836d9e5' => 
    array (
      0 => 'D:/wamp/www/myweb/site_www/templates/frontend/home/index.tpl',
      1 => 1358746460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30297510042948a1f35-11846985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51004294aa36a9_87696321',
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51004294aa36a9_87696321')) {function content_51004294aa36a9_87696321($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include 'D:\\wamp\\www\\myweb/holmsframework/component/Smarty-3.1.13/libs/plugins/modifier.capitalize.php';
?><html><head><title>Home page</title><meta charset="utf-8" /></head><body>Home Information:<p>Name: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['name']->value);?>
<br></body></html><?php }} ?>