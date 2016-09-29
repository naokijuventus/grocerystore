<?php
/* Smarty version 3.1.29, created on 2016-09-22 05:40:02
  from "C:\xampp\htdocs\public_html\instance\views\templates\myaccount\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57e352926fc965_57212361',
  'file_dependency' => 
  array (
    '0237b81b4231cdc306d0d85c4b44242cd6b3360d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\public_html\\instance\\views\\templates\\myaccount\\index.tpl',
      1 => 1474271168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e352926fc965_57212361 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<link rel="stylesheet" href="css/myaccount.css">
		<title>My Account</title>
	</head>
	<body>
		<center>
			<h1 id="header">Account Information</h1>
			<div id="content">
			<h2 id="user">お客様情報</h2>
				<table>
					<tr>
						<td>氏名</td>
						<td class="userInfo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><input type="button" name="userName" value="編集"></td>
					</tr>
					<tr>
						<td>フリガナ</td>
						<td class="userInfo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phonetic']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><input type="button" name="userName" value="編集"></td>
					</tr>
					<tr>
						<td>電話番号</td>
						<td class="userInfo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><input type="button" name="phone" value="編集"></td>
					</tr>
					<tr>
						<td>MAIL</td>
						<td class="userInfo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mail']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><input type="button" name="phone" value="編集"></td>
					</tr>
					<tr>
						<td>住所</td>
						<td class="userInfo"><div>郵便番号：<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['postal_code']->value, ENT_QUOTES, 'UTF-8', true);?>
</div><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><input type="button" name="address" value="編集"></td>
					</tr>
					<tr>
						<td>生年月日</td>
						<td class="userInfo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['birth']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><input type="button" name="birth" value="編集"></td>
					</tr>
					<tr>
						<td>支払い方法</td>
						<td class="userInfo"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['payment']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td><input type="button" name="payment" value="編集"></td>
					</tr>
				</table>
				<h2 id="history">購入履歴</h2>
				<div id="purchaseHistory">
					<table>
						<tr>
							<th>購入番号</th><th>購入日</th><th>購入商品明細</th><th>金額</th>
						</tr>
						<?php echo $_smarty_tpl->tpl_vars['nodata']->value;?>

						<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['order_no']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
						<tr>
							<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_no']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</td>
							<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase_date']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['goods']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</td>
							<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['price']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</td>
						</tr>
						<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
					</table>
				</div>
				<div id="btn_return"><input type="button" name="continue" value="戻&nbsp;る" onclick="location.href='goods'"></div>
			</div>
		</center>
	</body>
</html><?php }
}
