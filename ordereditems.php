<?php
include_once  "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/process.php";
include_once "includes/db.php";
include_once  "includes/navbar.php";
?>

<div class="card border-left-success">
    <div class="card-header">
    <h5>New Ordered Items

    <a href="ordernewitem.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" style="float: right;"><i
            class="fas fa-add fa-sm text-white-50"></i> Add New Order</a>
    </h5>
    </div>
  

  <div class="card-body">


  <table id="datatablesSimple" class="table" style="width:100%">
  <?php
                $query = "SELECT * FROM `orderasset`";
                $query_run = mysqli_query($link, $query);
            ?>
        <thead>
            <tr>
               <th>ID</th>
                <th>Username</th>
                <th>Description</th>
                <th>Departments</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Purchase Cost</th>
                <th>Location</th>
                <th>Account No</th>
                <th>Type</th>
                <th>Category</th>
                <th>status</th>
                <th>Action</th>
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
                             <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td><?php  echo $row['Description']; ?></td>
                                <td><?php  echo $row['department']; ?></td>
                                <td><?php  echo $row['quantity']; ?></td>
                                <td><?php  echo $row['price']; ?></td>
                                <td><?php  echo $row['purchaseCost']; ?></td>
                                <td><?php  echo $row['location']; ?></td>
                                <td><?php  echo $row['AccountNo']; ?></td>
                                <td><?php  echo $row['type']; ?></td>
                                <td><?php  echo $row['category']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
                <td> 
         
    <form action="ordereditems.php" method="POST">    
    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
<button class="btn btn-success btn-sm rounded-0" name="approve-order" type="submit"><i class="fa fa-check"></i></button>
<button class="btn btn-danger btn-sm rounded-0" name="cancel-order" type="submit"><i class="fa fa-cancel"></i></button>
<button class="btn btn-danger btn-sm rounded-0" name="delete-order" type="submit"><i class="fa fa-trash"></i></button>
         <button type="button" class="btn btn-primary btn-sm rounded-0 m-1 editbtn"> <i class="fa fa-eye"></i> </button>
    </form>
                   

    </td>
          
            <?php
                            }
                        }
            ?>
             </tr>
            
    </table>
    <div class="modal" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white shadow">
                    <h5 class="modal-title" id="editmodal"> Receive Order </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

 

                    <div class="modal-body">
                    <form action="ordereditems.php" method="POST" form="form-user">    
   
                    <input type="hidden" name="edit_id" id="update_id"   value="<?php echo $row['id'] ?>" >
                    <div class="form-row col-12">
  <div class="form-group col-12">
    <label for="inputCity">Requested by</label>
    <input type="text" name="username" class="form-control" id="col0" readonly>
  </div>

  </div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputCity">Description</label>
    <input type="text" name="Description" class="form-control"id="col1"  readonly>
  </div>

  <div class="form-group col-md-6">
    <label for="inputState">Department</label>
    <input type="text" name="department" class="form-control" id="col2" readonly>
  </div>
  </div>
  <div class="form-row col-12">
  <div class="form-group col-md-12">
    <label for="inputCity">Type</label>
    <input type="text" name="Type" class="form-control"id="col3"  readonly>
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
          <td><input class="form-calc form-control form-qty mr-3" value="1" name="quantity" id="col4" readonly></td>
          <td><input class="form-calc form-control form-cost" id="col5" value="0"  name="price" readonly></td>
          <td><input class="form-line form-control" id="col6" value="0" readonly onchange="this.value=addCommas(this.value);" name="purchaseCost" readonly></td>
      </tr>
  </tbody>
</table>  
</div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="periods">supplier</label>
    <input type="text" name="supplier" class="form-control" placeholder="Supplier">
  </div>
     <div class="form-group col-md-6">
     <label for="inputEmail4">Recieved By</label>
    <input type="text" name="recievedby" class="form-control" placeholder="Recieved By">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputEmail4">Carried By</label>
    <input type="text" name="carriedBy" class="form-control" placeholder="Carried By">
  </div>
  <div class="form-group col-md-6">
    <label for="inputState">Checked By</label>
    <input type="text" name="checkedBy" class="form-control" placeholder="Checked By">
  </div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
    <label for="inputState">Location</label>
    <input type="text" name="location" class="form-control"  placeholder="Location">
  </div>
  <div class="form-group col-md-6">
    <label for="remark">Remarks</label>
    <?php  populateDD("remark", "SELECT remark FROM `remark` order by remark", 0, "Select Remarks of the Item")
 ?>
  </div>
</div>






                    <div class="modal-footer">
                    <button type="submit" name="recieve-order" class="btn btn-primary btn-sm  ml-5">Recieve Order</button>
                        <button type="button" class="btn btn-secondary btn-sm  ml-5" data-dismiss="modal">Close</button>
                    </div>
                    </form>




    </div>
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