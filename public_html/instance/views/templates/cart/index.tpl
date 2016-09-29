<!DOCTYPE html>
<html lang="ja">
	<head>
		<link rel="stylesheet" href="../css/cartstyle.css">
		<meta charset="utf-8">
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<title>Cart</title>
		<script>
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
		</script>
	</head>
	<body>
		<center>
			<div id="header">CART</div>
			<div>
				<p class="msg">{$msg}</p>
				<p class="errmsg">{$err_msg}</p>
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
							{$nodata nofilter}
							{section name=i loop=$img_path}
								<tr>
									<td class="image"><img src="{$img_path[i]}"></td>
									<td class="name">{$name[i]}</td>
									<td class="unitPrice">{$price[i]}</td>
									<td class="amount">{$amount[i]}</td>
									<td class="sum">{$sum[i]}</td>
									<td class="fix"><input type="button" name="fix" value="Fix" onclick="fixAmount('{$id[i]}','{$name[i]}','{$amount[i]}')"></td>
									<td class="delete"><input type="button" name="delete" Value="Delete" onclick="deleteGoods('{$id[i]}','{$name[i]}')"></td>
								</tr>
							{/section}
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
				<li class="total">Total:{$total}Yen</li>
				<li class="buy"><input type="button" name="buy" value="buy" {$btn_disabled} onclick="buy()"></li>
				<li class="continue"><input type="button" name="continue" value="Continue" onclick="location.href='goods'"></li>
			</ul>
		</center>
	</body>
</html>
