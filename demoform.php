<?php
include_once "includes/security.php";
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<div class="container">
 <div class="row bg-white">
   <div class="col-sm-4 m-5">
    <h3 class="text-primary">Custom function</h3>
    <p><?php echo !empty($result)? $result:''; ?></p>
       <!--=================HTML Form=======================-->
      <form method="post" >
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Full Name" name="fullName">
       </div>
     
     <div class="form-group">
       <div class="form-check-inline">
         <input type="radio" class="form-check-input" name="gender" value="male">Male
       </div>
      <div class="form-check-inline">
        <input type="radio" class="form-check-input" name="gender" value="female">Female
     </div> 
     </div>

        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email Address" name="email">
       </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Mobile Number" name="mobile">
       </div>

        <div class="form-group">
       
       <textarea class="form-control" name="address" placeholder="Address"></textarea>

       </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="City" name="city">
       </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="State" name="state">
       </div>
 
  <button type="submit"  name="save" class="btn btn-primary">Save</button>
  </form>
    <!--======================== HTML Form============================ -->
   </div>
   <div class="col-sm-8">
   
   </div>
   </div>
</div>
</div>
<?php
include_once "includes/script.php";
include_once "includes/footer.php";
?>