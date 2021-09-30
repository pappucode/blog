<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');
?>
<?php

class Page
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function pageInsert($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
        $body = mysqli_real_escape_string($this->db->link, $data['body']);


        if ($name == '' || $body == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;

        } else {
            $query  = "INSERT INTO tbl_page(name,body) VALUES('$name','$body')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "Page Created Successfully !!";
                return $msg;
            } else {
                $msg = "Page Not Created !!";
                return $msg;
            }
        }
    }

    public function dynamicMenu()
    {
        $query  = "select * from tbl_page";
        $result = $this->db->select($query);
        return $result;
    }

    public function GetPageById($id)
    {
        $query  = "select * from tbl_page where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function pageUpdate($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
        $body = mysqli_real_escape_string($this->db->link, $data['body']);


        if ($name == '' || $body == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;

        } else {
            $query  = "update tbl_page set
                      name='$name',
                      body='$body' where id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "Page Updated Successfully !!";
                return $msg;
            } else {
                $msg = "Page Not Updated !!";
                return $msg;
            }
        }
    }

    public function delPageById($Delid)
    {
        $query  = "delete from tbl_page where id='$Delid'";
        $result = $this->db->delete($query);
        return $result;
    }

    public function addContact($data)
    {
        $firstname = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['firstname']));
        $lastname  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['lastname']));
        $email     = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
        $body      = mysqli_real_escape_string($this->db->link, $data['body']);

        if (empty($firstname)) {
            $error = "First Name Must Not be Empty";
            return $error;
        } elseif (empty($lastname)) {
            $error = "Last Name Must Not be Empty";
            return $error;
        } elseif (empty($email)) {
            $error = "Email Field Must Not be Empty";
            return $error;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid Email Address";
            return $error;
        } elseif (empty($body)) {
            $error = "Message Field Must Not be Empty";
            return $error;
        } else {
            $query  = "insert into tbl_contact(firstname,lastname,email,body) values ('$firstname','$lastname','$email','$body')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "Data Inserted Successfully !!";
                return $msg;
            } else {
                $msg = "Data Not Inserted !!";
                return $msg;
            }
        }
    }

    public function GetAllMessage()
    {
        $query  = "select * from tbl_contact where status='0' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getMsgById($id)
    {
        $query  = "select * from tbl_contact where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateMsgStatus($id)
    {
        $query  = "update tbl_contact set status='1' where id='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "Message Move to seen box Successfully !!";
            return $msg;
        } else {
            $msg = "Message Not Move !!";
            return $msg;
        }
    }

    public function GetAllSeenMessage()
    {
        $query  = "select * from tbl_contact where status='1' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteMessage($id)
    {
        $query  = "delete from tbl_contact where id='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "Message deleted Successfully !!";
            return $msg;
        } else {
            $msg = "Message Not deleted !!";
            return $msg;
        }
    }

    public function insertNewUser($username, $password, $email, $role)
    {
        $username = mysqli_real_escape_string($this->db->link, $this->fm->validation($username));
        $password = mysqli_real_escape_string($this->db->link, $this->fm->validation(md5($password)));
        $email    = mysqli_real_escape_string($this->db->link, $this->fm->validation($email));
        $role     = mysqli_real_escape_string($this->db->link, $this->fm->validation($role));

        if (empty($username) || empty($password) || empty($email) || empty($role)) {
            $msg = "Field must Not be Empty!!";
            return $msg;
        } else {
            $mailquery = "select * from tbl_user where email='$email' limit 1";
            $mailCheck = $this->db->select($mailquery);
            if ($mailCheck != false) {
                $msg = "Email Already Exist !!";
                return $msg;
            } else {
                $query  = "insert into tbl_user(username,password,email,role) values ('$username','$password','$email','$role')";
                $result = $this->db->insert($query);
                if ($result) {
                    $msg = "New User Created Successfully!!";
                    return $msg;
                } else {
                    $msg = "New User Not Created!!";
                    return $msg;
                }
            }
        }
    }

    public function getUserId($userid, $userrole)
    {
        $query   = "select * from tbl_user where id='$userid' and role='$userrole'";
        $getUser = $this->db->select($query);
        return $getUser;
    }

    public function userUpdate($data, $userid)
    {
        $name     = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['name']));
        $username = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['username']));
        $email    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['email']));
        $details  = mysqli_real_escape_string($this->db->link, $data['details']);


        if ($name == '' || $username == '' || $email == '' || $details == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;

        } else {
            $query  = "update tbl_user set
                      name='$name',
                      username='$username',
                      email='$email',
                      details='$details' where id = '$userid'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "User Profile Updated Successfully !!";
                return $msg;
            } else {
                $msg = "User Profile Not Updated !!";
                return $msg;
            }
        }
    }

    public function getAllUser()
    {
        $query  = "select * from tbl_user order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteUserById($id)
    {
        $query  = "delete from tbl_user where id='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "User deleted Successfully !!";
            return $msg;
        } else {
            $msg = "User Not deleted !!";
            return $msg;
        }
    }

    public function getIndividualUser($id)
    {
        $query  = "select * from tbl_user where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

}