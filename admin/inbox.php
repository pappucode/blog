<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
if (isset($_GET['seenid'])) {
    $id              = $_GET['seenid'];
    $updateMsgStatus = $page->updateMsgStatus($id);
}
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Inbox</h2>
            <?php
            if (isset($updateMsgStatus)) {
                echo $updateMsgStatus;
            }
            ?>
            <div class="block">
                <table class="data display datatable" id="example">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $getMessage = $page->GetAllMessage();
                    if ($getMessage) {
                        $i = 0;
                        while ($result = $getMessage->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $fm->textShorten($result['body'], 30); ?></td>
                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                <td>
                                    <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
                                    <a href="replymsg.php?msgid=<?php echo $result['id']; ?>">Reply</a> ||
                                    <a onclick="return confirm('Are you Sure to move the message !!')"
                                       href="?seenid=<?php echo $result['id']; ?>">Seen</a>
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


        <div class="box round first grid">
            <h2>Seen Message</h2>
            <?php
            if (isset($_GET['delid'])) {
                $id         = $_GET['delid'];
                $delMessage = $page->deleteMessage($id);
            }
            if (isset($delMessage)) {
                echo $delMessage;
            }
            ?>

            <div class="block">
                <table class="data display datatable" id="example">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $getSeenMessage = $page->GetAllSeenMessage();
                    if ($getSeenMessage) {
                        $i = 0;
                        while ($result = $getSeenMessage->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $fm->textShorten($result['body'], 30); ?></td>
                                <td><?php echo $fm->formatDate($result['date']); ?></td>
                                <td>
                                    <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
                                    <a onclick="return confirm('Are you Sure to move the message !!')"
                                       href="?delid=<?php echo $result['id']; ?>">Delete</a>
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