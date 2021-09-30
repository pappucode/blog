<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if (!Session::get('userrole') == '0') {
    echo "<script>window.location='index.php'</script>";
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    $role     = $_POST['role'];

    $inserUser = $page->insertNewUser($username, $password, $email, $role);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New user</h2>
        <div class="block copyblock">
            <?php
            if (isset($inserUser)) {
                echo $inserUser;
            }
            ?>
            <form action="" method="POST">
                <table class="form">
                    <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter username..." class="medium"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="text" name="password" placeholder="Enter password..." class="medium"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Enter email..." class="medium"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Role</label>
                        </td>
                        <td>
                            <select id="select" name="role">
                                <option>Select User Role</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">Editor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Create"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
