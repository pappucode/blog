<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<?php
if (!isset($_GET['editpostid']) || $_GET['editpostid'] == null) {
    echo "<script>window.location='postlist.php'</script>";
} else {
    $postid = $_GET['editpostid'];
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['submit'])) {
    $updatePost = $post->postUpdate($_POST, $_FILES, $postid);
}
?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Post</h2>
            <div class="block">
                <?php
                if (isset($updatePost)) {
                    echo $updatePost;
                }
                ?>
                <?php
                $getpost = $post->getTotalPostById($postid);

                if ($getpost) {
                    while ($postresult = $getpost->fetch_assoc()) {

                        ?>

                        <form enctype="multipart/form-data" action="" method="post">
                            <table class="form">

                                <tr>
                                    <td>
                                        <label>Title</label>
                                    </td>
                                    <td>
                                        <input type="text" name="title" value="<?php echo $postresult['title']; ?>"
                                               class="medium"/>
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <label>Category</label>
                                    </td>
                                    <td>
                                        <select id="select" name="cat">
                                            <option>Select Category</option>
                                            <?php
                                            $getCat = $cat->getAllCat();
                                            if ($getCat) {
                                                while ($result = $getCat->fetch_assoc()) {
                                                    ?>
                                                    <option
                                                        <?php
                                                        if ($postresult['cat'] == $result['id']) { ?>
                                                            selected="selected"
                                                        <?php }
                                                        ?>
                                                            value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Upload Image</label>
                                    </td>
                                    <td>
                                        <img src="<?php echo $postresult['image']; ?>" width="200px"
                                             height="80px"/><br/>
                                        <input type="file" name="image"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                        <label>Content</label>
                                    </td>
                                    <td>
                                    <textarea class="tinymce" name="body">
                                        <?php echo $postresult['body']; ?>
                                    </textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Tags</label>
                                    </td>
                                    <td>
                                        <input type="text" name="tags" value="<?php echo $postresult['tags']; ?>"
                                               class="medium"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Author</label>
                                    </td>
                                    <td>
                                        <input type="text" name="author" value="<?php echo $postresult['author']; ?>"
                                               class="medium"/>
                                        <input type="hidden" name="userid" value="<?php echo Session::get('userId'); ?>"
                                               class="medium"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="Save"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!--Load TinyMCE-->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
    <!--Load TinyMCE-->
<?php include "inc/footer.php"; ?>