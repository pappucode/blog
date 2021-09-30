<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if (isset($_GET['delid'])) {
    $id        = $_GET['delid'];
    $deleteCat = $cat->deleteCatById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <?php
            if (isset($deleteCat)) {
                echo $deleteCat;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getCat = $cat->getAllCat();
                if ($getCat) {
                    $i = 0;
                    while ($result = $getCat->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><a href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> ||
                                <a onclick="return confirm('Are you Sure to Delete !!')"
                                   href="?delid=<?php echo $result['id']; ?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include "inc/footer.php"; ?>
