<?php
/* Smarty version 3.1.29, created on 2016-09-14 07:03:02
  from "C:\xampp\htdocs\public_html\instance\views\templates\cart\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57d8da06239588_53264768',
  'file_dependency' => 
  array (
    '3b45c68e0dd6102ea421402a4415c6fe63744237' => 
    array (
      0 => 'C:\\xampp\\htdocs\\public_html\\instance\\views\\templates\\cart\\index.tpl',
      1 => 1473829373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d8da06239588_53264768 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<link rel="stylesheet" href="../css/cartstyle.css">
		<meta charset="utf-8">
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<title>Cart</title>
		<?php echo '<script'; ?>
>
			function deleteGoods(id,name){
				if(window.confirm(name + "をカートから削除しますか？")){
					document.cart.deleteId.value=id;
					cart.submit();
				}
			}
			
			function fixAmount(id,name,amount){
				var fAmount;
				if(fAmount = window.prompt(name + "をいくつ購入しますか？",amount)){
					document.cart.fixId.value = id;
					document.cart.fixedAmount.value = fAmount;
					cart.submit();
				}
			}
			
			function buy(){
				if(window.confirm('購入を確定します。よろしいですか？')){
					document.purchase.purchaseFlg.value = "1";
					purchase.submit();
				}
			}
		<?php echo '</script'; ?>
>
	</head>
	<body>
		<center>
			<div id="header">CART</div>
			<div>
				<p class="msg"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['msg']->value, ENT_QUOTES, 'UTF-8', true);?>
</p>
				<p class="errmsg"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['err_msg']->value, ENT_QUOTES, 'UTF-8', true);?>
</p>
			</div>
			<div id="cartContents">
				<table>
					<tr>
						<th class="image">IMAGE</th>
						<th class="name">NAME</th>
						<th class="unitPrice">UNIT PRICE</th>
						<th class="amount">NUMBER</th>
						<th class="sum">PRICE</th>
						<th class="fix">FIX</th>
						<th class="delete">DELETE</th>
					</tr>
						<form action="cart" method="POST" name="cart">
							<?php echo $_smarty_tpl->tpl_vars['nodata']->value;?>

							<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['img_path']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
								<tr>
									<td class="image"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_path']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
"></td>
									<td class="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</td>
									<td class="unitPrice"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['price']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</td>
									<td class="amount"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</td>
									<td class="sum"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sum']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</td>
									<td class="fix"><input type="button" name="fix" value="Fix" onclick="fixAmount('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
','<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
','<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amount']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
')"></td>
									<td class="delete"><input type="button" name="delete" Value="Delete" onclick="deleteGoods('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
','<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
')"></td>
								</tr>
							<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
								<input type="hidden" name="deleteId" value="">
								<input type="hidden" name="fixId" value="">
								<input type="hidden" name="fixedAmount" value="">
							</form>
					<form action="cart/purchase" method="POST" name="purchase">
						<input type="hidden" name="purchaseFlg" value="">
					</form>
				</table>
			</div>
			<ul>
				<li class="total">Total:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['total']->value, ENT_QUOTES, 'UTF-8', true);?>
Yen</li>
				<li class="buy"><input type="button" name="buy" value="buy" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['btn_disabled']->value, ENT_QUOTES, 'UTF-8', true);?>
 onclick="buy()"></li>
				<li class="continue"><input type="button" name="continue" value="Continue" onclick="location.href='goods'"></li>
			</ul>
		</center>
	</body>
</html>
<?php }
}
