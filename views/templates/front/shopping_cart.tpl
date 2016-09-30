{extends file='layouts/layout.tpl'}

{block name='content'}

<div class="container">
	<div class="check">

	{if isset($ttgh)}
	<form method="POST">

		<div class="col-md-9 cart-items">
		 	
			 	<h1>GIỎ HÀNG CỦA BẠN</h1>

				<table class="table table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>MÃ SÁCH</td>
                            <td>TỰA SÁCH</td>
                            <td>ĐƠN GIÁ</td>
                            <td>SỐ LƯỢNG</td>
                            <td>THÀNH TIỀN</td>
                        </tr>
                    </thead>
                    <tbody>
                        {$i=1}
                        {foreach $ttgh as $msp=>$tt}
                            <tr>
                                <td>{$i}</td>
                                <td>{$msp}</td>
                                <td>{$tt.2}</td>
                                <td>{number_format($tt.0)} đ</td>
                                <td>
                                    <input type="number" class="form-control" value="{$tt.1}" style="text-align:center; width:70px" name="sl_{$msp}" />
                                </td>
                                <td>{number_format($tt.0*$tt.1)} đ</td>
                            </tr>
                            {$i=$i+1}
                        {/foreach}
                        <tr>
                            <td colspan="6" align="center">
                                <input type="submit" value="CẬP NHẬT" name="btnCapNhat" class="btn btn-default" />
                                <a href="{$path}/khach-hang/huy-gio-hang" class="btn btn-default">HỦY GIỎ HÀNG</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
			
		 </div>

		 <div class="col-md-3 cart-total">
			 <div class="price-details">
				 <h3>CHI TIẾT ĐƠN HÀNG</h3>
				 <span>Tổng tiền</span>
				 <span class="total1">{number_format($smarty.session.priceTotal)} đ</span>
				 <span>Giảm giá</span>
				 <span class="total1">---</span>
				 <span>Phí Vận Chuyển</span>
				 <span class="total1">
				 	{if $smarty.session.priceTotal < 100000}
				 		{number_format(10000)} đ
				 		{$phivanchuyen = 10000}
				 	{else}
				 		Miễn Phí
				 		{$phivanchuyen = 0}
				 	{/if}
				 </span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>Tổng tiền</h4></li>	
			   <li class="last_price"><span>{number_format($smarty.session.priceTotal + $phivanchuyen)} đ</span></li>
			   <div class="clearfix"> </div>
			 </ul>

			 <a class="order" href="{$path}/khach-hang/dat-hang">Tiến Hàng Đặt Hàng</a>
		</div>
		
			<div class="clearfix"> </div>

	</form>
	
	{else}
		<p align="center">CHƯA CÓ QUYỂN SÁCH NÀO TRONG GIỎ HÀNG CỦA BẠN.</p>
    {/if}
    </div>

</div>

{/block}