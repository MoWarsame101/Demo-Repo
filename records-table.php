<?php
include_once  "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
?>
<div class="container">
 <div class="row">
   <div class="col-sm-8">
    <h3 class="text-danger text-center">Delete Multiple Records with Checkbox in PHP</h3>
    <p><?php echo $deleteMsg??'';?></p>
    <div class="table-responsive">
   <form method="post" id="deleteForm">
      <table class="table table-bordered table-striped ">
       <thead><tr><th>S.N</th>

         <th>Full Name</th>
         <th>Gender</th>
         <th>Email</th>
         <th>City</th>
         
    </thead>
    <tbody class="checkbox-group">
  <?php

      if(count($fetchData)>0){      
      foreach($fetchData as $data){
    ?>
      <tr>
      <td><input type="checkbox" name="checkedId[]" value="<?php echo $data['id']??''?>"></td>
      <td><?php echo $data['fullName']??''; ?></td>
      <td><?php echo $data['gender']??''; ?></td>
      <td><?php echo $data['email']??''; ?></td>
      <td><?php echo $data['city']??''; ?></td>
      
     </tr>
     <?php
      }}else{ ?>
      <tr>
        <td colspan="8">
        <?php echo "No Data Found"; ?>
        </td>
      <tr>
    <?php }?>
     </tbody>
    <?php 
    if(count($fetchData)>0){  
    ?>
     <tfoot>
    <tr>
      <td><input type="checkbox" id="singleCheckbox" ></td>
      <td class="text-danger">Check All</td>
      <td colspan="7"><input type="submit" name="deleteAll" value="Delete All" class="bg-danger text-light"></td>
    </tr>
     <tfoot>
     <?php } ?>
     </table>
   </tfoot>
   </div>
</div>
</div>
</div>
</div>
<?php
include_once "includes/script.php";
include_once "includes/footer.php";
?>