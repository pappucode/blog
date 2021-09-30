<?php include "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' & isset($_POST['submit'])) {
    $contact = $page->addContact($_POST);
}
?>
    <div class="contentsection contemplete clear">
    <div class="maincontent clear">
        <div class="about">
            <h2>Contact us</h2>
            <?php
            if (isset($contact)) {
                echo $contact;
            }
            ?>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Your First Name:</td>
                        <td>
                            <input type="text" name="firstname" placeholder="Enter first name"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Last Name:</td>
                        <td>
                            <input type="text" name="lastname" placeholder="Enter Last name"/>
                        </td>
                    </tr>

                    <tr>
                        <td>Your Email Address:</td>
                        <td>
                            <input type="text" name="email" placeholder="Enter Email Address"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Your Message:</td>
                        <td>
                            <textarea name="body"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" value="Send"/>
                        </td>
                    </tr>
                </table>
                <form>
        </div>

    </div>
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>