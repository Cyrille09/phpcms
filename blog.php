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

<section>
    <div class="">
        <div class="row">
        <div class="col-md-12">
            <h1>Top news</h1>
        </div>
        <section class="col-md-12">
  <?php
$url = 'https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=852e3e6075214e328d3e1caa5ff697ed';
$response = file_get_contents($url);
$newData = json_decode($response);
?>
  <div class="contaner">
      <?php
foreach ($newData->articles as $news) {

    ?>
      <div class="row newsGrid">
        <div class="col-md-3">
            <img src="<?php echo $news->urlToImage; ?>" alt="News thumbnail">
        </div>
        <div class="col-md-9">
            <h3><?php echo $news->title; ?></h3>
            <p> <?php echo $news->content; ?></p>
            <p><b>Published:</b> <?php echo $news->publishedAt; ?></p>
        </div>
      </div>
      <?php
}
?>
  </div>
</section>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
