<?php
/* Smarty version 3.1.29, created on 2016-09-14 07:22:29
  from "C:\xampp\htdocs\public_html\instance\views\templates\cart\purchase.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d8de9582a525_01403793',
  'file_dependency' => 
  array (
    '19222a342ec612814ef6e44a0d5ec2dd24085727' => 
    array (
      0 => 'C:\\xampp\\htdocs\\public_html\\instance\\views\\templates\\cart\\purchase.tpl',
      1 => 1473822045,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d8de9582a525_01403793 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<link rel="stylesheet" href="../css/purchase.css">
		<meta charset="utf-8">
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<title>Purchase</title>
	<body>
		<p class="purchaseMsg">購入を確定しました。注文番号は<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order_no']->value, ENT_QUOTES, 'UTF-8', true);?>
です。</p>
		<ul>
			<li class="continue"><input type="button" name="continue" value="買い物を続ける" onclick="location.href='../goods'"></li>
			<li class="home"><input type="button" name="continue" value="ホーム" onclick="location.href='../index'"></li>
		</ul>
	</body>
</html>
<?php }
}
