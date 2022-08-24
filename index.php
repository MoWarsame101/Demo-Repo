<?php
include_once "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";

$time=time();
$res=mysqli_query($link,"SELECT * FROM register");
$msg='';

$sql = " SELECT SUM(price) AS SUM FROM `registerasset`";
$sql_query= mysqli_query($link, $sql);
while($row = mysqli_fetch_assoc($sql_query)){
    $output =$row['SUM'];
}
            ?>

      <div class="container-fluid">
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



<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

    
      <!-- Project Card Example -->
             <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Activity Log</h6>
                                </div>
                                <div class="card-body">
                                <table class="table table-striped table-bordered" style="height:5px;"  id="datatablesSimple">
                                <?php
                $query =  "SELECT `id`,`time_logged`,`username`FROM activity  order by id desc ";
                $query_run = mysqli_query($link, $query);



            ?>
            <thead>
               <tr>
                  <th>Username</th>
                  <th>Time Logged</th>
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
               <td><?php echo $row['username'];?></td>
               <td><?php echo 'You last login was &nbsp;'.date("d/m/y H:i:sA",strtotime($row['time_logged']));?></td>

               </tr>
			   <?php 
}
			   } ?>
            </tbody>
         </table>
                                </div>
                            </div>
                            
 
    </div>

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List of Online Users</h6>
            </div>
            <div class="card-body">

            <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th width="5%">ID</th>
                  <th width="30%">Image</th>
                  <th width="50%">Username</th>
                  <th width="15%">Status</th>
               </tr>
            </thead>
            <tbody id="user_grid">
			   <?php 
			   $i=1;
			   while($row=mysqli_fetch_assoc($res)){
			   $status='Offline';
			   $class="btn-danger";
			   if($row['last_login']>$time){
					$status='Online';
					$class="btn-success";
			   }
			   ?>	
               <tr>
                  <th scope="row"><?php echo $i?></th>
                  <td><?php echo $row['username']?></td>
                  <td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
               </tr>
			   <?php 
			   $i++;
			   } ?>
            </tbody>
         </table>
            
    </table>
            </div>
        </div>

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">????</h6>
            </div>
            <div class="card-body">
            </div>
        </div>

    </div>
</div>

<?php
                $query = "SELECT * FROM register";
                $query_run = mysqli_query($link, $query);
            ?>
<div class="row bg-white p-5 mb-5 shadow border-left-success ">
<?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                $status='User';
                                $class="btn-success";
                                if($row['usertype']== "admin"){
                                    $status='Admin';
                                    $class="btn-success";
                               }
                        ?>
                        
    <div class="col-md-3">
<div class="card" style="width: 15rem;"><center>
<?php	echo "<img src='img/".$row['pic']."' height = 80px width = 80px>"?>
  <div class="card-body">
    <h5 class="card-title"><?php  echo $row['username']; ?></h5>
<div>
  
<label for="">Department</label>
<?php  echo $row['departments']; ?>

</div>
<div>
<label for="">Usertype</label><br>
<button type="button" class="btn <?php echo $class?>"><?php echo $status?></button>
</div>

  </div>
  </center>
</div>
</div>


<?php
                            }
                        }
?>
</div>
</div>
</div>

<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>