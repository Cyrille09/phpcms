<?php
include "delete_modal.php";
    if(isset($_POST['checkBoxArray'])) {
        foreach($_POST['checkBoxArray'] as $postValueId) {
            
            $bulk_options = $_POST['bulk_options'];

            switch($bulk_options) {
                case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id={$postValueId}";
                $update_to_published_status = mysqli_query($connection,$query);
                confirm($update_to_published_status);
                break;
                
                case 'unpublished':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id={$postValueId}";
                $update_to_unpublished_status = mysqli_query($connection,$query);
                confirm($update_to_unpublished_status);
                break;

                case 'delete':
                $query = "DELETE FROM posts WHERE post_id={$postValueId}";
                $update_to_delete_status = mysqli_query($connection,$query);
                confirm($update_to_delete_status);
                break;

                case 'clone':
                    $query = "SELECT * FROM posts WHERE post_id={$postValueId}";
                    $select_post_query = mysqli_query($connection,$query);
                while($row = mysqli_fetch_array($select_post_query)) {
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_author = $row['post_author'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                }
                $query = "INSERT INTO posts(post_title,post_author,post_category_id,post_status,
                post_image,post_tags,post_content,post_date)";
                $query .= "VALUES('{$post_title}','{$post_author}',{$post_category_id},'{$post_status}',
                '{$post_image}','{$post_tags}','{$post_content}',now())";

                $copy_post_query = mysqli_query($connection, $query);

                confirm( $copy_post_query);
                    
                    break;
                
            }

        }
    }
?>


<form action="" method="post">
<div id="bulkOptionsContainer" class="col-xs-4">
    <select class="form-control" name="bulk_options" id="">
        <option value="">Select Options</option>
        <option value="published">Publish</option>
        <option value="unpublished">Unpublished</option>
        <option value="delete">Delete</option>
        <option value="clone">Clone</option>
    </select>
</div>
<div class="col-xs-4">
    <input type="submit" name="submit" class="btn btn-success" value="Apply">
    <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
</div>
<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><input id="selectAllBoxes" type="checkbox"> </th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Images</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                    $query = "SELECT * FROM posts ORDER BY post_id DESC";
                                    $select_posts = mysqli_query($connection,$query);
                                    
                                    while($row = mysqli_fetch_assoc( $select_posts)){
                                        $post_id = $row['post_id'];
                                        $post_category_id = $row['post_category_id'];
                                        $post_author = $row['post_author'];
                                        $post_title = $row['post_title'];
                                        $post_date	 = $row['post_date'];
                                        $post_image = $row['post_image'];
                                        $post_tags = $row['post_tags'];
                                        $post_comment_count = $row['post_comment_count'];
                                        $post_status = $row['post_status'];

                                        echo "<tr>";
                                        echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>";
                                        
                                        echo "<td>$post_id</td>";
                                        echo "<td>$post_author</td>";
                                        echo "<td>$post_title</td>";

                                        $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                                        $select_categories_id = mysqli_query($connection,$query);
                                        
                                        while($row = mysqli_fetch_assoc( $select_categories_id)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "<td>$cat_title</td>";
                                        }


                                        echo "<td>$post_status</td>";
                                        echo "<td><img width='100' height='50' src ='../images/$post_image'></td>";
                                        echo "<td> $post_tags</td>";
                                        echo "<td> $post_comment_count</td>";
                                        echo "<td>$post_date</td>";
                                        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                                        echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                                        //echo "<td><a onClick=\"javascript:return confirm('Are you sure');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </form>

                        <?php
                        if(isset($_GET['delete'])) {
                           $the_post_id = $_GET['delete'];

                        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";

                        $delette_query = mysqli_query($connection, $query);
                        header("LOCATION:posts.php");

                        }

                        ?>
    <script>
       $(document).ready(function () {
           $('.delete_link').on('click', function(){
               var id = $(this).attr("rel");
               var delete_url = "posts.php?delete=" + id +" ";

               $(".modal_delete").attr("href", delete_url);               
               $("#myModal").modal('show');
  
           });
        });


    </script>