<?php
include_once "includes/db.php";
include_once "includes/functions.php";
include "timezone.php";

require "vendor/phpmailer/phpmailer/Mail/phpmailer/PHPMailerAutoload.php";
// Include autoload.php file


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
if(isset($_POST['export_excel_btn']))
{
    $file_ext_name = $_POST['export_file_type'];
    $fileName = "student-sheet";

    $student = "SELECT * FROM registerasset";
    $query_run = mysqli_query($link, $student);

    if(mysqli_num_rows($query_run) > 0)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'department');
        $sheet->setCellValue('B1', 'Description');
        $sheet->setCellValue('C1', 'SerialNo');
        $sheet->setCellValue('D1', 'PO');
        $sheet->setCellValue('E1', 'categories');
        $sheet->setCellValue('F1', 'Class');
        $sheet->setCellValue('G1', 'Type');
        $sheet->setCellValue('H1', 'AccountNo');
        $sheet->setCellValue('I1', 'quantity');
        $sheet->setCellValue('J1', 'purchaseCost');
        $sheet->setCellValue('K1', 'location');
        $sheet->setCellValue('L1', 'Rate');
        $sheet->setCellValue('M1', 'periods');
        $sheet->setCellValue('N1', 'computedAccumDep');
        $sheet->setCellValue('O1', 'computedNBV');
        $sheet->setCellValue('P1', 'remark');

        $rowCount = 2;
        foreach($query_run as $data)
        {

            $sheet->setCellValue('A'.$rowCount, $data['department']);
            $sheet->setCellValue('B'.$rowCount, $data['Description']);
            $sheet->setCellValue('C'.$rowCount, $data['SerialNo']);
            $sheet->setCellValue('D'.$rowCount, $data['PO']);
            $sheet->setCellValue('E'.$rowCount, $data['categories']);
            $sheet->setCellValue('F'.$rowCount, $data['Class']);
            $sheet->setCellValue('G'.$rowCount, $data['Type']);
            $sheet->setCellValue('H'.$rowCount, $data['AccountNo']);
            $sheet->setCellValue('I'.$rowCount, $data['quantity']);
            $sheet->setCellValue('J'.$rowCount, $data['purchaseCost']);
            $sheet->setCellValue('K'.$rowCount, $data['location']);
            $sheet->setCellValue('L'.$rowCount, $data['Rate']);
            $sheet->setCellValue('M'.$rowCount, $data['periods']);
            $sheet->setCellValue('N'.$rowCount, $data['computedAccumDep']);
            $sheet->setCellValue('O'.$rowCount, $data['computedNBV']);
            $sheet->setCellValue('P'.$rowCount, $data['remark']);
            $rowCount++;
        }

        if($file_ext_name == 'xlsx')
        {
            $writer = new Xlsx($spreadsheet);
            $final_filename = $fileName.'.xlsx';
        }
        elseif($file_ext_name == 'xls')
        {
            $writer = new Xls($spreadsheet);
            $final_filename = $fileName.'.xls';
        }
        elseif($file_ext_name == 'csv')
        {
            $writer = new Csv($spreadsheet);
            $final_filename = $fileName.'.csv';
        }

        // $writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attactment; filename="'.urlencode($final_filename).'"');
        $writer->save('php://output');

    }
    else
    {

        header('Location: addnewasset.php');
        exit(0);
    }
}



//Delete Multiple Rows From MySQL Database with PHP

if(isset($_POST['checkedId']) && isset($_POST['deleteAll'])){
    $checkedId = $_POST['checkedId'];
    $deleteMsg=deleteMultipleData($link, $checkedId);
    header("location:records-table.php");
  
  }





extract($_POST);
if(isset($save)){

$inputData = [
'fullName' => validate($fullName) ?? "",
'gender'   => validate($gender) ?? "",
'email'    => validate($email) ?? "",
'mobile'   => validate($mobile) ?? "",
'address'  => validate($address) ?? "",
'city'     => validate($city) ?? "",
'state'    => validate($state)?? ""
];

$tableName= "developers";
$db = $link;
$result= insert_data($db, $tableName, $inputData);

}




