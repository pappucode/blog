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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login    = $al->adminLogin($username, $password);
}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen"/>
</head>
<body>
<div class="container">
    <section id="content">
        <form action="login.php" method="post">
            <h1>Admin Login</h1>
            <?php
            if (isset($login)) {
                echo $login;
            }
            ?>
            <div>
                <input type="text" placeholder="Username" name="username"/>
            </div>
            <div>
                <input type="password" placeholder="Password" name="password"/>
            </div>
            <div>
                <input type="submit" value="Log in"/>
            </div>
        </form><!-- form -->
        <div class="button">
            <a href="forgetpass.php">Forget Password !</a>
        </div>
        <div class="button">
            <a href="">Pappu Akondo</a>
        </div><!-- button -->
    </section><!-- content -->
</div><!-- container -->
</body>
</html>