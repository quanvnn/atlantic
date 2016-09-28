<?php
/* Smarty version 3.1.29, created on 2016-08-08 17:03:28
  from "F:\wamp\www\atlantic\views\templates\layouts\layoutAdmin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a89f40224846_74319927',
  'file_dependency' => 
  array (
    '2fea39715bae8d2001c5e974b902077a3495aa42' => 
    array (
      0 => 'F:\\wamp\\www\\atlantic\\views\\templates\\layouts\\layoutAdmin.tpl',
      1 => 1470668574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layouts/navAdmin.tpl' => 1,
  ),
),false)) {
function content_57a89f40224846_74319927 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ATLANTIC-ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'navAdmin', array (
  0 => 'block_2039157a89f401fbc88_43107329',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


        <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content', array (
  0 => 'block_3182857a89f40208e31_17839852',
  1 => false,
  3 => 0,
  2 => 0,
));
?>


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/bower_components/metisMenu/dist/metisMenu.min.js"><?php echo '</script'; ?>
>

    <!-- Custom Theme JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/public/admin/dist/js/sb-admin-2.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
        $(document).ready(function(){
            $("#ten_san_pham").blur(function(){
                var tensp=$("#ten_san_pham").val();
                if(tensp!="")
                  $("#ten_san_pham_url").val(bodau(tensp));
            });
        });
        
         function formatCurrency(num) 
        {
           num = num.toString().replace(/\$|\,/g,'');
           if(isNaN(num))
           num = "0";
           sign = (num == (num = Math.abs(num)));
           num = Math.floor(num*100+0.50000000001);
           num = Math.floor(num/100).toString();
           for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
           num = num.substring(0,num.length-(4*i+3))+','+
           num.substring(num.length-(4*i+3));
           return (((sign)?'':'-') + num);
        }
        function bodau(str){
          str= str.toLowerCase();
          str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
          str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
          str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
          str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
          str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
          str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
          str= str.replace(/đ/g,"d");
          str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
          str= str.replace(/-+-/g,"-");
          str= str.replace(/^\-+|\-+$/g,"");
          return str;
        }
    <?php echo '</script'; ?>
>

    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'script', array (
  0 => 'block_1433357a89f4021bc68_43571278',
  1 => false,
  3 => 0,
  2 => 0,
));
?>



</body>

</html>
<?php }
/* {block 'navAdmin'}  file:layouts/layoutAdmin.tpl */
function block_2039157a89f401fbc88_43107329($_smarty_tpl, $_blockParentStack) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:layouts/navAdmin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
/* {/block 'navAdmin'} */
/* {block 'content'}  file:layouts/layoutAdmin.tpl */
function block_3182857a89f40208e31_17839852($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content'} */
/* {block 'script'}  file:layouts/layoutAdmin.tpl */
function block_1433357a89f4021bc68_43571278($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'script'} */
}