if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $department = $row['0'];
                $Description = $row['1'];
                $SerialNo = $row['2'];
                $PO = $row['3'];
                $categories = $row['4'];
                $Class = $row['5'];
                $Type = $row['6'];
                $AccountNo = $row['7'];
                $quantity = $row['8'];
                $purchaseCost = $row['9'];
                $location = $row['10'];
                $Rate = $row['11'];
                $Periods = $row['12'];
                $computedAccumDep = $row['13'];
                $computedNBV = $row['14'];
                $remark = $row['15'];
         

                $query = "INSERT INTO registerasset (department,Description,SerialNo,PO,categories,Class,Type,AccountNo,quantity,purchaseCost,location,Rate,Periods,computedAccumDep,computedNBV,remark)
                 VALUES ('$department','$Description','$SerialNo','$PO','$categories','$Class','$Type','$AccountNo','$quantity','$purchaseCost','$location','$Rate','$Periods','$computedAccumDep','$computedNBV','$remark')";
                $result = mysqli_query($link, $query);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        if(isset($msg))
        {

            header('Location: addnewasset.php');
            exit(0);
        }
        else
        {
    
            header('Location: addnewasset.php');
            exit(0);
        }
    }
    else
    {

        header('Location: addnewasset.php');
        exit(0);
    }
}


//register user using an OTP

if(isset($_POST["register"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $department = $_POST['departments'];
    $usertype = $_POST['usertype'];
    $username = $_POST["username"];
    $role = $_POST['role'];
    $files = $_FILES['picture'];
    $filename = $files['name'];
    $filrerror = $files['error'];
    $filetemp = $files['tmp_name'];
    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));
    $check_query = mysqli_query($link, "SELECT * FROM login where email ='$email'");
    $rowCount = mysqli_num_rows($check_query);
    if($password === $repassword){
    if($filecheck){
    if(!empty($email) && !empty($password)){
        if($rowCount > 0){
            ?>
            <script>
                alert("User with email already exist!");
            </script>
            <?php
        }else{
            $destinationfile = '../img/'.$filename;
            move_uploaded_file($filetemp, $destinationfile);
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $repassword_hash = password_hash($repassword, PASSWORD_BCRYPT);
            $result = mysqli_query($link, "INSERT INTO login (email,username, password,repassword,usertype,role,departments,pic, status) VALUES
             ('$email', '$username','$repassword_hash','$password_hash', '$usertype','$role','$department','$destinationfile', 0)");

            if($result){
                $otp = rand(100000,999999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;
                $mail = new PHPMailer;

                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                $mail->Username='mowarzamedemo@gmail.com';
                $mail->Password='nkidmmsinyzcxdpu';

                $mail->setFrom('email account', 'OTP Verification');
                $mail->addAddress($_POST["email"]);

                $mail->isHTML(true);
                $mail->Subject="Your verify code";
                $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
                <br><br>
                <p>With regrads,</p>
                <b>Programming with Lam</b>
                https://www.youtube.com/channel/UCKRZp3mkvL1CBYKFIlxjDdg";

                        if(!$mail->send()){
                            ?>
                                <script>
                                    alert("<?php echo "Register Failed, Invalid Email "?>");
                                </script>
                            <?php
                        }else{
                            ?>
                            <script>
                                alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                                window.location.replace('verification.php');
                            </script>
                            <?php
                        }
            }
        }
        }
    } 
}
else{
    echo "Password and confirm password not matched";
    header("location: register.php");
}
}

//Verify OTP
if(isset($_POST["verify"])){
    $otp = $_SESSION['otp'];
    $email = $_SESSION['mail'];
    $otp_code = $_POST['otp_code'];

    if($otp != $otp_code){
        ?>
       <script>
           alert("Invalid OTP code");
       </script>
       <?php
    }else{
        mysqli_query($link, "UPDATE login SET status = 1 WHERE email = '$email'");
        ?>
         <script>
             alert("Verfiy account done, you may sign in now");
               window.location.replace("index.php");
         </script>
         <?php
    }

}


//Recover Password
if(isset($_POST["recover"])){
    $email = $_POST["email"];

    $sql = mysqli_query($link, "SELECT * FROM login WHERE email='$email'");
    $query = mysqli_num_rows($sql);
      $fetch = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql) <= 0){
        ?>
        <script>
            alert("<?php  echo "Sorry, no emails exists "?>");
        </script>
        <?php
    }else if($fetch["status"] == 0){
        ?>
           <script>
               alert("Sorry, your account must verify first, before you recover your password !");
               window.location.replace("login.php");
           </script>
       <?php
    }else{
        // generate token by binaryhexa 
        $token = bin2hex(random_bytes(50));

        //session_start ();
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        // h-hotel account
        $mail->Username='mowarzamedemo@gmail.com';
        $mail->Password='nkidmmsinyzcxdpu';

        // send by h-hotel email
        $mail->setFrom('email', 'Password Reset');
        // get email from input
        $mail->addAddress($_POST["email"]);
        //$mail->addReplyTo('lamkaizhe16@gmail.com');

        // HTML body
        $mail->isHTML(true);
        $mail->Subject="Recover your password";
        $mail->Body="<b>Dear User</b>
        <h3>We received a request to reset your password.</h3>
        <p>Kindly click the below link to reset your password</p>
        http://localhost/demoapp/reset_psw.php
        <br><br>
        <p>With regrads,</p>
        <b>Programming with Lam</b>";

        if(!$mail->send()){
            ?>
                <script>
                    alert("<?php echo " Invalid Email "?>");
                </script>
            <?php
        }else{
            ?>
                <script>
                    window.location.replace("notification.php");
                </script>
            <?php
        }
    }
}





