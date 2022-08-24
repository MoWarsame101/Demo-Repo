<?php
include_once  "includes/security.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
$time=time();
$res=mysqli_query($link,"SELECT * FROM register");
$msg='';
?>



               <?php
                $query = "SELECT * FROM register";
                $query_run = mysqli_query($link, $query);
            ?>
<div class="row bg-white p-5 mb-5 shadow border-left-success ">
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
<button type="button" class="btn  btn-sm <?php echo $class?>"><?php echo $status?></button>
<form action="chatuser.php" method="post" >
                                        <input type="hidden" name="chat_id" value="<?php echo $row['id']; ?>">
                                       <button class="btn btn-primary btn-sm" type="submit" name="chat_btn" data-toggle="tooltip" data-placement="top" title="Edit">Chat</button>
                                       
               
                                    </form>
</div>

  </div>
  </center>
</div>
</div>


<?php
                            }
                        
?>

 

          </div>
</div>
<?php
include_once  "includes/script.php";
include_once  "includes/footer.php";
?>