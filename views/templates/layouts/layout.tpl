<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<title>ATLANTIC</title>
	<link href="{$path}/public/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<link href="{$path}/public/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900' rel='stylesheet' type='text/css'>
	<!-- start menu -->
	<link href="{$path}/public/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	
</head>

<body>
	{block name='header'}{include file='layouts/header.tpl'}{/block}
	
	{block name='content'}{/block}

	{block name='footer'}{include file='layouts/footer.tpl'}{/block}

	<!-- jQuery (necessary JavaScript plugins) -->
	<script type='text/javascript' src="{$path}/public/js/jquery-1.11.1.min.js"></script>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script type="text/javascript" src="{$path}/public/js/megamenu.js"></script>
	<script>
		$(document).ready(function(){
			$(".megamenu").megamenu();
		});
	</script>
	<script src="{$path}/public/js/menu_jquery.js"></script>
	<script src="{$path}/public/js/simpleCart.min.js"> </script>
	<script>
		$( document ).ready(function() {
		  $('#s').keyup(function(){
		   var valThis = $('#s').val().toLowerCase();
		    $('.countryList>li').each(function(){
		     var text = $(this).text().toLowerCase();
		        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();
		   });
		  });
		});
	</script>
	{block name='script'}{/block}

</body>
</html>