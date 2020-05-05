<?php include "../../includes/header.php"; ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "../includes/navigation.php"; ?>
    
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellcome to admin
                            <small>Cyrile Hounvio</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <div class="col-xs-6">
                        <form action="">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title" value="Add Category">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                        </form>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "../includes/footer.php"; ?>

</body>

</html>
