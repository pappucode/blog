<?php
//include '../lib/Database.php';
//include '../helpers/Format.php';
include "../classes/Adminlogin.php";
$db = new Database();
$fm = new Format();
$al = new Adminlogin();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $passRecov    = $al->passRecovery($email);
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Password Recovery</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen"/>
</head>
<body>
<div class="container">
    <section id="content">
        <form action="login.php" method="post">
            <h1>Password Recovery</h1>
            <?php
            if (isset($passRecov)) {
                echo $passRecov;
            }
            ?>
            <div>
                <input type="text" placeholder="Enter Email" name="email"/>
            </div>
            <div>
                <input type="submit" value="send Mail"/>
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="login.php">Login !</a>
        </div>
        <div class="button">
            <a href="">Pappu Akondo</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>