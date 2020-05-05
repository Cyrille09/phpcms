<?php

function redirect($location){


    header("Location:" . $location);
    exit;

}


function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}

function email_exists($email){

    global $connection;


    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirm($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}

function isLoggedIn(){

    if(isset($_SESSION['user_role'])){

        return true;


    }


   return false;

}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){

    if(isLoggedIn()){

        redirect($redirectLocation);

    }

}




function confirm($result) {
    global $connection;
    if(!$result) {
        die("QUERY FAILED".mysqli_error($connection));
    }

}

function insert_catorigories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'] ;
        if($cat_title == "" || empty($cat_title)){
            echo "This field cannot be empty";
        }
        else {
            $query = "INSERT INTO categories (cat_title)";
            $query .="VALUE('{$cat_title}')";
            $create_categorry_query = mysqli_query($connection, $query);
            if(!$create_categorry_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);
    
    while($row = mysqli_fetch_assoc( $select_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo"<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo"</tr>";
       
       }
}

function deleteCategories() {
    global $connection;

    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];

       $query = "DELETE FROM categories WHERE cat_id ={$the_cat_id}";
       $delete_query = mysqli_query($connection,$query);
       header("LOCATION:categories.php");
       }
}


 function login_user($username, $password)
 {

     global $connection;

     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);


     $query = "SELECT * FROM users WHERE username = '{$username}' ";
     $select_user_query = mysqli_query($connection, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));

     }


     while ($row = mysqli_fetch_array($select_user_query)) {

         $db_user_id = $row['user_id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];


         if (password_verify($password,$db_user_password)) {

             $_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = $db_user_role;



             redirect("/phpcms/admin");


         } else {


             return false;



         }



     }

     return true;

 }

?>