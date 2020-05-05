<?php include "includes/header.php"; ?>
<?php
    if(isset( $_SESSION['username'])) {

       $username = $_SESSION['username'];

       $query = "SELECT * FROM users WHERE username = '$username' ";
       $select_user_profile_query = mysqli_query($connection,$query);
       while($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $user_image = $row['user_image'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_date = $row['user_date'];

       }
       
    }

    if(isset($_POST['edit_user'])) {
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
     
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
     
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_date = date('d-m-y');
     
        move_uploaded_file($user_image_temp, "../images/$user_image");
     
        if(empty($user_image)){
         $query = "SELECT * FROM users WHERE username = '$username' ";
         $select_image = mysqli_query($connection,$query);
     
      while($row = mysqli_fetch_array($select_image)) {
          $user_image = $row['user_image'];
      }
     }
     
     
        $query = "UPDATE users SET ";
        $query .="user_firstname = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="user_image = '{$user_image}', ";
        $query .="user_role = '{$user_role}', ";
        $query .="user_date = now() ";
        $query .="WHERE username = '{$username}' ";
     
        $update_user = mysqli_query($connection,$query);
     
        confirm($update_user);
     
     }
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>
    
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile Page
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" value="<?php echo $user_firstname?>" class="form-control" name="user_firstname">
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" value="<?php echo $user_lastname?>" class="form-control" name="user_lastname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="<?php echo $user_email?>" class="form-control" name="user_email">
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="user_role" id="user_role" class="form-control">
                                <option class="form-control" value="subscriber"><?php echo $user_role?></option>
                                    <?php

                                    if($user_role == 'admin') {
                                        echo "<option value='subscriber'>subscriber</option>";
                                    } else {
                                        echo "<option value='admin'>admin</option>";
                                    }

                                    ?>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <img width="100" src="../images/<?php echo $user_image;?>" alt="">
                                <input type="file" name="user_image">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
                            </div>

                        </form>
                      
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/footer.php"; ?>

</body>

</html>
