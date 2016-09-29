<?php
/* Smarty version 3.1.29, created on 2016-08-10 04:23:09
  from "C:\xampp\htdocs\public_html\instance\views\templates\goods\cart.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57aa900de0d181_01682609',
  'file_dependency' => 
  array (
    '222125f4db651734fd446719ec166435eb88f824' => 
    array (
      0 => 'C:\\xampp\\htdocs\\public_html\\instance\\views\\templates\\goods\\cart.tpl',
      1 => 1470573247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57aa900de0d181_01682609 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<link rel="stylesheet" href="../css/cartstyle.css">
		<meta charset="utf-8">
		<title>AddCart</title>
	</head>
	<body>
		<header>
			<p class="msg"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
		</header>
		<table>
			<tr>
				<th>IMAGE</th>
				<th>NAME</th>
				<th>UNIT PRICE</th>
				<th>PRICE</th>
				<th>NUMBER</th>
				<th>FIX</th>
				<th>DELETE</th>
			</tr>
			<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['img_path']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
				<tr>
					<td class="image"><img src="<?php echo $_smarty_tpl->tpl_vars['img_path']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
"></td>
					<td class="name"><?php echo $_smarty_tpl->tpl_vars['name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</td>
					<td class="unitPrice"><?php echo $_smarty_tpl->tpl_vars['price']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</td>
					<td class="sum"><?php echo $_smarty_tpl->tpl_vars['sum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</td>
					<td class="amount"><?php echo $_smarty_tpl->tpl_vars['amount']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</td>
					<td class="fix"><input type="button" name="fix" value="Fix" onClick=""></td>
					<td class="delete"><input type="button" name="delete" Value="Delete" onClick=""></td>
				</tr>
			<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
		</table>
		<ul>
			<li class="total">Toal:<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
Yen</li>
			<li class="buy"><input type="button" name="buy" value="buy" onClick=""></li>
			<li class="continue"><input type="button" name="continue" value="Continue" onClick="location.href='../goods'"></li>
		</ul>
	</body>
</html>
<?php }
}
