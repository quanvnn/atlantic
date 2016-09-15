{extends file='layouts/layout.tpl'}

{block name='content'}

<!-- content -->
<div class="container">
<div class="main">
  <!-- start registration -->
  <div class="registration">
    
        <table class="table">   
            <tbody>
                <tr>
                    <td align="center">
                      CÔNG TY ATLANTIC
                    </td>
                    <td align="center" style="font-size:20px" valign="center">Đơn Hàng Của {$DonDatHang[0]['ten_khach_hang']}</td>
                </tr>
                <tr>
                    <td width="30%">Tên người nhận: {$DonDatHang[0]['ten_nguoi_nhan']}</td>
                    <td width="70%">Địa chỉ: {$DonDatHang[0]['dia_chi']}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="table table-striped">      
            <tbody>
              {$i=1}
              <tr align="center"><td>#</td><td>MÃ SÁCH</td><td>TỰA SÁCH</td><td>SỐ LƯỢNG</td><td>ĐƠN GIÁ</td><td>THÀNH TIỀN</td></tr>
              
              {foreach $DonDatHang as $item}

                  <tr align="center">
                      <td>{$i}</td>
                      <td>{$item['ma_san_pham']}</td>
                      <td>{$item['ten_san_pham']}</td>
                      <td>{$item['so_luong']}</td>
                      <td align="right">{number_format($item['don_gia'])} đ</td>
                      <td align="right">{number_format($item['don_gia']*$item['so_luong'])} đ</td>
                  </tr>
                  {$i=$i+1}

              {/foreach}
              
              <tr>
                  <td>Ngày:</td>
                  <td>{$DonDatHang[0]['ngay_hd']}</td>
                  <td colspan="3" align="right">TRỊ GIÁ HÓA ĐƠN</td>
                  <td align="right">{number_format($DonDatHang[0]['tri_gia'])} đ</td>
              </tr>
            </tbody>
        </table>

  </div>
  <div class="clearfix"></div>
</div>
</div>
{/block}