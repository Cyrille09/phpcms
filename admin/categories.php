
<?php include "includes/header.php"; ?>

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
                            Categories page
                        </h1>
                        
                        <div class="col-xs-6">
                            
                            <?php insert_catorigories(); ?>

                            <form action="" method="post">
                               <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>

                            </form>


                            <?php
                                if(isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];
                                    include "includes/update_categories.php";
                                }
                            ?>
                            

                        </div>
                        <div class="col-xs-6">
                        <?php
                            $query = "SELECT * FROM categories";
                            $select_categories = mysqli_query($connection,$query);
        
                        ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Tile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php findAllCategories() ?>
                                   
                                <?php deleteCategories() ?>
                                    
                                </tbody>
                            </table>
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

    <?php include "includes/footer.php"; ?>

</body>

</html>
