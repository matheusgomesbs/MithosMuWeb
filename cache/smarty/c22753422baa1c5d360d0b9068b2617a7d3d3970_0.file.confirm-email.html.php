<?php /* Smarty version 3.1.22-dev/17, created on 2015-04-09 14:54:40
         compiled from "/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/src/templates/mail/confirm-email.html" */ ?>
<?php
/*%%SmartyHeaderCode:5516617465526bce0380463_72182693%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c22753422baa1c5d360d0b9068b2617a7d3d3970' => 
    array (
      0 => '/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/src/templates/mail/confirm-email.html',
      1 => 1388762816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5516617465526bce0380463_72182693',
  'variables' => 
  array (
    'account' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_5526bce0559ba8_29638724',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5526bce0559ba8_29638724')) {
function content_5526bce0559ba8_29638724 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '5516617465526bce0380463_72182693';
?>
Confirmação de email <?php echo $_smarty_tpl->tpl_vars['account']->value->getEmail();?>
<?php }
}
?>