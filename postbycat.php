<?php include "inc/header.php"; ?>
<?php
if (!isset($_GET['cat']) || $_GET['cat'] == null) {
    header("Location:404.php");
} else {
    $id = $_GET['cat'];
}
?>
<div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <?php
        $postByCat = $post->postByCatPage($id);
        if ($postByCat) {
            while ($result = $postByCat->fetch_assoc()) {
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
            }
        }else{
            header("Location:404.php");
        }
        ?>
    </div>
    <?php include "inc/sidebar.php"; ?>
    <?php include "inc/footer.php"; ?>
