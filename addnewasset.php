<?php
include_once "includes/security.php";
include_once "includes/header.php";
include_once "includes/navbar.php";
?>


<div class="card border-left-success  ml-5 mb-5 mr-5 p-5 shadow">
  <div class="card-header"><h5>Add New Asset</h5>
</div>
  <div class="card-body">
  <div class="form-row col-md-12">
  <div class="form-group">
  <button type="button" class="btn btn-primary rounded-1 m-1 editbtn" id="#editmodal"> <i class="fa fa-upload"></i> Import Excel</button>
  <button type="button" class="btn btn-primary rounded-1 m-1 editbtn2" id="#editmodal2"> <i class="fa fa-download"></i> Export Excel</button>
  </div>
  </div>



  <div class="modal" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered" role="document"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodal"> Import New asset Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

          

                    <div class="modal-body">
                    <div class="form-row">
  <div class="form-group col-md-6">
  <div class="form-group">
  <label for="location">Import Excel File</label>
  <form action="addnewasset.php" method="POST" enctype="multipart/form-data">

<input type="file" name="import_file" class="form-control" />



  </div>
  </div>
  </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="save_excel_data" class="btn btn-primary">Import</button>
                    </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
              

            </div>
            </div>
            </div>




            <div class="modal" id="editmodal2" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodal2"> Export asset Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

          

                    <div class="modal-body">

                    <div class="form-group col-md-4">
  <label for="location">Export Excel File</label>
  <form action="addnewasset.php" method="POST">

<select name="export_file_type" class="form-control">
    <option value="xlsx">XLSX</option>
    <option value="xls">XLS</option>
    <option value="csv">CSV</option>
</select>




  </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="export_excel_btn" class="btn btn-primary">Export New asset Data</button>
                   
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
              

            </div>
            </div>
            </div>


  </div>

  <form action="addnewasset.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="description">Description</label>
      <input type="text" name="Description" class="form-control" id="description" placeholder="description">
    </div>
    <div class="form-group col-md-6">
      <label for="serialnumber">Serial No</label>
      <input type="text" name="SerialNo" class="form-control" id="serialno" placeholder="Serial Number">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="PO">PO</label>
      <input type="text" name="PO" class="form-control" id="PO" placeholder="PO">
    </div>
    <div class="form-group col-md-6">
      <label for="Class">Class</label>
      <input type="text" name="Class" class="form-control" id="Class" placeholder="Class">
    </div>
  </div>
  <div class="form-row col-12">
    <div class="form-group col-12">
      <label for="type">Category</label>
      <?php  populateDD("category", "SELECT category FROM `category` order by category", 0, "Select category")
   ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="type">Type</label>
      <input type="text" name="Type" class="form-control" id="type" placeholder="type">
    </div>
    <div class="form-group col-md-6">
      <label for="AccountNo">Accoun No</label>
      <input type="text" name="AccountNo" class="form-control" id="AccountNo" placeholder="AccountNo">
    </div>
  </div>
  <div class="form-row">
  <table id="order-entry" class="form-group col-md-10">
    <thead>
        <tr>
            <th>Price</th>
            <th>Quantity</th>
            <th>Purchase Cost</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input id="tab6" class="form-calc form-control form-cost mr-3" name="price" ></td>
            <td><input id="tab8" class="form-calc form-control form-qty" name="quantity"></td>
            <td><input id="tab11" class="form-calc form-line form-control" name="purchaseCost" readonly ></td>
        </tr>
    </tbody>
   </table>  
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="warehouse">Warehouse</label>
    <?php  populateDD("warehouse", "SELECT warehouse FROM `warhouse` order by warehouse", 0, "Select Warehouse")
   ?>
  </div>
  <div class="form-group  col-md-6">
    <label for="location">Location</label>
    <?php  populateDD("location", "SELECT location FROM `warhouse` order by location", 0, "Select Location")
   ?>
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="periods">Period (Years) of date</label>
      <input type="date" name="periods" class="form-control" id="inputCity" placeholder="periods">
    </div>
    <div class="form-group col-md-6">
      <label for="periods">Select Department</label>
      <?php  populateDD("departments", "SELECT departments FROM `departments` order by departments", 0, "Select departments")
   ?>
    </div>

  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Remark</label>
      <?php  populateDD("remark", "SELECT remark FROM `remark` order by remark", 0, "Select Remarks of the Item")
   ?>
    </div>
    <div class="form-group col-md-6">
    <div class="form-group">
    <label for="location">Rate</label>
    <input type="number" name="Rate" class="form-control" id="location" placeholder="location">
  </div>
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-2">
    <button type="submit" class="form-control btn btn-primary mt-3" name="new-asset">Add New Asset</button>
  </div>
  </div>
  </form>

</div>

</div>

<?php
include "includes/script.php";
include "includes/footer.php";
?>