//Reset Password
if(isset($_POST["reset"])){
    $psw = $_POST["password"];

    $token = $_SESSION['token'];
    $Email = $_SESSION['email'];

    $hash = password_hash( $psw , PASSWORD_DEFAULT );

    $sql = mysqli_query($link, "SELECT * FROM login WHERE email='$Email'");
    $query = mysqli_num_rows($sql);
      $fetch = mysqli_fetch_assoc($sql);

    if($Email){
        $new_pass = $hash;
        mysqli_query($link, "UPDATE login SET password='$new_pass' WHERE email='$Email'");
        ?>
        <script>
            window.location.replace("login.php");
            alert("<?php echo "your password has been succesful reset"?>");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("<?php echo "Please try again"?>");
        </script>
        <?php
    }
}



//login 
if(isset($_POST["login"])){
    $email_login = mysqli_real_escape_string($link, trim($_POST['email']));
    $password = trim($_POST['password']);

    $query_run = mysqli_query($link, "SELECT * FROM login where email = '$email_login'");
    $count = mysqli_num_rows($query_run);
    $usertypes = mysqli_fetch_array($query_run);
    $_SESSION['ROLE'] = $usertypes['role'];
    $_SESSION['user'] = $usertypes['username'];
        if($count > 0){
            $hashpassword = $usertypes["password"];

            if($usertypes["status"] == 0){
                    echo "Please verify email account before login.";
            }else if(password_verify($password, $hashpassword)){
                if($_SESSION['ROLE'] == 1)
                {
                    if($count>0){
                    $row=mysqli_fetch_assoc($query_run);
                    $_SESSION['username'] = $email_login;
                    $_SESSION['UID']=$usertypes['id'];
                    $time=time()+10;
                    $res=mysqli_query($link,"UPDATE login SET last_login='$time' WHERE id=".$_SESSION['UID']);
                    $time_joined = date("Y-m-d H:i:s",strtotime("now"));
                    $query = "INSERT INTO  `activity` (`time_logged`,`username`)VALUES('$time_joined','$email_login')";
                    $query_run = mysqli_query($link, $query);
                    header('Location: viewasset.php');
                    }
                }
                else if($_SESSION['ROLE'] == 2 )
                {
                    if($count>0){
                        $row=mysqli_fetch_assoc($query_run);
                        $_SESSION['username'] = $email_login;
                        $_SESSION['UID']=$usertypes['id'];
                        $time=time()+10;
                        $res=mysqli_query($link,"UPDATE login SET  last_login='$time' WHERE id=".$_SESSION['UID']);
                        $time_joined = date("Y-m-d H:i:s",strtotime("now"));
                        $query = "INSERT INTO  `activity` (`time_logged`,`username`)VALUES('$time_joined','$email_login')";
                        $query_run = mysqli_query($link, $query);
                        header('Location: viewasset.php');
                }
            }
            else if($_SESSION['ROLE'] == 3 )
            {
                if($count>0){
                    $row=mysqli_fetch_assoc($query_run);
                    $_SESSION['username'] = $email_login;
                    $_SESSION['UID']=$usertypes['id'];
                    $time=time()+10;
                    $res=mysqli_query($link,"UPDATE login SET  last_login='$time' WHERE id=".$_SESSION['UID']);
                    $time_joined = date("Y-m-d H:i:s",strtotime("now"));
                    $query = "INSERT INTO  `activity` (`time_logged`,`username`)VALUES('$time_joined','$email_login')";
                    $query_run = mysqli_query($link, $query);
                    header('Location: viewasset.php');
            }
            }
            }else{
                echo"email or password invalid, please try again.";
            }
        }
            
}


          
//add New warehouse and Location
if(isset($_POST['warehouse-location'])){
    $warehouse = $_POST['warehouse'];
    $location = $_POST['location'];
    


    $sql = "INSERT INTO `warhouse` (`warehouse`, `location`) 
    VALUES ('$warehouse','$location')";
          
          if(mysqli_query($link, $sql))
          {
          $_SESSION['added'] = "New asset is Added";
          header('Location: viewasset.php');  
      }


      else{
          $_SESSION['added'] = "Admin Profile Not Added";
          header('Location: viewasset.php');  
      }

}


