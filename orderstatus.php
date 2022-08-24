<?php
if($_SESSION['ROLE'] == 2){
include_once  "includes/security.php";
include_once  "includes/process.php";
include_once "includes/db.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
?>

<div class="card border-left-success">
    <div class="card-header">
    <h5>Order Status </h5>
    </div>
  
<div class="card-body">


  <table id="datatablesSimple" class="table" style="width:100%">
  <?php
  $user = $_SESSION['username'];
  $sql = "SELECT * FROM orderasset WHERE username = '$user' and status='approved'";
                $query_run = mysqli_query($link, $sql);
            ?>
        <thead>
            <tr>
                
                <th>Description</th>

                <th>Quantity</th>
                <th>Price</th>
                <th>Purchase Cost</th>
                <th>Location</th>
                <th>Remark</th>
                <th>Checked By</th>
                <th>Received By</th>
                <th>Approved By</th>
                <th>status</th>

               
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
                               
                                <td><?php  echo $row['Description']; ?></td>
                                <td><?php  echo $row['quantity']; ?></td>
                                <td><?php  echo $row['price']; ?></td>
                                <td><?php  echo $row['purchaseCost']; ?></td>
                                <td><?php  echo $row['location']; ?></td>
                                <td><?php  echo $row['remark']; ?></td>
                                <td><?php  echo $row['checkedBy']; ?></td>
                                <td><?php  echo $row['recievedby']; ?></td>
                                <td><?php  echo $row['approvedBy']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
      
          
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
                    <h5 class="modal-title" id="editmodal"> Receive Order </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

 

                    <div class="modal-body">
              
                    <form action="orderstatus.php" method="POST"  id="form-user">
                    <p style="text-align: center;"><img src="img/loginimage.png" height="150px" width="200px" class="center"></p>
                    <input type="hidden" name="col0" id="update_id">
<div class="form-row">
  <div class="form-group col-md-12">
    <label for="inputCity">Description</label>
    <input type="text" name="description" class="form-control"id="col0" placeholder="Serial No" readonly>
  </div>

  </div>
  <div class="form-row">
<table id="order-entry" class="form-group col-md-12">
  <thead>
      <tr>
          <th>Quantity</th>
          <th>Price</th>
          <th>Purchase Cost</th>
      </tr>
  </thead>
  <tbody>
      <tr>
          <td><input class="form-calc form-control form-qty mr-3" id="col1" value="1" name="quantity" readonly></td>
          <td><input class="form-calc form-control form-cost" id="col2" value="0"  name="price" readonly></td>
          <td><input class="form-line form-control" id="col3" value="0" readonly onchange="this.value=addCommas(this.value);" name="purchaseCost" readonly></td>
      </tr>
  </tbody>
</table>  
</div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="periods">Location</label>
    <input type="text" id="col4"  name="location" class="form-control" readonly>
  </div>
     <div class="form-group col-md-6">
     <label for="inputEmail4">Remark</label>
    <input type="text" id="col5"  name="remark" class="form-control" readonly>
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Checked By</label>
    <input type="text" id="col6" name="checkedBy" class="form-control"  readonly>
  </div>
  <div class="form-group col-md-6">
    <label for="inputState">Recieved By</label>
    <input type="text" id="col7" name="recievedBy" class="form-control" readonly>
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="inputState">Approved By</label>
    <input type="text" id="col8" name="username" class="form-control" readonly>
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
                    </div>
                    </div>
                   
<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>
<?php
}
else{
  header("location: viewasset");
}
?>