<?php
include_once "includes/db.php";
include "includes/header.php";
include "includes/navbar.php";

if(isset($_POST['chat_btn']))
{
    $id = $_POST['chat_id'];
    
    $time=time();
    $res=mysqli_query($link,"SELECT * FROM register WHERE id='$id'");
    $chats=mysqli_query($link,"SELECT * FROM `chats` WHERE chat_id='$id'");
    $msg='';
?>
<center>
<div class="card shadow" style="width: 780px;height:550px;">
    <div class="card-header">
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
        
          
       <div class="float-left"><?php	echo "<img src='img/".$row['pic']."' height = 40px width = 40px>"?></div>  <h5 class="float-left"></h5><?php echo $row['fname'];?>
  <button type="button" class="btn  btn-sm float-right <?php echo $class?>"><?php echo $status?></button>

  </div>
  <div class="card-body">
  <?php

if(isset($_POST['chat_btn']))
{
    $id = $_POST['chat_id'];
    
    $query = "SELECT * FROM register WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    foreach($query_run as $row)
    {
        ?>
          
  <form action="chatuser.php" method="POST">

  <div class="input-group mb-3">
  <div class="shadow p-4 rounded
    	               d-flex flex-column
    	               mt-2 chat-box"
    	        id="chatBox">
    	    
           
						<p class="rtext align-self-end
						        border rounded p-2 mb-1">
                                <?php
                        if(mysqli_num_rows($chats) > 0)        
                        {
                            while($chat = mysqli_fetch_assoc($chats))
                            {
                        ?>
						    <?=$chat['message']?> 
						    <small class="d-block">
						    	<?=$chat['created_at']?>
						    </small>      	
						</p>
          
			<?php 
                            }
                        }
            ?>

    	   </div>
           <input type="hidden" name="to_id">
    	   	   <textarea cols="3"
    	   	            name="message"
    	   	             class="form-control"></textarea><br>
    	   	   <button type="submit" class="btn btn-primary" name="message-btn"> <i class="fa fa-paper-plane"></i> </button>
    	   </div>
           </form>
           </div>
           
               </div>
               <?php
                }
            }}}
        ?>
               </center>
           
       
  </div>


      



<?php
include "includes/script.php";
include "includes/footer.php";
?>