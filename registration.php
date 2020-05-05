<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<?php
if (isset($_POST['create_user'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $user_firstname = mysqli_real_escape_string($connection, $_POST['user_firstname']);
    $user_lastname = mysqli_real_escape_string($connection, $_POST['user_lastname']);
    $user_password = mysqli_real_escape_string($connection, $_POST['user_password']);

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $user_role = mysqli_real_escape_string($connection, $_POST['user_role']);
    $user_date = date('d-m-y');

    move_uploaded_file($user_image_temp, "./images/$user_image");

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO users(username,user_firstname,user_lastname,
   user_password,user_image,user_email,user_role)";
    $query .= "VALUES('{$username}','{$user_firstname}','{$user_lastname}',
   '{$user_password}','{$user_image}','{$user_email}','{$user_role}')";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);

    echo "<div class='bg-success'style='padding:10px;margin-bottom:20px'>
            <h4>User Created Successfully</h4>
          </div>";
}
?>

    <!-- Navigation -->

    <?php include "includes/navigation.php";?>


    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Sign up</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                        <label for="password">First Name <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
								<input name="user_firstname" type="text" class="form-control" placeholder="Enter First Name" required>
							</div>
						</div>
                        <div class="form-group col-md-6">
                        <label for="password">Last Name <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
								<input name="user_lastname" type="text" class="form-control" placeholder="Enter Last Name" required>
							</div>
						</div>

                        <div class="form-group col-md-12">
                        <label for="password">Username <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
								<input name="username" type="text" class="form-control" placeholder="Enter Username" required>
							</div>
						</div>
                        <div class="form-group col-md-12">
                        <label for="password">Email <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
								<input name="user_email" type="email" class="form-control" placeholder="Enter Email" required>
							</div>
						</div>
                        <div class="form-group col-md-12">
                        <label for="password">Password <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
								<input name="user_password" type="password" class="form-control" placeholder="Enter Password" required>
							</div>
						</div>
                        <input type="hidden" name="user_role" value="subscriber">
                        <div style="margin-bottom:25px;" class="col-md-12">
                            <label for="user_image">Profile Image <span class=""></span></label>
                            <input type="file" name="user_image">
                        </div>
                        <input type="submit" name="create_user" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
