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

    move_uploaded_file($user_image_temp, "../images/$user_image");

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

    $query = "INSERT INTO users(username,user_firstname,user_lastname,
   user_password,user_image,user_email,user_role)";
    $query .= "VALUES('{$username}','{$user_firstname}','{$user_lastname}',
   '{$user_password}','{$user_image}','{$user_email}','{$user_role}')";

    $create_user_query = mysqli_query($connection, $query);

    confirm($create_user_query);

    echo "<div class='bg-success'style='padding:10px;margin-bottom:20px'>
   <p>User Created: " . " " . "<a a href='users.php'>View Users</a></p>
        </div>";
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">

    <select name="user_role" id="">
        <option class="form-control" value="subscriber">Select Option</option>
        <option value="admin">admin</option>
        <option value="subscriber">subscriber</option>
    </select>
    </div>
    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>

</form>
