<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

    <!-- Navigation -->

    <?php include "includes/navigation.php";?>


    <!-- Page Content -->
    <div class="container">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="form-wrap">
                <?php
if (isset($_POST['submit'])) {
    echo "<div class='col-md-12'>
            <h2>List of details submitted</h2>
            <div class='bg-success col-md-12'style='padding:10px;margin-bottom:20px'> ";
    echo "<h4> <b>Full Name:</b> " . $_POST['name'] . "</h4>";
    echo "<h4> <b>Email:</b> " . $_POST['email'] . "</h4>";
    echo "<h4> <b>Phone Number:</b> " . $_POST['number'] . "</h4>";
    echo "<h4> <b>Subject:</b> " . $_POST['subject'] . "</h4>";
    echo "<h4> <b>Message:</b> " . $_POST['message'] . "</h4>";
    echo "</div>

          </div>";
}

?>


                <h1>Contact</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">

                        <div class="form-group col-md-6">
                            <label for="name">Full Name <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
								<input name="name" type="text" class="form-control" placeholder="Enter Full Name" required>
							</div>
						</div>
                        <div class="form-group col-md-6">
                            <label for="email">Email <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
								<input name="email" type="email" class="form-control" placeholder="Enter Email" required>
							</div>
						</div>
                        <div class="form-group col-md-6">
                            <label for="subject">Subject <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-pencil color-blue"></i></span>
								<input name="subject" type="text" class="form-control" placeholder="Enter Subject" required>
							</div>
						</div>
                        <div class="form-group col-md-6">
                            <label for="number">Phone Number <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-phone color-blue"></i></span>
								<input name="number" type="text" class="form-control" placeholder="Enter Phone Number" required>
							</div>
						</div>
                        <div class="form-group col-md-12">
                            <label for="password">Message <span class=""></span></label>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-comment color-blue"></i></span>
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
							</div>
						</div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
