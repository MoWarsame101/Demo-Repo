<?php
include_once "includes/security.php";
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<?php
if(!empty($fetchFiles)){
  
  foreach($fetchFiles as $fileData){
   
   $allowFileExt = array('jpg','png','jpeg','gif');
      $fileExt = pathinfo($fileData['file_name'], PATHINFO_EXTENSION); 
$fileURL='uploads/'.$fileData['file_name'];
 if(in_array($fileExt, $allowFileExt)){ 
    
    $imgURL='uploads/'.$fileData['file_name'];
    ?>
    <div class="images">
        <table class="table table-striped">
            <tr>
                <th>File</th>
            </tr>
            <tr>
                <td>    <img src="<?php echo $fileURL ?>"></td>
            </tr>

    </table>
    </div>
    <?php
 
}else{
?>

      <div class="files">
        <p>Download Now</p>
       <a href='<?php echo $fileURL ?>' class="btn btn-primary"><?php echo $fileExt; ?>Download Now</a>
   </div>
  
  <?php
}
 }


 }

?>
</div>
<?php
include_once "includes/script.php";
include_once "includes/footer.php";
?>