//Delete Multiple

if(isset($_POST['delete-multiple'])){

        $id =1;
        $sql = "DELETE FROM registerasset WHERE visible = '$id'";
        $query_run = mysqli_query($link, $sql);
}








//add new asset
if(isset($_POST['new-asset'])){
    $Description = $_POST['Description'];
    $SerialNo = $_POST['SerialNo'];
    $PO = $_POST['PO'];
    $Class = $_POST['Class'];
    $categories = $_POST['categories'];
    $Type = $_POST['Type'];
    $AccountNo = $_POST['AccountNo'];
    $quantity = $_POST['quantity'];
    $purchaseCost = $_POST['purchaseCost'];
    $location = $_POST['location'];
    $warehouse = $_POST['warehouse'];
    $Rate = $_POST['Rate'];
    $price = $_POST['price'];
    $periods = $_POST['periods'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];




    $sql = "INSERT INTO `registerasset` (`Description`, `SerialNo`, `PO`, `Class`, `Type`, `AccountNo`, `quantity`, `purchaseCost`, `location`, `Rate`, `price`, `periods`, `remark`,`categories`,`status`,`warehouse`) 
    VALUES ('$Description','$SerialNo', '$PO', '$Class', '$Type','$AccountNo','$quantity','$purchaseCost','$location','$Rate','$price','$periods','$remark','$categories','Requested','$warehouse')";


        
            if(mysqli_query($link, $sql))
            {
            $_SESSION['added'] = "New asset is Added";
            header('Location: viewasset.php');  
        }


        else{
            $_SESSION['added'] = "Admin Profile Not Added";
            header('Location: viewasset.php');  
        }



}

/**if($_REQUEST['empid']) {
	$sql = "SELECT id, username, fname, email 
	FROM register 
	WHERE id='".$_REQUEST['empid']."'";
	$resultSet = mysqli_query($link, $sql);	
	$empData = array();
	while( $emp = mysqli_fetch_assoc($resultSet) ) {
		$empData = $emp;
	}
	echo json_encode($empData);
} else {
	echo 0;	
}
**/

