                    <?php
$homeClass = '';
$usersClass = '';
$postsClass = '';
$categoriesClass = '';
$commentsClass = '';
$profileClass = '';

$pageName = basename($_SERVER['PHP_SELF']);
$homePage = 'index.php';
$usersPage = 'users.php';
$postsPage = 'posts.php';
$categoriesPage = 'categories.php';
$commentsPage = 'comments.php';
$profilePage = 'profile.php';

if ($pageName == $postsPage) {
    $postsClass = 'active';
} else if ($pageName == $usersPage) {
    $usersClass = 'active';
} else if ($pageName == $homePage) {
    $homeClass = 'active';
} else if ($pageName == $categoriesPage) {
    $categoriesClass = 'active';
} else if ($pageName == $commentsPage) {
    $commentsClass = 'active';
} else if ($pageName == $profilePage) {
    $profileClass = 'active';
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../admin/index.php">PHP CMS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_firstname'] . ' ' . $_SESSION['user_lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class='<?php echo $homeClass; ?>'>
                        <a href="../admin/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class='<?php echo $profileClass; ?>'>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li class='<?php echo $usersClass; ?>'>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users_dropdown"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users_dropdown" class="collapse">
                            <li>
                                <a href="./users.php">View Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add Users</a>
                            </li>
                        </ul>
                    </li>

                    <li class='<?php echo $postsClass; ?>'>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-tasks"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_dropdown" class="collapse">
                            <li>
                                <a href="./posts.php">View Posts</a>
                            </li>
                            <li>
                                <a href="posts.php?source=add_post">Add Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li class='<?php echo $categoriesClass; ?>'>
                    <a href="categories.php"><i class="fa fa-fw fa-list"></i> Categories</a>
                    </li>
                    <li class='<?php echo $commentsClass; ?>'>
                        <a href="./comments.php"><i class="fa fa-fw fa-comment"></i> Comments</a>
                    </li>
                    <li class="">
                        <a href="../index.php"><i class="fa fa-fw fa-comment"></i> Home Site</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>