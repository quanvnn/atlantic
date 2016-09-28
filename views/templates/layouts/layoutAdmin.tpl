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
    <link href="{$path}/public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{$path}/public/admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{$path}/public/admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{$path}/public/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{$path}/public/admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{$path}/public/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        {block name='navAdmin'}{include file='layouts/navAdmin.tpl'}{/block}

        {block name='content'}{/block}

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{$path}/public/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{$path}/public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{$path}/public/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{$path}/public/admin/dist/js/sb-admin-2.js"></script>

    <script>
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
    </script>

    {block name='script'}{/block}


</body>

</html>
