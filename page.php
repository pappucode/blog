<?php include "inc/header.php"; ?>
<?php
if (!isset($_GET['pageid']) || $_GET['pageid'] == null) {
    header("Location:404.php");
} else {
    $id = $_GET['pageid'];
}
?>

<?php
$getPage = $page->GetPageById($id);
if ($getPage) {
    while ($result = $getPage->fetch_assoc()) {
        ?>
        <div class="contentsection contemplete clear">
        <div class="maincontent clear">
            <div class="about">
                <h2><?php echo $result['name']; ?></h2>
                <?php echo $result['body']; ?>
            </div>
        </div>
    <?php }
} else {
    header("Location:404.php");
} ?>
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>