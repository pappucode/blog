<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == null) {
    echo "<script>window.location='inbox.php'</script>";
} else {
    $id = $_GET['msgid'];
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['submit'])) {
    echo "<script>window.location='inbox.php'</script>";
}
?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>View Message</h2>
            <div class="block">

                <form action="" method="POST">
                    <?php
                    $getMeg = $page->getMsgById($id);
                    if ($getMeg) {
                        while ($result = $getMeg->fetch_assoc()) {
                            ?>
                            <table class="form">

                                <tr>
                                    <td>
                                        <label>Name</label>
                                    </td>
                                    <td>
                                        <input type="text"
                                               value="<?php echo $result['firstname'] . ' ' . $result['lastname']; ?>"
                                               class="medium" readonly/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Email</label>
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo $result['email']; ?>" class="medium"
                                               readonly/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Date</label>
                                    </td>
                                    <td>
                                        <input type="text" value="<?php echo $fm->formatDate($result['email']); ?>"
                                               class="medium" readonly/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Message</label>
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
                                        <input type="submit" name="submit" Value="OK"/>
                                    </td>
                                </tr>
                            </table>
                            <?php

                        }
                    }
                    ?>
                </form>
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