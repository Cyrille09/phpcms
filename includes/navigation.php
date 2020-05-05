<?php session_start();?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class='navbar-brand' href="index.php">HOME PAGE</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div align="right" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                    <?php
$homeClass = '';
$blogClass = '';
$registrationClass = '';
$contactClass = '';
$loginClass = '';
$profileClass = '';

$pageName = basename($_SERVER['PHP_SELF']);
$homePage = 'index.php';
$blogPage = 'blog.php';
$registrationPage = 'registration.php';
$contactPage = 'contact.php';
$loginPage = 'login.php';
$profilePage = 'profile.php';

if ($pageName == $registrationPage) {
    $registrationClass = 'active';
} else if ($pageName == $blogPage) {
    $blogClass = 'active';
} else if ($pageName == $homePage) {
    $homeClass = 'active';
} else if ($pageName == $contactPage) {
    $contactClass = 'active';
} else if ($pageName == $loginPage) {
    $loginClass = 'active';
} else if ($pageName == $profilePage) {
    $profileClass = 'active';
}
?>
                    <li class='<?php echo $blogClass; ?>'><a href="blog.php">News</a></li>
                    <li class='<?php echo $contactClass; ?>'><a href="contact.php">Contact</a></li>
                    <?php
if (isset($_SESSION['user_role'])) {
    // echo "<li class='$profileClass'><a href='profile.php'>Profile</a></li>";
} else {
    echo "<li class='$loginClass'><a href='login.php'>Login</a></li>
    <li class='$registrationClass'><a href='registration.php'>Register</a></li>";
}
?>



                   <?php
if (isset($_SESSION['user_role'])) {
    echo "<li><a href='admin'>Admin</a></li>";
    echo "<li class=''><a href='includes/logout.php'>Logout</a></li>";
}
?>

                   <?php
if (isset($_SESSION['user_role'])) {
    if (isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
        echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
    }
}
?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>