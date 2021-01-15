<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

class Admin{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAdminData($_data){
        $email = $this->fm->validation($_data['email']);
        $password = $this->fm->validation($_data['password']);

        $email  = mysqli_real_escape_string($this->db->link, $email);
        $password = mysqli_real_escape_string($this->db->link, md5($password));

        $query = "select * from tbl_admin where email='$email' and password='$password'";
        $result = $this->db->select($query);
            if($result != false){
            $value = $result->fetch_assoc();
                Session::init();
                Session::set("adminLogin", true);
                Session::set("username", $value['username']);
                Session::set("adminId", $value['adminId']);
                header("Location:index.php");
        }else{
                $smg = "<span class='error'>Email or Password Not Matched!</span>";
                return $smg;
            }
    }
}
?>
