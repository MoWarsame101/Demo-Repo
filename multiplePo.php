<?php
include_once "../admindash/includes/process.php";
include_once  "includes/functions.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
?>

<div class="card border-left-success m-5 shadow">
  <h5 class="card-header">Order New Item</h5>
  <div class="card-body ">
<form method="POST"  name="sample" action="multiplePO.php">
<input type="hidden" name="edit_id"  value="<?php echo $row['id'] ?>" >
<div class="form-row">
<div class="form-group col-md-6">
     <label for="">Description</label>
	  <input type="text"  name="Description[]" class="form-control" id="tab1"> 
</div>
<div class="form-group col-md-6">
   <label for="">PO</label>
   <input type="text" class="form-control" id="tab2">
</div>
   </div>
   <div class="form-row">
   <div class="form-group col-md-6">
<label for="">Category</label>
      <?php  populateDD("category", "SELECT category FROM `category` order by category", 0, "Select category")
   ?>
   </div>
<div class="form-group col-md-6">
<label for="">Type</label>
 <input type="text" class="form-control" id="tab4">
   </div>
   </div>
   <div class="form-row col-md-12">
   <div class="form-group col-md-12">
<label for="">Class</label>
<input type="number" class="form-control" id="tab5"> 
   </div>
   </div>
   <table id="order-entry" class="form-group col-md-10">
    <thead>
        <tr>
            <th>Price</th>
            <th>Additional Cost</th>
            <th>Quantity</th>
			<th>Discount Percentage</th>
            <th>Discount Amount</th>
            <th>Purchase Cost</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input id="tab6" class="form-calc form-control form-cost mr-3" name="price" ></td>
            <td><input id="tab7" class="form-calc form-control form-additional"   ></td>
            <td><input id="tab8" class="form-calc form-control form-qty" name="quantity"></td>
			<td><input id="tab9" class="form-calc form-control mr-3"  name="discount_percentage"></td>
            <td><input id="tab10" class="form-calc form-control"  name="discount_amount"></td>
            <td><input id="tab11" class="form-calc form-line form-control" name="purchaseCost" readonly ></td>
        </tr>
    </tbody>
   </table>  
   <div class="form-row">
   <div class="form-group col-md-12">
    <button type="button" class=" btn btn-primary mr-5 float-right" id="add" value="Add Data" onclick="addStudent();">Add Order</button>
    <input type="submit" name="order-asset" class="btn btn-success mr-5 float-right" value="submit">
			
   </div>
   </div>



   <div class="card card-outline card-success shadow m-5">
  <h5 class="card-header">Order List</h5>
  <div class="card-body ">
            <table id="tbl" class="table">
                <thead>
                <th>Description</th> 
                <th>PO</th>
                <th>Category</th>
                <th>Type</th>
				<th>Class</th>
                <th>Quantity</th>
				<th>Price</th>
                <th>Additional Cost</th>
				<th>Discount Percentage</th>
				<th>Discount Amount</th>
                <th>Purchase Cost</th>
				<th> Delete</th>
         
               
                </thead>
                
                 <tbody>
        
                 </tbody>

             </table>
		
</form>
  </div>
</div>
</div>


<?php
include "includes/script.php";
include "includes/footer.php";
?>