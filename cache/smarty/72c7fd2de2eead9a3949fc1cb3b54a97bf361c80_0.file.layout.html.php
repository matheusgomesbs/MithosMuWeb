<?php /* Smarty version 3.1.22-dev/17, created on 2015-04-11 20:46:05
         compiled from "/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/app/templates/mail/layout.html" */ ?>
<?php
/*%%SmartyHeaderCode:4971747635529b23dac7057_11466254%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72c7fd2de2eead9a3949fc1cb3b54a97bf361c80' => 
    array (
      0 => '/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/app/templates/mail/layout.html',
      1 => 1428523334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4971747635529b23dac7057_11466254',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_5529b23db467c0_68098231',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5529b23db467c0_68098231')) {
function content_5529b23db467c0_68098231 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '4971747635529b23dac7057_11466254';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" />
    </head>
    
    <body>
        <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    </body>
</html><?php }
}
?>