<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if (isset($_GET['deluser'])) {
    $id         = $_GET['deluser'];
    $deleteUser = $page->deleteUserById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>User List</h2>
        <div class="block">
            <?php
            if (isset($deleteUser)) {
                echo $deleteUser;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Details</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getUser = $page->getAllUser();
                if ($getUser) {
                    $i = 0;
                    while ($result = $getUser->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $fm->textShorten($result['details'], 30); ?></td>
                            <td>
                                <?php
                                if ($result['role'] == '0') {
                                    echo "Admin";
                                } elseif ($result['role'] == '1') {
                                    echo "Author";
                                } elseif ($result['role'] == '2') {
                                    echo "Editor";
                                }
                                ?>
                            </td>
                            <td>
                                <a href="viewuser.php?userid=<?php echo $result['id']; ?>">View</a>
                                <?php
                                if (Session::get('userrole') == '0') {
                                    ?>
                                    ||<a onclick="return confirm('Are you Sure to Delete !!')"
                                         href="?deluser=<?php echo $result['id']; ?>">Delete</a>
                                <?php } ?>
                            </td>
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
