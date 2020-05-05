<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Date</th>
                                    <th>admin</th>
                                    <th>no admin</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $query = "SELECT * FROM users";
                                    $select_users = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_assoc( $select_users)){
                                        $user_id = $row['user_id'];
                                        $user_image = $row['user_image'];
                                        $username = $row['username'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_role = $row['user_role'];
                                        $user_date = $row['user_date'];

                                        echo "<tr>";
                                        echo "<td><img width='100' height='50' src ='../images/$user_image'></td>";
                                        echo "<td>$username</td>";
                                        echo "<td>$user_firstname</td>";
                                        echo "<td>$user_lastname</td>";     
                                        echo "<td>$user_email</td>";
                                        echo "<td>$user_role</td>";
                                        echo "<td>$user_date</td>";
                                        echo "<td><a href='users.php?admin={$user_id}'>admin</a></td>";
                                        echo "<td><a href='users.php?subscriber={$user_id}'>subscriber</a></td>";
                                        echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                                        echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                                        echo "</tr>";
                                        
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                        <?php

                            if(isset($_GET['admin'])) {
                                $the_user_id = $_GET['admin'];

                            $query = "UPDATE users SET user_role = 'admin' WHERE user_id=$the_user_id ";

                            $admin_query = mysqli_query($connection, $query);
                            header("LOCATION:users.php");

                            }

                            if(isset($_GET['subscriber'])) {
                                $the_user_id = $_GET['subscriber'];

                                $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id=$the_user_id ";

                            $subscriber_query = mysqli_query($connection, $query);
                            header("LOCATION:users.php");

                            }



                        if(isset($_GET['delete'])) {
                           $the_user_id = $_GET['delete'];

                        $query = "DELETE FROM users WHERE user_id = {$the_user_id}";

                        $delete_query = mysqli_query($connection, $query);
                        header("LOCATION:users.php");

                        }

                        ?>