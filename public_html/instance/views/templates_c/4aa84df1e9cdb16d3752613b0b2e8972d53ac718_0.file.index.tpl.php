<?php
/* Smarty version 3.1.29, created on 2016-09-29 11:53:48
  from "C:\xampp\htdocs\public_html\instance\views\templates\goods\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57ece4ac077bc3_27078248',
  'file_dependency' => 
  array (
    '4aa84df1e9cdb16d3752613b0b2e8972d53ac718' => 
    array (
      0 => 'C:\\xampp\\htdocs\\public_html\\instance\\views\\templates\\goods\\index.tpl',
      1 => 1475142437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57ece4ac077bc3_27078248 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		<link rel="stylesheet" href="css/goodsstyle.css">
		<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>window.jquery.easing.def || document.write('<?php echo '<script'; ?>
 src="../js/vendor/jquery-2.2.4.min.js><\/script>')<?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"><?php echo '</script'; ?>
> 
		<link rek="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/redmond/jquery-ui.css">
		<!-- jQuery Easing Pluginの読み込み -->

<!--	読み込みが遅くなるのでファイルから直接持ってくる	
		<?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"><?php echo '</script'; ?>
> -->
		<?php echo '<script'; ?>
>window.jquery.easing.def || document.write('<?php echo '<script'; ?>
 src="../js/vendor/jquery.easing.1.3.js"><\/script>')<?php echo '</script'; ?>
>
		<!-- jquery.vgrid.minの読み込み-->
		<?php echo '<script'; ?>
 src="js/jquery.vgrid.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
>
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
		<?php echo '</script'; ?>
>
		<title>Goods</title>
	</head>
	<body>
		<header id="header">
			<ul class="container">
				<li class="goods">Goods</li>
				<li class="LogIn">
					<?php echo $_smarty_tpl->tpl_vars['header']->value;?>

				</li>
			</ul>
		</header>
		<div id="contents">
			<div class="container">
				<main id="main" role="main">
					<section>
						<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['detail_name']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
						<div class="grid-items">
							<form method="POST" action="cart" name="items">
								<ul>
									<?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['items']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
										<li><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['items']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
">
											<p class="goodsName"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</p>
											<p><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['note']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
</p>
											<p>Price:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['price']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
Yen <input type="button" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
" value="add Cart" <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['btn_disabled']->value, ENT_QUOTES, 'UTF-8', true);?>
 onclick="addCart('<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
','<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)], ENT_QUOTES, 'UTF-8', true);?>
')"></p>
										</li>
									<?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
								</ul>
								<input type="hidden" name="imgF" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['imgF']->value, ENT_QUOTES, 'UTF-8', true);?>
">
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
</html><?php }
}
