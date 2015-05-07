<?php /* Smarty version 3.1.22-dev/17, created on 2015-04-08 17:45:56
         compiled from "/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/src/templates/mail/forgot.html" */ ?>
<?php
/*%%SmartyHeaderCode:412119239552593840f25d3_94781476%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ef017d00085ccac33d85b279ee7b37f2144d614' => 
    array (
      0 => '/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/src/templates/mail/forgot.html',
      1 => 1402325672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '412119239552593840f25d3_94781476',
  'variables' => 
  array (
    'account' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_55259384201f15_16536950',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55259384201f15_16536950')) {
function content_55259384201f15_16536950 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '412119239552593840f25d3_94781476';
echo $_smarty_tpl->tpl_vars['account']->value->getEmail();?>
<?php }
}
?>