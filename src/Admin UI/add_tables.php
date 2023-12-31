<?php
    $page_title = "Tasty Tongue - Change Staff Infomation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    // $table_id = $_GET['table_id'];
    // $table = getbyId('tables', $table_id);
?>

<body>
    <!-- Sidebar -->
    <?php
        require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <div class="content">
            <!-- Top navbar -->
            <?php
            require_once('partials/_topnav.php');
            ?>
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" action="../Controller/AdminController/add_table.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Name</label>
                                            <input type="text" name="table_name" class="form-control" placeholder="Enter table name">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Size</label>
                                            <input type="number" name="table_size" class="form-control" placeholder="Enter table size">
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Status</label>
                                            <select name="table_status" id="tablStatus" class="form-cotrol">
                                                <option value="<?php //echo $table['data']['table_size'];?>" class=""><?php //echo $table['data']['table_size'];?></option>
                                            </select>

                                        </div>                                
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Description</label>
                                            <textarea name="table_desc" rows="5" class="form-control" placeholder="Enter description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-table" value="Add Table" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php 
            require_once('partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>