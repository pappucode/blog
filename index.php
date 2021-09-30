<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>


<!--Pagination-->
<?php
$per_page = 3;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$start_form = ($page - 1) * $per_page;
?>
<!--Pagination-->
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        $getPost = $post->getAllPost($start_form, $per_page);
        if ($getPost) {
            while ($result = $getPost->fetch_assoc()) {
                ?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
                    <h4><?php echo $fm->formatDate($result['date']); ?>, By <a
                                href="#"><?php echo $result['author']; ?></a></h4>
                    <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
                    <?php echo $fm->textShorten($result['body'], 250); ?>
                    <div class="readmore clear">
                        <a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
                    </div>
                </div>
                <?php
            } ?>
            <!--Pagination-->
            <?php
            $getPostFP = $post->getPostForPagination();
            if ($getPostFP) {
                while ($total_rows = $getPostFP->fetch_assoc()){
                $total_page = ceil($total_rows['number']/$per_page);
                ?>
                <span class="pagination">
                <a href="index.php?page=1">First Page</a>
                    <?php
                    for ($i = 1; $i <= $total_page; $i++) {
                        ?>
                        <a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php }
                    ?>
                <a href="index.php?page=<?php echo $total_page; ?>">Last Page</a>
            </span>
                <?php
            }}
            ?>
            <!--Pagination-->
        <?php } else {
            header("Location:404.php");
        }
        ?>
    </div>
    <?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>
