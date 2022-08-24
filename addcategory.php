<?php
include_once "includes/security.php";
include "includes/header.php";
include "includes/navbar.php";
?>
<div class="container-fluid bg-white pt-2 pb-5">
<div class="card border-left-success  ml-5 mr-5 mt-5">
  <h5 class="card-header">Add New Category</h5>
  <div class="card-body">
<form action="addcategory.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Category</label>
      <input type="text" name="category" class="form-control" id="inputEmail4" placeholder="Description">
    </div>
  </div>
  <button type="submit" name="add-category" class="btn btn-primary">Add new Category</button>
</form>
  </div>
</div>
<div class="card border-left-success   ml-5 mr-5 mt-5">
  <h5 class="card-header">Category List</h5>
  <div class="card-body">


  <table id="datatablesSimple" class="table " style="width:100%">
  <?php
                $query = "SELECT * FROM category";
                $query_run = mysqli_query($link, $query);
            ?>
        <thead>
            <tr>
                
                <th>Category</th>
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
                               
                                <td><?php  echo $row['category']; ?></td>
    
                <td> 
         
                                    <form action="addcategory.php" method="post" >
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-success btn-sm rounded-0" type="submit" name="edit_btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                       <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-danger btn-sm rounded-0" type="submit"   name="delete_cat"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
               
                                    </form>
                                </td>
          
            <?php
                            }
                        }
            ?>
             </tr>
            
    </table>

    </div>
    </div>
    </div>
 
    <div class="container-fluid bg-white pt-2 pb-5">
<div class="card border-left-success  ml-5 mr-5 mt-5">
  <h5 class="card-header">Add New Item Type</h5>
  <div class="card-body">
  <form action="addcategory.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Item Type</label>
      <input type="text" name="itemType" class="form-control" id="inputAddress" placeholder="Item Type">
    </div>
  </div>
  <button type="submit" name="add-item" class="btn btn-primary">Add new Item Type</button>
</form>
  </div>
</div>
<div class="card border-left-success   ml-5 mr-5 mt-5">
  <h5 class="card-header">Category List</h5>
  <div class="card-body">


  <table id="datatablesSimple" class="table " style="width:100%">
  <?php
                $query = "SELECT * FROM itemtype";
                $query_run = mysqli_query($link, $query);
            ?>
        <thead>
            <tr>
                
                <th>Category</th>
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
                               
                                <td><?php  echo $row['itemType']; ?></td>
    
                <td> 
         
                                    <form action="addcategory.php" method="post" >
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-success btn-sm rounded-0" type="submit" name="edit_btn" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
                                       <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-danger btn-sm rounded-0" type="submit"   name="delete_item"  data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
               
                                    </form>
                                </td>
          
            <?php
                            }
                        }
            ?>
             </tr>
            
    </table>

    </div>
    </div>
</div>



<div class="container-fluid bg-white pt-2 pb-5">
<div class="card border-left-success  ml-5 mr-5 mt-5 mb-5">
  <h5 class="card-header">Add New Item Remark</h5>
  <div class="card-body">
  <form action="addcategory.php" method="POST">
  <div class="form-row">
  <div class="form-group  col-md-4">
    <label for="inputAddress2">Remark</label>
    <input type="text" name="remark" class="form-control" id="inputAddress2" placeholder="Remark">
  </div>
  </div>
  <button type="submit" name="add-remark" class="btn btn-primary">Add new Item Remark</button>
</form>
  </div>
</div>
</div>



</div>
<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>