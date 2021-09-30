<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');
include_once($filepath . '/../helpers/Format.php');
?>
<?php

class Post
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllPost($start_form, $per_page)
    {
        $query  = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT $start_form, $per_page";
        $result = $this->db->select($query);
        return $result;
    }

    public function getPostForPagination()
    {
        $query  = "SELECT COUNT(*) as number FROM tbl_post";
        $result = $this->db->select($query);
        return $result;
    }

    public function getPost($id)
    {
        $query  = "SELECT * FROM tbl_post WHERE id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function postByCatPage($id)
    {
        $query  = "select * from tbl_post where cat='$id' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function search($search)
    {
        $query  = "select * from tbl_post where title like '%$search%' or body like '%$search%'";
        $result = $this->db->select($query);
        return $result;
    }

    public function postInsert($data, $file)
    {
        $title  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['title']));
        $cat    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cat']));
        $body   = mysqli_real_escape_string($this->db->link, $data['body']);
        $tags   = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['tags']));
        $author = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['author']));
        $userid = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['userid']));

        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "Upload/" . $unique_image;

        if ($title == '' || $cat == '' || $body == '' || $tags == '' || $author == '' || $file_name == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;

        } elseif ($file_size > 1048567) {
            $msg = "Image size should be less than 1 MB!!";
            return $msg;
            //in_array(search,array) it searches an array for a specific value
        } elseif (in_array($file_ext, $permitted) === false) {
            $msg = "you can upload only:-" . implode(', ', $permitted);
            return $msg;

        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query  = "INSERT INTO tbl_post(cat,title,body,image,author,tags,userid) VALUES('$cat','$title','$body','$uploaded_image','$author','$tags','$userid')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "Post Inserted Successfully !!";
                return $msg;
            } else {
                $msg = "Post Not Inserted !!";
                return $msg;
            }
        }
    }

    public function getAllPostList()
    {
        $query  = "SELECT p.*,c.name FROM tbl_post AS p,tbl_category AS c 
                WHERE p.cat = c.id ORDER BY p.id DESC ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTotalPostById($postid)
    {
        $query  = "SELECT * FROM tbl_post WHERE id = '$postid'";
        $result = $this->db->select($query);
        return $result;
    }

    public function postUpdate($data, $file, $postid)
    {
        $title  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['title']));
        $cat    = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['cat']));
        $body   = mysqli_real_escape_string($this->db->link, $data['body']);
        $tags   = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['tags']));
        $author = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['author']));
        $userid = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['userid']));

        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $unique_image   = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "Upload/" . $unique_image;

        if ($title == '' || $cat == '' || $body == '' || $tags == '' || $author == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;

        } else {
            if (!empty($file_name)) {
                if ($file_size > 1048567) {
                    $msg = "Image size should be less than 1 MB!!";
                    return $msg;
                    //in_array(search,array) it searches an array for a specific value
                } elseif (in_array($file_ext, $permitted) === false) {
                    $msg = "you can upload only:-" . implode(', ', $permitted);
                    return $msg;

                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query  = "update tbl_post set 
                             cat='$cat',
                             title='$title',
                             body='$body',
                             image='$uploaded_image',
                             author='$author',
                             tags='$tags',
                             userid='$userid' where id='$postid'";
                    $result = $this->db->update($query);
                    if ($result) {
                        $msg = "Post Updated Successfully !!";
                        return $msg;
                    } else {
                        $msg = "Post Not Updated !!";
                        return $msg;
                    }
                }
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $query  = "update tbl_post set 
                             cat='$cat',
                             title='$title',
                             body='$body',
                             author='$author',
                             tags='$tags',
                             userid='$userid'where id='$postid'";
                $result = $this->db->update($query);
                if ($result) {
                    //echo "<script>window.location='postlist.php'</script>";
                    $msg = "Post Updated Successfully !!";
                    return $msg;
                } else {
                    $msg = "Post Not Updated !!";
                    return $msg;
                }
            }
        }
    }

    public function delPostById($id)
    {
        $query  = "SELECT * FROM tbl_post WHERE id = '$id'";
        $result = $this->db->select($query);
        if ($result) {
            while ($delimg = $result->fetch_assoc()) {
                $delLink = $delimg['image'];
                unlink($delLink);
            }
        }

        $query  = "delete from tbl_post where id='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "Post Deleted Successfully !!";
            return $msg;
        } else {
            $msg = "Post Not Deleted !!";
            return $msg;
        }

    }

    public function getAllLogoTitla()
    {
        $query  = "SELECT * FROM title_slogan WHERE id = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function logoTitleUpdate($data, $file)
    {
        $title  = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['title']));
        $slogan = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['slogan']));

        $permitted = array('png');
        $file_name = $file['logo']['name'];
        $file_size = $file['logo']['size'];
        $file_temp = $file['logo']['tmp_name'];

        $div            = explode('.', $file_name);
        $file_ext       = strtolower(end($div));
        $same_image     = 'logo' . '.' . $file_ext;
        $uploaded_image = "Upload/" . $same_image;

        if ($title == '' || $slogan == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;

        } else {
            if (!empty($file_name)) {
                if ($file_size > 1048567) {
                    $msg = "Image size should be less than 1 MB!!";
                    return $msg;
                    //in_array(search,array) it searches an array for a specific value
                } elseif (in_array($file_ext, $permitted) === false) {
                    $msg = "you can upload only:-" . implode(', ', $permitted);
                    return $msg;

                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query  = "update title_slogan set                           
                             title='$title',
                             slogan='$slogan',
                             logo='$uploaded_image'
                              where id='1'";
                    $result = $this->db->update($query);
                    if ($result) {
                        $msg = "Data Updated Successfully !!";
                        return $msg;
                    } else {
                        $msg = "Data Not Updated !!";
                        return $msg;
                    }
                }
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $query  = "update title_slogan set                           
                             title='$title',
                             slogan='$slogan'                       
                              where id='1'";
                $result = $this->db->update($query);
                if ($result) {
                    $msg = "Data Updated Successfully !!";
                    return $msg;
                } else {
                    $msg = "Data Not Updated !!";
                    return $msg;
                }
            }
        }
    }

    public function getAllSocialMedia()
    {
        $query  = "SELECT * FROM tbl_social WHERE id = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function socialUpdate($data)
    {
        $fb = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['fb']));
        $tw = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['tw']));
        $ln = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['ln']));
        $gp = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['gp']));

        if ($fb == '' || $tw == '' || $ln == '' || $gp == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;
        } else {
            $query  = "update tbl_social set                           
                             fb='$fb',
                             tw='$tw',
                             ln='$ln', 
                             gp='$gp'                      
                            where id='1'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "Data Updated Successfully !!";
                return $msg;
            } else {
                $msg = "Data Not Updated !!";
                return $msg;
            }
        }
    }

    public function getCopyRight()
    {
        $query  = "SELECT * FROM tbl_footer WHERE id = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function copyRightUpdate($data)
    {
        $note = mysqli_real_escape_string($this->db->link, $this->fm->validation($data['note']));

        if ($note == '') {
            $msg = "Fields Must Not be Empty!!";
            return $msg;
        } else {
            $query  = "update tbl_footer set                           
                             note='$note'                                                
                            where id='1'";
            $result = $this->db->update($query);
            if ($result) {
                $msg = "Data Updated Successfully !!";
                return $msg;
            } else {
                $msg = "Data Not Updated !!";
                return $msg;
            }
        }
    }

}