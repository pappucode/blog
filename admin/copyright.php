<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['submit'])) {
    $updateCopyRight = $post->copyRightUpdate($_POST);
}
?>
    <div class="grid_10">

        <div class="box round first grid">
            <h2>Update Copyright Text</h2>
            <?php
            if (isset($updateCopyRight)) {
                echo $updateCopyRight;
            }
            ?>
            <div class="block copyblock">
                <?php
                $copyRight = $post->getCopyRight();
                if ($copyRight) {
                    while ($result = $copyRight->fetch_assoc()) {
                        ?>
                        <form action="" method="post">
                            <table class="form">
                                <tr>
                                    <td>
                                        <input type="text" value="<?php echo $result['note']; ?>" name="note"
                                               class="large"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="submit" name="submit" Value="Update"/>
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
<?php include "inc/footer.php"; ?>