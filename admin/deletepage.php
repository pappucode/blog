<?php
include "../lib/Session.php";
Session::checkSession();
?>
<?php
include "../lib/Database.php";
spl_autoload_register(function ($class) {
    include_once "../classes/" . $class . ".php";
});
$db   = new Database();
$page  = new Page();
?>
<?php
if (isset($_GET['pagedel'])) {
    $Delid      = $_GET['pagedel'];
    $delPage = $page->delPageById($Delid);
    if ($delPage){
        echo "<script>alert('Page Deleted Successfully.');</script>";
        echo "<script>window.location='index.php';</script>";
    }else{
        echo "<script>alert('Page Not Deleted.');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}
?>
