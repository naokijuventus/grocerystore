<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<link rel="stylesheet" href="css/goodsstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jquery.easing.def || document.write('<script src="../js/vendor/jquery-2.2.4.min.js><\/script>')</script>
		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script> 
		<link rek="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/redmond/jquery-ui.css">
		<!-- jQuery Easing Pluginの読み込み -->

<!--	読み込みが遅くなるのでファイルから直接持ってくる	
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->
		<script>window.jquery.easing.def || document.write('<script src="../js/vendor/jquery.easing.1.3.js"><\/script>')</script>
		<!-- jquery.vgrid.minの読み込み-->
		<script src="js/jquery.vgrid.min.js"></script>
		<script>
			$(function(){
				$("ul.subs").hide();
				$("li.menuList").click(function(){
					if($("+ul",this).css("display")=="none"){
						$("+ul",this).slideDown();
					}
					else{
						$("+ul",this).slideUp();
					}
				});
				$('.grid-items ul').vgrid({
					useLoadImageEvent:true
				});
			});
			
			function addCart(selectbtn,itemName){
				if(window.confirm(itemName + 'をカートに追加しますか？')){
					document.items.selectBtn.value = selectbtn;
					document.items.selectItem.value = itemName;
					items.submit();
				}
			}
			
			function destroySession(){
				if(window.confirm('ログアウトしますか？')){
					document.returnGoods.logOutFlg.value = '1';
					document.returnGoods.submit();
				}
			}
			
			function selectMenu(category,detail,detailName){
				document.menu.category.value = category;
				document.menu.detail.value = detail;
				document.menu.detailName.value = detailName;
				menu.submit();
			}
		</script>
		<title>Goods</title>
	</head>
	<body>
		<header id="header">
			<ul class="container">
				<li class="goods">Goods</li>
				<li class="LogIn">
					{$header nofilter}
				</li>
			</ul>
		</header>
		<div id="contents">
			<div class="container">
				<main id="main" role="main">
					<section>
						<h1>{$detail_name}</h1>
						<div class="grid-items">
							<form method="POST" action="cart" name="items">
								<ul>
									{section name=i loop=$items}
										<li><img src="{$items[i]}">
											<p class="goodsName">{$name[i]}</p>
											<p>{$note[i]}</p>
											<p>Price:{$price[i]}Yen <input type="button" name="{$name[i]}" value="add Cart" {$btn_disabled} onclick="addCart('{$id[i]}','{$name[i]}')"></p>
										</li>
									{/section}
								</ul>
								<input type="hidden" name="imgF" value="{$imgF}">
								<input type="hidden" name="selectBtn" value="">
								<input type="hidden" name="selectItem" value="">
							</form>
						</div>
					</section>
				</main>
				<aside id="side">
					<h2>Category</h2>
					<form action="goods" method="POST" name="menu">
						<ul class="menuList" role="menu">
							<li class="menuList" role="menuitem"><h3>Fair</h3></li>
							<ul class="subs"><li onclick=selectMenu('1','1','Clock')>Clock</li><li onclick=selectMenu('1','2','Bank')>Bank</li><li>Entrance</li><li>Gardening</li></ul>
							<li class="menuList" role="menuitem"><h3>Interior</h3></li>
							<ul class="subs"><li>Clock</li><li>Photo Frame</li><li>Art</li><li>Gardening</li></ul>
							<li class="menuList" role="menuitem"><h3>Kitchen</h3></li>
							<ul class="subs"><li>Dish</li><li>Cup</li></ul>
							<li class="menuList" role="menuitem"><h3>Bath</h3></li>
							<ul class="subs"><li>Towel</li><li>Aloma</li><li>Body Care</li></ul>
							<li class="menuList" role="menuitem"><h3>Fashion</h3></li>
							<ul class="subs"><li>Bag</li><li>Pouch</li><li>Umbrella</li></ul>
						</ul>
						<input type="hidden" name="category">
						<input type="hidden" name="detail">
						<input type="hidden" name="detailName">
					</form>
				</aside>
			</div>
		</div>
			<footer id="footer">Copyright © ARIA Company, All rights reserved.
		</footer>
		<form action="goods" method="POST" name="returnGoods">
			<input type="hidden" name="logOutFlg" value="">
		</form>
	</body>
</html>