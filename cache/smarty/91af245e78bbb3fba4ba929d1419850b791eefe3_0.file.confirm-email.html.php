<?php /* Smarty version 3.1.22-dev/17, created on 2015-04-11 20:46:05
         compiled from "/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/app/templates/mail/confirm-email.html" */ ?>
<?php
/*%%SmartyHeaderCode:1974057555529b23d9a8dc7_67673803%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91af245e78bbb3fba4ba929d1419850b791eefe3' => 
    array (
      0 => '/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/app/templates/mail/confirm-email.html',
      1 => 1388762816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1974057555529b23d9a8dc7_67673803',
  'variables' => 
  array (
    'account' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_5529b23dab5b03_14889221',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5529b23dab5b03_14889221')) {
function content_5529b23dab5b03_14889221 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '1974057555529b23d9a8dc7_67673803';
?>
Confirmação de email <?php echo $_smarty_tpl->tpl_vars['account']->value->getEmail();?>
<?php }
}
?>