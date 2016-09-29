{extends file='layouts/layout.tpl'}

{block name='content'}

<!-- content -->
<div class="container">
<div class="main">
<div class="contact">
  <div class="contact-form">
	  	 	<h2>Gửi yêu cầu</h2>
	  	 	{if isset($message)}{$message}{/if}
	 	    <form method="post">
		    	<div>
			    	<span><label>Địa chỉ email của bạn <span style="color:red">* {if isset($dataErr['email'])}{$dataErr['email']}{/if}</span></label></span>
			    	<span><input name="email" type="text" class="textbox" required value="{if isset($data['email'])}{$data['email']}{/if}"></span>
			    </div>
			    <div>
			    	<span><label>Tiêu đề <span style="color:red">* {if isset($dataErr['tieu_de'])}{$dataErr['tieu_de']}{/if}</span></label></span>
			    	<span><input name="tieu_de" type="text" class="textbox" required value="{if isset($data['tieu_de'])}{$data['tieu_de']|stripslashes}{/if}"></span>
			    </div>
			    <div>
			     	<span><label>Nội dung <span style="color:red">* {if isset($dataErr['noi_dung'])}{$dataErr['noi_dung']}{/if}</span></label></span>
			     	<span><textarea name="noi_dung" required>{if isset($data['noi_dung'])}{$data['noi_dung']|stripslashes}{/if}</textarea></span>
			    </div>
			    <div>
			    	<span><input name="hide" type="hidden" class="textbox"></span>
			    </div>
			   <div>
			   		<span><input type="submit" class="" value="Gửi"></span>
			  </div>
	    </form>
    </div>
	<div class="clearfix"></div>		
</div>
</div>
</div>

{/block}