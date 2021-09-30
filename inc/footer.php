<div class="footersection templete clear">
    <div class="footermenu clear">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact">Contact</a></li>
            <li><a href="#">Privacy</a></li>
        </ul>
    </div>
    <?php
    $copyRight = $post->getCopyRight();
    if ($copyRight) {
        while ($result = $copyRight->fetch_assoc()) {
            ?>
            <p>&copy; <?php
                echo $result['note'].' ';
                echo date('Y');
                ?></p>
            <?php
        }
    }
    ?>
</div>
<div class="fixedicon clear">
    <?php
    $socialMedia = $post->getAllSocialMedia();
    if ($socialMedia) {
        while ($result = $socialMedia->fetch_assoc()) {
            ?>
            <a href="<?php echo $result['fb']; ?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
            <a href="<?php echo $result['tw']; ?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
            <a href="<?php echo $result['ln']; ?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
            <a href="<?php echo $result['gp']; ?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
            <?php
        }
    }
    ?>
</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>