﻿<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if (!isset($_GET['userid']) || $_GET['userid'] == null) {
    echo "<script>window.location='userlist.php'</script>";
} else {
    $id = $_GET['userid'];
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['submit'])) {
    echo "<script>window.location='userlist.php'</script>";
}
?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>View User</h2>
            <div class="block">
                <?php
                $getUser = $page->getIndividualUser($id);
                if ($getUser) {
                    while ($result = $getUser->fetch_assoc()) {

                        ?>

                        <form enctype="multipart/form-data" action="" method="post">
                            <table class="form">

                                <tr>
                                    <td>
                                        <label>name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" value="<?php echo $result['name']; ?>"
                                               class="medium"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Username</label>
                                    </td>
                                    <td>
                                        <input type="text" name="username" value="<?php echo $result['username']; ?>"
                                               class="medium"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Email</label>
                                    </td>
                                    <td>
                                        <input type="text" name="email" value="<?php echo $result['email']; ?>"
                                               class="medium"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="vertical-align: top; padding-top: 9px;">
                                        <label>Details</label>
                                    </td>
                                    <td>
                                    <textarea class="tinymce" name="details">
                                        <?php echo $result['details']; ?>
                                    </textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="submit" Value="Ok"/>
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