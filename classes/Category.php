<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');
?>

<?php

class Category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function postByCat()
    {
        $query  = "select * from tbl_category";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllCat()
    {
        $query  = "select * from tbl_category order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertNewCat($name)
    {
        $name = mysqli_real_escape_string($this->db->link, $name);
        if (empty($name)) {
            $msg = "Field must Not be Empty!!";
            return $msg;
        } else {
            $query  = "insert into tbl_category(name) values ('$name')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "Category Inserted Successfully!!";
                return $msg;
            } else {
                $msg = "Category Not Inserted !!";
                return $msg;
            }
        }
    }

    public function getCatById($id)
    {
        $query  = "select * from tbl_category where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function catUpdate($name, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $name);
        $id   = mysqli_real_escape_string($this->db->link, $id);
        if (empty($name)) {
            $msg = "Field Must Not be Empty!!";
            return $msg;
        } else {
            $query  = "update tbl_category set name='$name' where id='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "Category name Updated Successfully!!";
                return $msg;
            } else {
                $msg = "Category Not Updated!!";
                return $msg;
            }
        }
    }

    public function deleteCatById($id)
    {
        $query  = "delete from tbl_category where id='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "Category name Deleted Successfully!!";
            return $msg;
        } else {
            $msg = "Category Not Deleted!!";
            return $msg;
        }
    }

}