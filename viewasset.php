<?php
include_once "includes/security.php";
include_once "includes/header.php";
include_once  "includes/navbar.php";


//Multiple Selection

if(isset($_POST['s_data'])){
    $id = $_POST['id'];
    $visible = $_POST['visible'];


    $sql = "UPDATE registerasset SET visible = '$visible' WHERE id='$id'";
    $query = mysqli_query($link, $sql);
}


$sql = " SELECT SUM(price) AS SUM FROM `registerasset`";
$sql_query= mysqli_query($link, $sql);
while($row = mysqli_fetch_assoc($sql_query)){
    $output =$row['SUM'];
}


?>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total (Asset)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                              <?php
                
                            $query = "SELECT id FROM registerasset ORDER BY id";  
                            $query_run = mysqli_query($link, $query);
                            $row = mysqli_num_rows($query_run);
                            echo '<h4> Total Asset: '.$row.'</h4>';
                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                          ToTal Asset Cost</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                        
                        $query = "SELECT id FROM registerasset ORDER BY id";  
                        $query_run = mysqli_query($link, $query);
                        $row = mysqli_num_rows($query_run);
                        echo  '<h4> Total Asset Cost: ' .$output. '</h4>';

                     
            ?>
         
                        </div>
                        
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">List of categories
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                            <?php
                        
                        $query = "SELECT category FROM category ORDER BY id";  
                        $query_run = mysqli_query($link, $query);
                        $row = mysqli_num_rows($query_run);
                        echo  '<h4> Total Categories: ' .$row. '</h4>';

                     
            ?>
                            </div>
                            <div class="col">
                         
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total of Orders </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">           <?php
                        
                        $query = "SELECT status FROM orderasset WHERE status = 'Pending'";  
                        $query_run = mysqli_query($link, $query);
                        $row = mysqli_num_rows($query_run);
                        echo  '<h4> Total Asset Orders: ' .$row. '</h4>';

                     
            ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    if(isset($_SESSION['']) && $_SESSION[''] !='')
    {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        </strong> <?= $_SESSION['added']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        
        <?php 
        unset($_SESSION['']);
    }

?>


<form action="viewasset.php" method="POST">
    <button class="btn btn-danger mb-5 ml-2" name="delete-multiple">Delete Multiple Data</button>
</form>

<div class="card border-left-success">
    <div class="card-header">
    <h5>Recorded Asset   
  <a href="addnewasset.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="float: right;"><i
            class="fas fa-add fa-sm text-white-50"></i> Add New Asset</a>
            </h5>

    </div>
  

  <div class="card-body">

  <table id="datatablesSimple" class="table  " style="width:100%">
  <?php
                $query =  "SELECT `id`,`Description`, `department`,`PO`,`type`, `quantity`, `price`, `purchaseCost`, `requested`, `remaining`,`price`,`visible` FROM registerasset UNION SELECT `id`,`Description`, `department`,`PO`,`type`, `quantity`, `price`, `purchaseCost`,`requested` , `remaining`, `visible`,`supplier` FROM orderasset WHERE `status`='Recieved'";
                $query_run = mysqli_query($link, $query);



            ?>
        <thead>
            <tr>
                <th>Select</th>
                <th>Description</th>
                <th>Department</th>
                <th>PO</th>
                <th>Type</th>
                <th>Requested</th>
                <th>Remaining</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Purchase Cost</th>
                <th>Action</th>
                <th>Print</th>
                <th>Request Asset</th>
            </tr>
        </thead>
        <tbody>
        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><input type="checkbox" onclick="togglecheckbox(this)" value="<?php echo $row['id']; ?>" <?php echo $row['visible'] == 1 ? "checked" : ""?>></td>
                                <td><?php  echo $row['Description']; ?></td>
                                <td><?php  echo $row['department']; ?></td>
                                <td><?php  echo $row['PO']; ?></td>
                                <td><?php  echo $row['type']; ?></td>
                                <td><?php  echo $row['requested']; ?></td>
                                <td><?php  echo $row['remaining']; ?></td>
                                <td><?php  echo $row['quantity']; ?></td>
                                <td><?php  echo $row['price']; ?></td>
                                <td><?php  echo $row['purchaseCost']; ?></td>
                <td> 
         
                                    <form action="updateasset.php" method="POST" class="form-inline" onsubmit="openModal()" id="myForm">
                                        <input type="hidden" name="update_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-success btn-sm rounded-0 m-1" type="submit" name="update_asset" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                       <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-danger btn-sm rounded-0 m-1" type="submit"   name="delete_btn"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                    </form>
                </td>
                <td>
                                    <form action="invoice.php" method="POST">
                                    <input type="hidden" name="print_asset_id" value="<?php echo $row['id']; ?>">
                                       <button type="submit" class="btn btn-secondary btn-sm rounded-0 m-1 float-end" name="print_asset_btn"> <i class="fa fa-print"></i> </button>
                                    </form>
                </td>
                <td>
                                    <form action="requestasset.php" method="POST">

                                    <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-primary btn-sm " type="submit" name="request_btn"><i>Request Asset</i></button>
                                    </form>
                                </td>
          
            <?php
                            }
                        }
            ?>
             </tr>
            
    </table>

  
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodal"> Edit Asset</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

          

                    <div class="modal-body">

                    <form action="viewasset.php" method="POST" id="form-user">
                        <input type="hidden" name="col0" id="update_id">

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="Description" id="col0" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Serial No </label>
                            <input type="text" name="SerialNo" id="col1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> PO </label>
                            <input type="text" name="PO" id="col2" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Class </label>
                            <input type="text" name="contact" id="col3" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label> Type </label>
                            <input type="text" name="contact" id="col4" class="form-control">
                        </div>
                    </div>
                    </form>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-sm  ml-5" onclick="printContent('form-user')">Print Content</button>
                        <button type="button" class="btn btn-secondary btn-sm  ml-5" data-dismiss="modal">Close</button>
                    </div>
              

            </div>
            </div>
            </div>

    </div>
    </div>



   
    <script type="text/javascript">
      $(document).ready(
        function() {
          $('#example').DataTable();
        });

    </script>
        </div>
        <?php
include_once "includes/script.php";
?>
    <script>
        function togglecheckbox(box)
        {
            var id = $(box).attr("value");
            if($(box).prop("checked") == true){
                    var visible = 1;
            }
            else{
                var visible = 0;
            }
         

            var data = {
                "s_data": 1,
                "id":id,
                "visible":visible

            };


            $.ajax({

                    type:"POST",
                    url:"viewasset.php",
                    data: data,
                    datatype:"dataType",

                success: function (response){
                 
                }
            });
        }


    </script>
<?php
include_once  "includes/footer.php";
?>