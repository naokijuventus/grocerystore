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
						<td class="userInfo">{$name}</td>
						<td><input type="button" name="userName" value="編集"></td>
					</tr>
					<tr>
						<td>フリガナ</td>
						<td class="userInfo">{$phonetic}</td>
						<td><input type="button" name="userName" value="編集"></td>
					</tr>
					<tr>
						<td>電話番号</td>
						<td class="userInfo">{$phone}</td>
						<td><input type="button" name="phone" value="編集"></td>
					</tr>
					<tr>
						<td>MAIL</td>
						<td class="userInfo">{$mail}</td>
						<td><input type="button" name="phone" value="編集"></td>
					</tr>
					<tr>
						<td>住所</td>
						<td class="userInfo"><div>郵便番号：{$postal_code}</div>{$address}</td>
						<td><input type="button" name="address" value="編集"></td>
					</tr>
					<tr>
						<td>生年月日</td>
						<td class="userInfo">{$birth}</td>
						<td><input type="button" name="birth" value="編集"></td>
					</tr>
					<tr>
						<td>支払い方法</td>
						<td class="userInfo">{$payment}</td>
						<td><input type="button" name="payment" value="編集"></td>
					</tr>
				</table>
				<h2 id="history">購入履歴（最新10件）</h2>
				<div id="purchaseHistory">
					<table>
						<tr>
							<th>購入番号</th><th>購入日</th><th>購入商品明細</th><th>金額</th>
						</tr>
						{$nodata nofilter}
						{section name=i loop=$order_no}
						<tr>
							<td>{$order_no[i]}</td>
							<td>{$purchase_date[i]}</td>
							<td>{$goods[i] nofilter}</td>
							<td>{$price[i]}</td>
						</tr>
						{/section}
					</table>
				</div>
				<div id="btn_return"><input type="button" name="continue" value="戻&nbsp;る" onclick="location.href='goods'"></div>
			</div>
		</center>
	</body>
</html>