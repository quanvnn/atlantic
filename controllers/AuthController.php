<?php

include_once('controllers/SmartyController.php');
include_once('models/AdminModel.php');

class AuthController
{   
    private $adminModel;

    /**
     * Get admin model
     * 
     * @return class
     */
    private function AdminModel()
    {
        return $this->adminModel = new AdminModel();
    }



    /**
     * Function redirect to $url
     * 
     * @param  string $url, example $url = 'admin.html'
     * @return void
     */
    public function redirect($url)
    {
        header('location:'.path.'/'.$url); 
        exit();
    }

    /**
     * Function redirect to admin page
     * 
     * @return response
     */
    public function redirectToManageSystemPage()
    {
        return $this->redirect('quan-tri.html');
    }

    /**
     * Function redirect to login page
     * 
     * @return response
     */
    public function redirectToLoginAdminPage()
    {
        return $this->redirect('quan-tri/dang-nhap.html');
    }

    


    /**
     * Sign up admin account
     *
     * If have cookie, check info cookie with database then create session admin
     * Else, admin must login, hadle form login
     *
     * @return void
     */
    public function loginAdmin()
    {
        $smarty = new SmartyController();

        $COOKIE_NAME = "admin";

        $COOKIE_TIME = (3600 * 24 * 7);

        // Check cookie
        if (isset($_COOKIE[$COOKIE_NAME])) {

            parse_str($_COOKIE[$COOKIE_NAME]);

            $admin = $this->AdminModel()->getInfoAdmin($username, $password);

            if ($admin) {
                
                $infoAdmin = [
                                'ten_nguoi_dung' => $admin['ho_ten'],
                                'tendn'          => $admin['ten_dang_nhap']
                            ];
                
                $_SESSION['admin'] = $infoAdmin;

                $this->redirectToManageSystemPage();
            }
        }

        // Submit form login
        if (isset($_POST['btnDangNhapAdmin'])) {
            
            $username = addslashes($_POST['ten_dang_nhap']);

            $pass = addslashes($_POST['mat_khau']);

            $admin = $this->AdminModel()->getInfoAdmin($username, md5($pass));

            if ($admin) {
                
                $infoAdmin = array(
                    'ten_nguoi_dung' => $admin['ho_ten'],
                    'tendn'          => $admin['ten_dang_nhap']
                    );
                
                $_SESSION['admin'] = $infoAdmin;

                // Check box remember to set cookie
                
                if (isset($_POST['remember'])) {
                    
                    $COOKIE_VALUE = "username=".$admin['ten_dang_nhap']."&password=".$admin['mat_khau'];
                    
                    setcookie($COOKIE_NAME, $COOKIE_VALUE, time() + $COOKIE_TIME);
                }

                $this->redirectToManageSystemPage();
            }
            else {
                
                $smarty->assign('err','Vui lòng kiểm tra lại tên đăng nhập và mật khẩu.');
            }
        }

        $smarty->display('admin/login.tpl');
    }

    /**
     * Sign out admin account
     *
     * Destroy session and delete cookie admin
     *
     * @return void
     */
    public function logoutAdmin() {
        
        session_destroy();
        
        unset($_SESSION['admin']);

        if (isset($_COOKIE['admin'])) {
        
            setcookie("admin", "", time() - 3600);

        }

        $this->redirectToLoginAdminPage();
    }


}