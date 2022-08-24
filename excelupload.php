<?php
include_once  "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/process.php";
include_once "includes/db.php";
include_once  "includes/navbar.php";
?>

    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Import Excel Data</h4>
                    </div>
                    <div class="card-body">

                        <form action="excelupload.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
include_once "includes/script.php";
include_once  "includes/footer.php";
?>