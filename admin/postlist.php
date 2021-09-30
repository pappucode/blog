﻿<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<?php
if (isset($_GET['delpostid'])) {
    $id      = $_GET['delpostid'];
    $delPost = $post->delPostById($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">
            <?php
            if (isset($delPost)) {
                echo $delPost;
            }
            ?>
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th width="15%">Post Title</th>
                    <th width="20%">Description</th>
                    <th width="10%">Category</th>
                    <th width="10%">Image</th>
                    <th width="10%">Author</th>
                    <th width="10%">Tags</th>
                    <th width="10%">Date</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getPost = $post->getAllPostList();
                if ($getPost) {
                    $i = 0;
                    while ($result = $getPost->fetch_assoc()) {
                        $i++;
                        ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['title']; ?></td>
                            <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
                            <td><?php echo $result['name']; ?></td>
                            <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"/></td>
                            <td><?php echo $result['author']; ?></td>
                            <td><?php echo $result['tags']; ?></td>
                            <td><?php echo $fm->formatDate($result['date']); ?></td>
                            <td>
                                <a href="viewpost.php?viewpostid=<?php echo $result['id']; ?>">View</a>
                                <?php
                                if (Session::get('userId') == $result['userid'] || Session::get('userrole') == '0') { ?>
                                    ||<a href="editpost.php?editpostid=<?php echo $result['id']; ?>">Edit</a>||
                                    <a onclick="return confirm('Are you Sure to Delete !!')"
                                       href="?delpostid=<?php echo $result['id']; ?>">Delete</a>
                                <?php }
                                ?>

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
