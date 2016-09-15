<?php
//session_start();
class Gio_hang
{
    public function Them($id,$ten,$dg,$sl)
    {        
        if(isset($_SESSION['giohang']))
        {
            $giohang=$_SESSION['giohang'];
            if(isset($giohang[$id]))
                //Kiem tra sp co msp nay ton tai trong gio hang hay chua?
                //neu da co trong gio hang roi thi cong them so luong vua submit vao
                $giohang[$id]=array($dg,$giohang[$id][1]+$sl,$ten);
            else
                //neu sp chua co trong gio hang thi them thong tin sp vao gio hang
                $giohang[$id]=array($dg,$sl,$ten);
            $_SESSION['giohang']=$giohang;    
        }
        else
            $_SESSION['giohang']=array($id=>array($dg,$sl,$ten));
    }
    public function TongSoLuong()
    {
        $tsl=0;
        if(isset($_SESSION['giohang']))
        {
            foreach($_SESSION['giohang'] as $id=>$sp)
            {
                $tsl+=$sp[1];
            }
        }
        $_SESSION['TongSoLuong']=$tsl;
        return $tsl;
    }
    public function TongSoTien()
    {
        $tt=0;
        if(isset($_SESSION['giohang']))
        {
            foreach($_SESSION['giohang'] as $id=>$sp)
            {
                $tt+=$sp[0]*$sp[1];
            }
        }
        $_SESSION['TongSoTien']=$tt;
        return $tt;
    }
    public function ThongTinGioHang()
    {
        //Session giohang duoc tao ra tu method Them
        if(isset($_SESSION['giohang']))
            return $_SESSION['giohang'];
        return false;
    }
    public function XoaMatHang($id)
    {
        $tt_gio_hang=$this->ThongTinGioHang();
        if($tt_gio_hang)
        {
            $giohang_moi=array();
            foreach($tt_gio_hang as $key=>$sp)
            {
                if($key!=$id)
                    $giohang_moi[$key]=$sp;
            }
            if($giohang_moi)
            {
                $_SESSION['giohang']=$giohang_moi;
                $this->TongSoLuong();
                $this->TongSoTien(); 
            }  
            else
            {
                unset($_SESSION['giohang']);
                unset($_SESSION['TongSoTien']);
                unset($_SESSION['TongSoLuong']);
            }
        }
    }
    public function HuyGioHang()
    {
        unset($_SESSION['giohang']);
        unset($_SESSION['TongSoTien']);
        unset($_SESSION['TongSoLuong']);
    }
    public function CapNhatGioHang($id,$sl)
    {
        if($sl=="0" || $sl===0)
        {
            $this->XoaMatHang($id);
            return;
        }
        if(is_numeric($sl) && $sl > 0)
        {            
            $tt_gio_hang=$this->ThongTinGioHang();
            if($tt_gio_hang)
            {
                if(isset($tt_gio_hang[$id]))
                {
                    $sp=$tt_gio_hang[$id];
                    $tt_gio_hang[$id]=array($sp[0],$sl,$sp[2]);
                    $_SESSION['giohang']=$tt_gio_hang;
                    $this->TongSoLuong();
                    $this->TongSoTien();
                }
            }
        }
    }
}
?>
