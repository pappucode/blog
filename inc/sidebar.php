<div class="sidebar clear">
    <div class="samesidebar clear">
        <h2>Categories</h2>

        <ul>
            <?php
            $postCat = $cat->postByCat();
            if ($postCat) {
                while ($result = $postCat->fetch_assoc()) {
                    ?>
                    <li><a href="postbycat.php?cat=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a>
                    </li>
                    <?php

                }
            }
            ?>
        </ul>

    </div>

    <div class="samesidebar clear">
        <h2>Latest articles</h2>
        <?php
        $query    = "SELECT * FROM tbl_post limit 5";
        $postByLt = $db->select($query);
        if ($postByLt) {
            while ($result = $postByLt->fetch_assoc()) {
                ?>
                <div class="popular clear">
                    <h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h3>
                    <a href="post.php?id=<?php echo $result['id']; ?>"><img
                                src="admin/<?php echo $result['image']; ?>"
                                alt="post image"/></a>
                    <?php echo $fm->textShorten($result['body'], 120); ?>
                </div>
                <?php
            }
        } else {
            header("Location:404.php");
        }
        ?>

    </div>

</div>
</div>
