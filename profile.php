<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
}

?>

    <!-- Navigation -->

    <?php include "includes/navigation.php";?>


    <!-- Page Content -->
    <div class="container">
        <h1>Hello</h1>
    </div>



<?php include "includes/footer.php";?>
