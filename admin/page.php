<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if (!isset($_GET['pageid']) || $_GET['pageid'] == null) {
    echo "<script>window.location='index.php'</script>";
} else {
    $id = $_GET['pageid'];
}
?>
    <style>
        .delPage {
            margin-left: 10px;
        }

        .delPage a {
            background: #f0f0f0 none repeat scroll 0 0;
            border: 1px solid #ddd;
            color: #444;
            cursor: pointer;
            font-size: 20px;
            font-weight: normal;
            padding: 4px 10px;
        }
    </style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['submit'])) {
    $updatePage = $page->pageUpdate($_POST, $id);
}
?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>Edit Page</h2>
            <div class="block">
                <?php
                if (isset($updatePage)) {
                    echo $updatePage;
                }
                ?>
                <?php
                $getPage = $page->GetPageById($id);
                if ($getPage) {
                    while ($result = $getPage->fetch_assoc()) {
                        ?>
                        <form action="" method="POST">
                            <table class="form">

                                <tr>
                                    <td>
                                        <label>Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo $result['name']; ?>"
                                               class="medium"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                        <label>Body</label>
                                    </td>
                                    <td>
                                        <textarea class="tinymce" name="body">
                                            <?php echo $result['body']; ?>
                                        </textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="Update"/>
                                        <span class="delPage"><a onclick="return confirm('Are you Sure to Delete !!')"
                                                    href="deletepage.php?pagedel=<?php echo $result['id']; ?>">Delete</a></span>
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