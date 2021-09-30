<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . "/../lib/Session.php");
Session::checkLogin();
include_once($filepath . "/../lib/Database.php");
include_once($filepath . "/../helpers/Format.php");
?>
<?php
/**
 * Created by PhpStorm.
 * User: Pappu
 * Date: 10-Jul-20
 * Time: 12:28 AM
 */

class Adminlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function adminLogin($username, $password)
    {
        $username = mysqli_real_escape_string($this->db->link, $this->fm->validation($username));
        $password = mysqli_real_escape_string($this->db->link, $this->fm->validation(md5($password)));

        if (empty($username) || empty($password)) {
            $msg = "Field Must Not be Empty";
            return $msg;
        } else {
            $query  = "select * from tbl_user where username='$username' and password='$password'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set("adminlogin", true);
                Session::set("userId", $value['id']);
                Session::set("username", $value['username']);
                Session::set("userrole", $value['role']);
                Session::set("name", $value['name']);
                header("Location:index.php");
            } else {
                $msg = "Username or Password Not match !!";
                return $msg;
            }
        }
    }



}