if(isset($_POST['request-order']))
{    
    $id = $_POST['request_id'];
    $user = $_SESSION['cusername'];
    $Description = $_POST['Description'];
    $departments = $_POST['department'];
    $PO = $_POST['PO'];
    $Type = $_POST['Type'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $remaining = $_POST['remaining'];
    $purchaseCost = $_POST['purchaseCost'];
    $requested = $_POST['requested'];

  
    $sql = "INSERT INTO `requestasset` (`id`,`username`,`Description`, `departments`, `PO`, `Type`, `quantity`,`price`, `purchaseCost`, `requested`,`remaining`,`status`) 
    VALUES ('$i','$user','$Description','$departments', '$PO', '$Type','$quantity','$price','$purchaseCost','$requested','$remaining','Pending')";

    if(mysqli_query($link, $sql))
    {
        $_SESSION['added'] = "Your Data is Updated";
        header('Location: viewasset.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT Updated";
        header('Location: viewasset.php'); 
    }
}




//Request order

if(isset($_POST['request-order']))
{    
    $id = $_POST['request_id'];
    $Description = $_POST['Description']; 
    $departments = $_POST['department'];
    $PO = $_POST['PO'];
    $Type = $_POST['Type'];
    $quantity = $_POST['remaining'];
    $price = $_POST['price'];
    $purchaseCost = $_POST['purchaseCost'];
    $requested = $_POST['requested'];
    $remaining = $_POST['remaining'];
    $sql = "UPDATE `registerasset` SET `Description`='$Description',`department`='$departments',`PO`='$PO',`Type`='$Type',
    `quantity`='$quantity',`price`='$price',`purchaseCost`='$purchaseCost',`requested`='$requested',`remaining`='$remaining' ";

    if(mysqli_query($link, $sql))
    {
        $_SESSION['added'] = "Your Data is Updated";
        header('Location: viewasset.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT Updated";
        header('Location: viewasset.php'); 
    }
}


//Approve request

if(isset($_POST['approve-request']))
{
    $user = $_SESSION['username'];
    $id = $_POST['request_approve'];
    
    $query = "UPDATE `requestasset` SET `status`='Approved'";
    
    $query_run = mysqli_query($link, $query);
    

}




//change Pic


if(isset($_POST['change-profile']))
{
    $id = $_POST['edit_id'];
    $edit_pic = $_FILES['edit_picture']['name'];
    
    $query = "UPDATE `login` SET `pic`='$edit_pic' WHERE `id`='$id'";
    
    $query_run = mysqli_query($link, $query);
    if($query_run){
        move_uploaded_file($_FILES["edit_picture"]["tmp_name"], "img/".$_FILES["edit_picture"]["name"]);
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT Updated";
        header('Location: viewasset.php'); 
    }

}







//Recieve order

if(isset($_POST['recieve-order']))
{    
    $id = $_POST['edit_id'];
    $approvedBy = $_SESSION['username'];
    $status = $_POST['status'];
    $supplier = $_POST['supplier'];
    $recievedby = $_POST['recievedby'];
    $carriedBy = $_POST['carriedBy'];
    $checkedBy = $_POST['checkedBy'];
    $remark = $_POST['remark'];
    $location = $_POST['location'];
    $query = "UPDATE `orderasset` SET `supplier`='$supplier',`approvedBy`='$approvedBy',`status`='Recieved',`recievedby`='$recievedby',`carriedBy`='$carriedBy',
    `checkedBy`='$checkedBy',`remark`='$remark',`location`='$location' WHERE id='$id'";

    if(mysqli_query($link, $query))
    {
        $_SESSION['added'] = "Your Data is Updated";
        header('Location: ordereditems.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT Updated";
        header('Location: ordereditems.php'); 
    }
}

if(isset($_POST['recieve-order']))
{    
    $id = $_POST['edit_id'];

    $sql = "INSERT INTO `registerasset` (`Description`, `department`,`PO`,`type`, `quantity`, `price`, `purchaseCost`) SELECT  `Description`, `department`,`PO`,`type`,`quantity`,`price`,`purchaseCost` FROM `orderasset` WHERE status='Recieved';";

    if(mysqli_query($link, $sql))
    {
        $_SESSION['added'] = "Your Data is Updated";
        header('Location: ordereditems.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT Updated";
        header('Location: ordereditems.php'); 
    }
}




//update asset


if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $Description = $_POST['edit_Description'];
    $SerialNo = $_POST['edit_SerialNo'];
    $PO = $_POST['edit_PO'];
    $Class = $_POST['edit_Class'];
    $Type = $_POST['edit_Type'];
    $AccountNo = $_POST['edit_AccountNo'];
    $quantity = $_POST['edit_quantity'];
    $purchaseCost = $_POST['edit_purchaseCost'];
    $location = $_POST['edit_location'];
    $Rate = $_POST['edit_Rate'];
    $periods = $_POST['edit_periods'];
    $computedAccumDep= $_POST['edit_computedAccumDep	'];
    $computedNBV = $_POST['edit_computedNBV'];
    $remark = $_POST['edit_remark'];

    $query = "UPDATE registerasset SET Description='$Description' ,SerialNo='$SerialNo' ,PO='$PO' ,Class='$Class' ,Type='$Type' ,
    AccountNo='$AccountNo' ,quantity='$quantity' ,purchaseCost='$purchaseCost' ,location='$location' ,Rate='$Rate' ,
    periods='$periods' ,computedAccumDep='$computedAccumDep' ,computedNBV='$computedNBV' ,remark='$remark' WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['added'] = "Your Data is Updated";
        header('Location: viewasset.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT Updated";
        header('Location: viewasset.php'); 
    }
}







//delete a recorded asset

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM registerasset WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['notadded'] = "your data is deleted";
        header('Location: viewasset.php'); 
    }
    else
    {
        $_SESSION['notadded'] = "added";
        header('Location: viewasset.php'); 
    }    
}


//Update - User

if(isset($_POST['admin-user']))
{
    $id = $_POST['edit_user_id'];
    $query = "UPDATE `register` SET `usertype`='admin' WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);
    

}

if(isset($_POST['normal-user']))
{
    $id = $_POST['edit_user_id'];
    $query = "UPDATE `register` SET `usertype`='User' WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);
    

}


//logout 

if(isset($_POST['logout_btn']))
{
    session_destroy();
    header('Location: ../admindash/login.php');
}


//Approve order

if(isset($_POST['order-asset']))
{
    $id = $_POST['edit_id'];
    $query = "UPDATE `orderasset` SET `status`='pending' WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);
    

}


if(isset($_POST['approve-order']))
{
    $user = $_SESSION['username'];
    $id = $_POST['edit_id'];
    $query = "UPDATE `orderasset` SET `status`='Approved' WHERE approvedBy='$user' ";
    $query_run = mysqli_query($link, $query);
    

}

if(isset($_POST['cancel-order']))
{
    $id = $_POST['edit_id'];
    $query = "UPDATE `orderasset` SET `status`='Canceled' WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);
    

}


//delete a user

if(isset($_POST['delete-user']))
{
    $id = $_POST['edit_user_id'];

    $query = "DELETE FROM `register` WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['added'] = "Your Data is Deleted";
        header('Location: myprofile.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT DELETED";       
        header('Location: myprofile.php'); 
    }    
}



//add new department
if(isset($_POST['new-depart'])){
    $department = $_POST['departments'];
    $company = $_POST['company'];


    $sql = "INSERT INTO `departments` (`departments`,`company`) 
    VALUES ('$department','$company')";
    $query = mysqli_query($link, $sql);

        if($query){
            $_SESSION['added'] = "Registered addedfully";
    header("location: addnewdept.php");
        }


        else{
            $_SESSION['added'] = "Registeration Failed";
    header("location: addnewdept.php");
        }
}




if(isset($_POST['message-btn'])){
    $from_id = $_SESSION['username'];
    $to_id = $_POST['to_id'];
    $chat_id = $_POST ['edit_id'];
    $message = $_POST ['message'];
    $time=time()+10;
    $created_at = date("Y-m-d H:i:s",strtotime("now"));
    $sql =mysqli_query($link, "INSERT INTO `chats` (`chat_id`,`message`,`created_at`,`from_id`,`to_id`) 
    VALUES ('$chat_id','$message','$created_at','$from_id','$to_id')");
         if($sql){
            $_SESSION['added'] = "Registered addedfully";
    header("location: chatuser.php");
        }


        else{
            $_SESSION['added'] = "Registeration Failed";
    header("location: chatuser.php");
        }
}



//Order new asset
if(isset($_POST['order-asset'])){
    $count = count($_POST["Description"]);
    $id = $_POST["edit_id"];
    $user = $_SESSION['cusername'];
    $Description = $_POST['Description'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $purchaseCost = $_POST['purchaseCost'];
    $price = $_POST['price'];
    if($count > 0)
    {
        for($i=0; $i<$count; $i++)
        {
            if(trim($_POST["Description"][$i] != ''))
            {
                $sql =mysqli_query($link, "INSERT INTO `orderasset` (`id`,`username`,`Description`, `category`, `quantity`, `purchaseCost`,`price`) 
                VALUES ('$id','$user','$Description[$i]','$category','$quantity','$purchaseCost','$price')");
            }
        }
    echo "<script>alert('Skills inserted successfully');</script>";
    }
    else
    {
    echo "<script>alert('Please enter skill');</script>";
    }
    }

 

        




//delete an ordered asset
if(isset($_POST['delete-order']))
{
    $id = $_POST['edit_id'];

    $query = "DELETE FROM orderasset WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['added'] = "Your Data is Deleted";
        header('Location: ordereditems.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT DELETED";       
        header('Location: ordereditems.php'); 
    }    
}


//add new category

if(isset($_POST['add-category'])){
    $category = $_POST['category'];

    $sql = "INSERT INTO `category` (`category`) 
    VALUES ('$category')";
    $query = mysqli_query($link, $sql);

        if($query){
            $_SESSION['added'] = "Registered addedfully";
    header("location: addcategory.php");
        }


        else{
            $_SESSION['added'] = "Registeration Failed";
    header("location: addcategory.php");
        }

}



//add new item

if(isset($_POST['add-item'])){
    $itemType = $_POST['itemType'];

    $sql = "INSERT INTO `itemType` (`itemType`) 
    VALUES ('$itemType')";
    $query = mysqli_query($link, $sql);

        if($query){
            $_SESSION['added'] = "Registered addedfully";
    header("location: addcategory.php");
        }


        else{
            $_SESSION['added'] = "Registeration Failed";
    header("location: addcategory.php");
        }


}




//add new remark
if(isset($_POST['add-remark'])){
    $remark = $_POST['remark'];





    $sql = "INSERT INTO `remark` (`remark`) 
    VALUES ('$remark')";
    $query = mysqli_query($link, $sql);

        if($query){
            $_SESSION['added'] = "Registered addedfully";
    header("location: addcategory.php");
        }


        else{
            $_SESSION['added'] = "Registeration Failed";
    header("location: addcategory.php");
        }


}





//Update User

if(isset($_POST['update-user']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $firstname = $_POST['edit_fname'];
    $lastname = $_POST['edit_lname'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $repassword = $_POST['edit_repassword'];
    $usertype = $_POST['edit_usertype'];
if($password === $repassword);{
    $sql = "UPDATE `register` SET `username`='$username',`fname`='$firstname',`lname`='$lastname',`email`='$email',`password`='$password',
    `repassword`='$repassword',`usertype`='$usertype' WHERE id='$id'";
  $query = mysqli_query($link, $sql);

  if($query){
session_unset();
    $_SESSION['added'] = "Registered addedfully";
header("location: login.php");
}


else{
    $_SESSION['added'] = "Registeration Failed";
header("location: login.php");
}

}
}


//delete Item Type
if(isset($_POST['delete_item']))
{
    $id = $_POST['edit_id'];

    $query = "DELETE FROM itemtype WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['added'] = "Your Data is Deleted";
        header('Location: addcategory.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT DELETED";       
        header('Location: addcategory.php'); 
    }    
}

//delete category
if(isset($_POST['delete_cat']))
{
    $id = $_POST['edit_id'];

    $query = "DELETE FROM category WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        $_SESSION['added'] = "Your Data is Deleted";
        header('Location: addcategory.php'); 
    }
    else
    {
        $_SESSION['added'] = "Your Data is NOT DELETED";       
        header('Location: addcategory.php'); 
    }    
}

?>