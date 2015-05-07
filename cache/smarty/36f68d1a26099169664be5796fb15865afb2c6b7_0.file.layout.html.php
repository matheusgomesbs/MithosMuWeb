<?php /* Smarty version 3.1.22-dev/17, created on 2015-04-08 17:45:56
         compiled from "/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/src/templates/mail/layout.html" */ ?>
<?php
/*%%SmartyHeaderCode:892161632552593842522c3_54491682%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36f68d1a26099169664be5796fb15865afb2c6b7' => 
    array (
      0 => '/Users/flaviohernandes/Projetos/php/MuOnline/Mithos/src/templates/mail/layout.html',
      1 => 1428523334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '892161632552593842522c3_54491682',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.22-dev/17',
  'unifunc' => 'content_55259384260426_41476593',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55259384260426_41476593')) {
function content_55259384260426_41476593 ($_smarty_tpl) {
?>
<?php
$_smarty_tpl->properties['nocache_hash'] = '892161632552593842522c3_54491682';
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