<?php
//session_start();
class ShoppingCart
{
    public function add($id, $name, $price, $number)
    {        
        if (isset($_SESSION['giohang'])) {

            $carts = $_SESSION['giohang'];
            if (isset($carts[$id])) {
                //Kiem tra sp co msp nay ton tai trong gio hang hay chua?
                //neu da co trong gio hang roi thi cong them so luong vua submit vao
                $carts[$id] = array($price, $carts[$id][1]+$number, $name);
            }
            else
                //neu sp chua co trong gio hang thi them thong tin sp vao gio hang
                $carts[$id] = array($price, $number, $name);
            $_SESSION['giohang'] = $carts;    
        } else
            $_SESSION['giohang'] = array($id=>array($price, $number, $name));
    }
    public function getnumberTotal()
    {
        $numberTotal = 0;
        if (isset($_SESSION['giohang'])) {
            foreach($_SESSION['giohang'] as $idProduct => $product) {
                $numberTotal+=$product[1];
            }
        }
        $_SESSION['numberTotal'] = $numberTotal;
        return $numberTotal;
    }
    public function getpriceTotal()
    {
        $total = 0;
        if (isset($_SESSION['giohang'])) {
            foreach($_SESSION['giohang'] as $idProduct => $product) {
                $total+=$product[0]*$product[1];
            }
        }
        $_SESSION['priceTotal'] = $total;
        return $total;
    }
    public function getinfoCart()
    {
        //Session giohang duoc tao ra tu method Them
        if (isset($_SESSION['giohang']))
            return $_SESSION['giohang'];
        return false;
    }
    public function deleteProductInCart($id)
    {
        $carts = $this->getinfoCart();
        if ($carts) {
            $newcart = array();
            foreach($carts as $key => $sp) {
                if ($key != $id)
                    $newcart[$key] = $sp;
            }
            if ($newcart) {
                $_SESSION['giohang'] = $newcart;
                $this->getnumberTotal();
                $this->getpriceTotal(); 
            } else {
                unset($_SESSION['giohang']);
                unset($_SESSION['priceTotal']);
                unset($_SESSION['numberTotal']);
            }
        }
    }
    public function deleteCart()
    {
        unset($_SESSION['giohang']);
        unset($_SESSION['priceTotal']);
        unset($_SESSION['numberTotal']);
    }
    public function updateCart($id, $number)
    {
        if ($number == "0" || $number === 0) {
            $this->deleteProductInCart($id);
            return;
        }
        if (is_numeric($number) && $number > 0) {            
            $carts = $this->getinfoCart();
            if ($carts) {
                if (isset($carts[$id])) {
                    $product = $carts[$id];
                    $carts[$id] = array($product[0], $number, $product[2]);
                    $_SESSION['giohang'] = $carts;
                    $this->getpriceTotal();
                    $this->getnumberTotal();
                }
            }
        }
    }
}
?>
