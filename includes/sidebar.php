<div class="col-md-4">



                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>  <!-- search form -->
                    <!-- /.input-group -->
                </div>


                  <!-- Login Form -->
                  <div class="well">

                      <?php if (isset($_SESSION['user_role'])): ?>
                         <h4> Logged in as <?php echo $_SESSION['username'] ?> </h4>
                         <a href="includes/logout.php" class="btn btn-success">Logout</a>
                      <?php else: ?>
                        <h4>Login</h4>
                    <form action="includes/login.php" method="post">

                    <div class="form-group">
						<div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                            <input name="username" type="text" class="form-control" placeholder="Enter User Name" required>
						</div>
					</div>
                    <div class="form-group">
						<div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                            <input name="password" type="password" class="form-control" placeholder="Enter Password" required>
						</div>
					</div>

                    <div class="form-group row">
                        <span class="col-md-6">
                            <a href="forgot.php?forgot=<?php echo uniqid(true); ?>">Forgot Password</a>
                        </span>
                        <span class="input-group-btn col-md-6">
                            <button class="btn btn-primary" name="login" type="submit">Login</button>
                        </span>
                    </div>
                    </form>  <!-- login form -->
                      <?php endif;?>


                    <!-- /.input-group -->
                  </div>



                <!-- Blog Categories Well -->
                <div class="well">
                <?php
$query = "SELECT * FROM categories LIMIT 10";
$select_categories_sidebar = mysqli_query($connection, $query);

?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-unstyled">
                                <?php
while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
    $cat_title = $row['cat_title'];
    $cat_id = $row['cat_id'];

    echo "<li class='col-md-6'><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";

}
?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!--<div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div>
                                -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "widget.php"?>

            </div>