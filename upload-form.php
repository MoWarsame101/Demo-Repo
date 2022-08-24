<?php
include_once "includes/security.php";
include_once "includes/header.php";
include_once "includes/navbar.php";
?>
<div class="upload-form bg-white m-5">
    <a href="display-files.php" class="btn btn-primary float-right">Diplay Files</a>
<form  method="post" enctype="multipart/form-data">
    <input type="file" name="file_name[]" multiple>
    <input type="submit" value="Upload File" name="submit">
</form>
</div>
</div>
<?php
include_once "includes/script.php";
include_once "includes/footer.php";
?>