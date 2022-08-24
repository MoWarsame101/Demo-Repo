<?php
/*
  get_currency_prefix();
  open_popup();
  show_db_error();
  insert($query)
  getResultSet($query)
  getOneValueFromDb($query);
 * sendsms($number)
 * alert();
 * calc_time_diff(timestamp)
 * get_title();
 * authenticate()
 * authorize();
 * redirect();
 * populateDD($DDName,$query, $column_number)
 * showDynamicMenu()
 * show_all_menus();
 * show_empty_error_msg($element)
 * show_success_msg($message);
 * current_date();
 * list_groups()
 * show_menus_for_group($gid)
 * delete_old_permissions($gid)
 * submenu($searchLabel);
 * changeGenderRBState()
 * prepare_print()
 * report_header();
 */
include_once("includes/db.php");

/*
 * Global variables Declarations
 * 
 */










//Delete Multiple Rows From MySQL Database with PHP
$fetchData = fetch_data($link);

function fetch_data($link){
  $query = "SELECT id, fullName, gender, email, city FROM developers ORDER BY id DESC";
  $result = $link->query($query);

   if ($result->num_rows > 0) {
      $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
      $data= $row;
   } else {
      $data= []; 
   }
     return $data;
}

function deleteMultipleData($link, $checkedId){
  
$checkedIdGroup = implode(',', $checkedId);
$query = "DELETE FROM developers WHERE id IN ($checkedIdGroup)";
$result = $link->query($query);
if($result==true){
  return "Selected data was deleted successfully";
  header("location:records-table.php");
}

}






//Fetch Data using custom functions





// Check if Email is already Exist

function checkEmail($link, $emailInput){

  $query = "SELECT email FROM register WHERE email='$emailInput'";
  $result = $link->query($query);
  if ($result->num_rows > 0) {
    echo "<span style='color:red'>This Email is alredy exists </span>";
  }
}








// Insert Data using Custom Functions
function insert_data($db, $tableName, $inputData){

    $data = implode(" ",$inputData);
   if(empty($db)){
    $msg= "Database connection error";
   }elseif(empty($tableName)){
     $msg= "Table Name is empty";
   }elseif(trim( $data ) == ""){
     $msg= "Empty Data not allowed to insert";
   }else{
   
       $query  = "INSERT INTO ".$tableName." (";
       $query .= implode(",", array_keys($inputData)) . ') VALUES (';
       $query .= "'" . implode("','", array_values($inputData)) . "')";
       $execute= $db->query($query);
      if($execute=== true){
     $msg= "Data was inserted successfully";
    }else{
     $msg= mysqli_error($db);
    }
   }
    return $msg;
   
   }
   
   function validate($value) {
     $value = trim($value);
     $value = stripslashes($value);
     $value = htmlspecialchars($value);
     return $value;
   }
   



//Upload Multiple Files
$db=$link; // Enter your Connection variable;
$tableName='files'; // Enter your table Name;

// fetching files from database
$fetchFiles=fetch_files($tableName);

// uploading files on submit
if(isset($_POST['submit'])){ 

    //  uploading files
    echo upload_files($tableName); 
}



  function upload_files($tableName){
   
    $uploadTo = "uploads/"; 
    $allowFileExt = array('jpg','png','jpeg','gif','pdf','doc','csv','zip');
    $fileName = array_filter($_FILES['file_name']['name']);
    $fileTempName=$_FILES["file_name"]["tmp_name"];
    $tableName= trim($tableName);
    if(empty($fileName)){ 
       $error="Please Select files..";
       return $error;
     }else if(empty($tableName)){
       $error="You must declare table name";
       return $error;
     }else{
    
     $error=$storeFilesBasename='';

    foreach($fileName as $index=>$file){
         
    $fileBasename = basename($fileName[$index]);
    $filePath = $uploadTo.$fileBasename; 
    $fileExt = pathinfo($filePath, PATHINFO_EXTENSION); 

    if(in_array($fileExt, $allowFileExt)){ 

        // Upload file to server 
        if(move_uploaded_file($fileTempName[$index],$filePath)){ 
        
         // Store Files into database table
         $storeFilesBasename .= "('".$fileBasename."'),"; 
          
         }else{ 
         $error = 'File Not uploaded ! try again';

         } 

     }else{

       $error .= $_FILES['file_name']['name'][$index].' - file extensions not allowed<br> ';

     }
    }

    store_files($storeFilesBasename, $tableName);
  }

    return $error;
}
    // File upload configuration 

    function store_files($storeFilesBasename, $tableName){
      global $db;
      if(!empty($storeFilesBasename))
      {
      $value = trim($storeFilesBasename, ',');


       $store="INSERT INTO ".$tableName." (file_name) VALUES".$value;

      
      $exec= $db->query($store);
       if($exec){
       

         
       }else{
        echo  "Error: " .  $store . "<br>" . $db->error;
       }
      }
    }
   
      
      // fetching padination data
function fetch_files($tableName){
   global $db;
   $tableName= trim($tableName);
   if(!empty($tableName)){
  $query = "SELECT * FROM ".$tableName." ORDER BY id DESC";
  $result = $db->query($query);

if ($result->num_rows > 0) {
    $row= $result->fetch_all(MYSQLI_ASSOC);
    return $row;       
  }else{
    

  }
}else{
  echo "you must declare table name to fetch files";
}
}   
    







function get_currency_prefix($hub) {
    $query = "SELECT currency FROM `hubs` where name = '$hub' LIMIT 1 ";
    list($prefix) = @mysqli_fetch_array(mysqli_query($GLOBALS['link'], $query));
    return $prefix;
}

function open_popup() {
    ?>
    <script>
        // When the user clicks on <div>, open the popup
        function popup() {
            window.open('report_view.php', '', 'toolbar=no,status=no,scrollbars=yes,resizable=yes,top=200,left=200,width=800,height=400');
        }
        popup();
    </script>
    <?php
}

function show_db_error() {
    $error = mysqli_error($GLOBALS['link']);
    return $error;
}

function insertQuery($query) {
    $result = mysqli_query($GLOBALS['link'], $query);
    return $result;
}

function getResultSet($query) {
    $resultset = mysqli_query($GLOBALS['link'], $query);
    return $resultset;
}

function getOneValueFromDb($query) {
    list($value) = @mysqli_fetch_array(mysqli_query($GLOBALS['link'], $query));
    return $value;
}

function getBalance() {
    $balanceURL = "https://api.1s2u.io/checkbalance?user=smsame305a020&pass=web3704";
    $ch = curl_init();

    // set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $balanceURL);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    // grab URL and pass it to the browser
    $response = curl_exec($ch);

    // close cURL resource, and free up system resources
    curl_close($ch);

    return $response;
}

function sendsms($number, $message, $reference) {
//build sms sending URL
//$url = "https://computer-land.net/bulksms?customer=HudHudExprs&&to=$number&&msg=$message";
    $url = "https://api.1s2u.io/bulksms?username=smsame305a020&password=web3704&mno=$number&sid=HudHudExprs&msg=$message";
    //echo $url;
//https://api.1s2u.io/bulksms?username=smsame305a020&password=web3704&mno=$number&sid=HudHudExprs&msg=$message&mt=0&fl=0
//$url = "https://esahal.com/hudhud2353/sms.php?acct=hudhud2353&user=hudhudapi&password=fEI4zf9peJ&ref=$reference&to=$number&msg=$message";
    //echo "<b>".$url."</b><br><br>";
// create a new cURL resource
    $ch = curl_init();

// set URL and other appropriate options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
    $response = curl_exec($ch);

// close cURL resource, and free up system resources
    curl_close($ch);
    return $response;
}

function alert($msg) {
    ?>
    <script type="text/javascript">
        alert("<?php echo $msg; ?>");
    </script>
    <?php
}

function calc_time_diff($tstamp) {
    //get the saved timestamp from saacad coloumn
//$tstamp = $myrow['saacad'];
    //$tstamp = "1339321459";
//$goorta = @date('H:i:s - - d-m-Y', $tstamp);
//echo $goorta;
//echo time();
    $ts = @getdate($tstamp);
    $om = $ts['minutes'];
    $oh = $ts['hours'];
    $os = $ts['seconds'];
    $omd = $ts['mday'];
    $omo = $ts['mon'];
    $oy = $ts['year'];

    $nts = time();
//$ntsnew = time();
//extract date and time information from the timestamp using getdate() function
    $nts = @getdate($nts);
    $nm = $nts['minutes'];
    $nh = $nts['hours'];
    $ns = $nts['seconds'];
    $nmd = $nts['mday'];
    $nmo = $nts['mon'];
    $ny = $nts['year'];

//get differences
    $yeardiff = $ny - $oy;
    $monthdiff = $nmo - $omo;
    $daydiff = $nmd - $omd; //newMonthDay - oldMonthDay
    $hourdiff = $nh - $oh;
    $mindiff = $nm - $om;
    $secdiff = $ns - $os;

//presenting the time difference between articles
    if ($ny == $oy && $nmo == $omo && $nmd == $omd && $nh == $oh) {
        $mindiff = $nm - $om;
        if ($mindiff == 0) {
            echo "haddadan";
        } else {
            echo "$mindiff mirirr ka hor";
        }
    }

    if ($ny == $oy && $nmo == $omo && $nmd == $omd && $nh != $oh) {
        //$hourdiff = $nh - $oh;
        //$mindiff = $nm - $om;
        if ($hourdiff == 1 && $mindiff == 0) {
            echo "hal saac ka hor ";
        }
        if ($hourdiff == 1 && $mindiff > 0) {
            echo "hal saac iyo $mindiff  mirir ka hor";
        }
        if ($hourdiff > 1 && $mindiff > 0) {
            echo "$hourdiff saacadood ";
        }
        if ($hourdiff > 1 && $mindiff > 0) {
            echo "iyo $mindiff mirir ka hor";
        }
        if ($mindiff == 0 && $hourdiff > 1) {
            echo "$hourdiff saacadood ka hor";
        }
        if ($mindiff < 0) {
            $mindiff = $nm + (60 - $om);
            $hourdiff -= 1;
            if ($hourdiff == 0) {
                echo "$mindiff mirir ka hor</small>";
            } elseif ($hourdiff == 1) {
                echo "saacad iyo $mindiff mirir ka hor";
            } else {
                echo "$hourdiff </b>saacadood iyo<b> " . $mindiff . " </b>mirir ka hor</small>";
            }
        }
    }
}

function get_title() {
    
}

function authenticate($returnUrl) {
    $link = $GLOBALS['link'];
    //has a session being initiated previously ?
    if (!isset($_SESSION['username'])) {
        //if no previous session, has the user submitted the form?
        if (isset($_POST['username']) && $_POST['username'] != '') {
            //echo "u and p provided";
            $username = $_POST["username"];
            $password = $_POST['password'];

            //look for the user in the users table
            $query = "SELECT Id, FullName, Phone as username, Company, Supervisor, GroupId FROM employees WHERE phone='$username' AND password=md5('$password') AND status = 'Active'";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            //Has the user been located?

            if (mysqli_num_rows($result) == 0) {
                //echo "Invalid username and password.";
                //redirect("login.php?u=$username&&ac=r&&return=$returnUrl");
                redirect("login.php?action=wrong");
                echo "<div id='invalid_username'>Invalid username/password combination.</div>";
            }

            if (mysqli_num_rows($result) == 1) {
                //the user is valid user, so give him/her a session
                /*
                  $_SESSION['username'] = mysqli_result($result, 0, "UserName");
                  $_SESSION['groupID'] = mysqli_result($result, 0, "GroupId");
                  $_SESSION['groupName'] = mysqli_result($result, 0, "GroupName"
                 */
                while ($row = mysqli_fetch_array($result)) {
                    //var_dump($row);
                    $_SESSION['Id'] = $row["Id"];
                    $_SESSION['FullName'] = $row["FullName"];
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['groupId'] = $row['GroupId'];
                    $_SESSION['Phone'] = $row['username'];
                    $_SESSION['Company'] = $row['Company'];
                    $_SESSION['Supervisor'] = $row['Supervisor'];
                    //$_SESSION['groupName'] = $row['GroupName'];
                }
                return true;
            }

            //if the user has not previously logged in, show the login form
        } //this closes the if that checks if a user has a session.
     
    }
}

function authorize() {
    $page = get_page_name();
    $result = mysqli_query($GLOBALS['link'], "SELECT MenuID FROM  menu where MenuURL = '$page'");
    list($menuID) = mysqli_fetch_array($result);
    $result = mysqli_query($GLOBALS['link'], "SELECT permissionID FROM permissions where MenuID = '$menuID' AND GroupId = '" . $_SESSION['groupId'] . "'");
    if (mysqli_num_rows($result) == 0) {
        //echo "you are not authorized to view $page";
        if ($page != 'index.php') {
            redirect("unauthorized.php");
        }
    }
}

$topLevelMenuCounter = 0;

function showDynamicMenu() {

if ($_SESSION["username"] == 'admin' || $_SESSION["groupId"] == '1' || $_SESSION["groupId"] == '2') {
        $query = "
  select MenuID, MenuName, MenuURL, icon
  FROM menu
  where `show` = 'yes' 
    ORDER BY DisplayOrder ASC
";
    } else {
        $groupId = $_SESSION['groupId'];
        $query = "SELECT MenuID ,MenuName, MenuURL ,icon FROM menu WHERE MenuID IN (SELECT MenuID FROM permissions WHERE GroupID = $groupId)";
            /*$query = "
        SELECT MenuID
      ,MenuName
      ,icon
  FROM menu
  WHERE MenuID IN (
  SELECT DISTINCT FLOOR(p.MenuID/100) as MenuID
  FROM permissions p JOIN menu m
  on p.MenuID = m.MenuID
  WHERE p.GroupId = " . $_SESSION['groupId'] . " 
      and `show` = 'yes' 
  ) order by MenuID"; */
    }
    //echo $query;
    $result = mysqli_query($GLOBALS['link'], $query);
    while ($menu = mysqli_fetch_array($result)) {
        //var_dump($menu);
        if($menu["MenuName"] == "Dashboard") {
            continue;
        }
        ?>
            <?php
            if($menu["MenuURL"] != "") {
                echo "<li>";
                echo "<a href='" . $menu["MenuURL"] . "'>";
            } else {
                echo "<li class='active'><a>";
            }
            ?>
            <i class="<?php echo $menu["icon"]; ?>"></i>
            <?php
                echo $menu["MenuName"];
                if($menu["MenuURL"] != "") {
                    echo "</a>";
                    echo "<li>";
                } else {
                    echo "</a></li>";
                }
            ?>
            <?php
        }
    }

    function redirect($url) {
        ?>
        <script type="text/javascript">
            window.location = "<?php echo $url; ?>"
        </script>
        <?php
    }

    function populateDD($DDName, $query, $column_number, $placeholder, $selectedOption = "default") {
        //the $extraOption is used to receive extra select option, eg. All employees option
        //if you want a specific item to be pre selected, just pass the item name as fifth parameter of $selectedOption
        ?><select class="form-control" name = "<?php echo $DDName; ?>" id="<?php echo $DDName; ?>">
            <option><?php echo $placeholder; ?></option>
            <?php
            if ($selectedOption != "default") {
                $selectedFlag = "selected";
            }
            ?>

            <?php
            //$query = "SELECT $column FROM $table order by SchoolID ASC";
            $result = mysqli_query($GLOBALS['link'], $query);
            while ($row = mysqli_fetch_array($result)) {
                if ($row[$column_number] == $selectedOption) {
                    $selectedFlag = "selected";
                } else {
                    $selectedFlag = "";
                }
                echo "<option $selectedFlag>" . $row[$column_number] . "</option>";
            }
            echo "</select>";
        }

        function get_page_name() {
            if (strpos(basename($_SERVER["REQUEST_URI"]), "?")) {
                $page = substr(basename($_SERVER["REQUEST_URI"]), 0, strpos(basename($_SERVER["REQUEST_URI"]), "?"));
                return $page;
            } else {
                $page = basename($_SERVER["REQUEST_URI"]);
                return $page;
            }
        }

        function show_all_menus() {
            $query = "SELECT 
                        MenuID
                       ,MenuName
                       ,ParentID
                       FROM menu
                       Where ParentID = 0
                        ";
            $result = mysqli_query($GLOBALS['link'], $query);
            //echo "Q1 = " . $query;
            while ($row = mysqli_fetch_array($result)) {
                echo "<strong>" . $row["MenuName"] . "</strong><br />";
                $query2 = "
                SELECT 
                        MenuID
                       ,MenuName
                       ,ParentID
                       ,MenuURL
                       FROM menu
                       Where ParentID = " . $row['MenuID'] . " 
                ";
                //echo "Q2 = " . $query2;
                $result2 = mysqli_query($GLOBALS['link'], $query2);
                while ($row2 = mysqli_fetch_array($result2)) {
                    ?>
                    ------ <input type="checkbox" name="<?php echo $row2['MenuID']; ?>" value="<?php echo $row2['MenuID']; ?>" />
                    <?php
                    echo $row2["MenuName"] . "<br />";
                }
            }
        }

        function show_empty_error_msg($element) {
            if (isset($_POST["submit"]) && $_POST[$element] == '') {
                echo "<span class='red'>*</span>";
            }
        }

        function show_success_msg($message) {
            ?>
            <div id='sucessMessage'>
                <?php
                echo $message;
                //alert("school info updated succesfully");
                ?>  <span id="close" onclick="document.getElementById('sucessMessage').style.visibility = 'hidden'">Close</span>
            </div>
            <?php
        }

        function current_date() {
            return @date("Y-m-d"); /* save the current date in the format of yyyy-mm-dd to variable $current_date */
        }

        function list_groups() {
            echo "<table border='1' cellpadding=5 cellspacing=0>";
            $result_list_groups = mysqli_query($GLOBALS['link'], "SELECT GroupId ,GroupName FROM groups");
            while ($row = mysqli_fetch_array($result_list_groups)) {
                //we don't want to edit permission for administrators
                //bacause admins have all permissions, 
                //if you want to change the permission of an admin
                //start with changing his group first. then give
                //new permissions to that new group
                if ($row['GroupName'] == 'Administrators') {
                    continue;
                }
                echo "<tr><td  style='background-color: silver;'><a href='?gid=$row[0]&&gname=$row[1]'>Edit permissions for group: </a></td><td>" . $row[1] . "</td></tr>";
            }
            echo "</table>";
        }

        function show_menus_for_group($gid) {
            // $stack_top_level_menus = array();
            $TopLevelMenuID = array();
            $query_list_permissions = "SELECT 
  p.MenuID as MenuID
  , m.MenuName
  , m.MenuURL
  ,'given' as status
  FROM permissions p JOIN menu m
  on p.MenuID = m.MenuID
  WHERE p.GroupId = '$gid'
  
  UNION
  
  SELECT MenuID
      ,MenuName
      ,MenuURL
      ,'other menus' as status
  FROM menu";

            //echo $query_list_permissions;
            $result = mysqli_query($GLOBALS['link'], $query_list_permissions);
            while ($row = mysqli_fetch_array($result)) {
                /*
                 * The above SQL query retreives menus, but, unfortunately
                 * it brings duplicate menus also, though i used UNION operator
                 * which does not bring duplicates.
                 * so to remove duplicates i used this PHP trick, which
                 * saves the id of the last row displayed, and then, does not display
                 * the next row if it has the same row as the last one.
                 */
                //if (@$last_row_id == $row['MenuID']) {
                  //  continue;
                //}

                //if ($row['MenuID'] < 100) {
                    //store top level menu IDs in array $TopLevelMenuID
                  //  $TopLevelMenuID[] = $row['MenuID'];
                    //and don't display any thing then
                    //continue;
                //}
                /*
                 * The following logic Display a top level menu name
                 * for submenus
                 * i first created an empty array called $TopLevelMenuID
                 * then i stored the IDs  of menus whose id is less than 100, which are, 
                 * top level menus in that array.
                 * 
                 * then for each submenu display, search the submenu id divided by
                 * 100 in the array $TopLevelMenuID.
                 * if found, then a top level menu name for the submenu is found.
                 * 
                 * then send the id of the top level menu to the database to retreive the 
                 * top level menu name
                 */
                if (in_array($row['MenuID'] / 100, $TopLevelMenuID)) {
                    $resultTopLeveLMenuName = mysqli_query($GLOBALS['link'], "SELECT MenuName FROM menu where MenuID = " . $row['MenuID'] / 100);
                    list($TopLevelMenuName) = mysqli_fetch_array($resultTopLeveLMenuName);
                    //$row[MenuID]/100;
                    echo "<b>" . $TopLevelMenuName . "</b><br>";
                }
                if ($row['status'] == 'given') {
                    ?>
                    --- <input type="checkbox" name="<?php echo $row['MenuID']; ?>" value="<?php echo $row['MenuID']; ?>" checked="checked"/> 
                    <?php
                }
                if ($row['status'] == 'other menus') {
                    ?>
                    --- <input type="checkbox" name="<?php echo $row['MenuID']; ?>" value="<?php echo $row['MenuID']; ?>" /> 
                    <?php
                }
                echo $row['MenuID'] . " - " . $row['MenuName'] . "<br />";
                //$color = 'black';
                $last_row_id = $row['MenuID'];
            }
        }

        function delete_old_permissions($gid) {

            $queryDeleteOldPermissions = "
                            DELETE FROM permissions
                            WHERE GroupId = '$gid'
                            ";
            echo $queryDeleteOldPermissions;
            mysqli_query($GLOBALS['link'], $queryDeleteOldPermissions);
        }

        function submenu($searchLabel, $extraParam = "notSelectable", $searchFieldInitValue = "Enter Name, ID, or Phone") {
            //$extraParam = Selectable if you want a select link to appear at the begining of each row
            ?> 
            <table border="0" cellspacing="3" cellpadding="3" class="submenu">
                <tbody>
                    <tr>
                        <td>
                            <?php if ($extraParam != "hideAddNew") { ?>
                                Add New
                            <?php } ?>
                        </td>
                        <td><?php echo $searchLabel; ?></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($extraParam != "hideAddNew") { ?>
                                <a href="#" id="showCourseRegisForm"><img src="images/addNew.gif" border="0"></a>
                            <?php } ?>
                        </td>
                        <td valign="top">
                            <form action="ajax.php">
                                <input type="text" id="searchTerm" value="<?php echo $searchFieldInitValue; ?>" class="TBSearch" onkeyup="processAjaxCall();" onclick="this.value = ''"/>
                                <input type="button" value="Search" id="searchbutton" onclick="processAjaxCall();"/>
                                <input type="hidden" id="pid" value="<?php echo get_page_name(); ?>" />
                                <input type="hidden" id="selectable" value="<?php echo $extraParam; ?>" />
                            </form>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <?php
        }

        function changeGenderRBState($RBGroupName) {
            if (isset($RBGroupName)) {
                if ($RBGroupName == "Male") {
                    $MalecheckedFlag = "checked='checked'";
                    return $MalecheckedFlag;
                }
                if ($RBGroupName == "Female") {
                    $FemalecheckedFlag = "checked='checked'";
                    return $FemalecheckedFlag;
                }
            }
        }

        function prepare_print($id, $print_type) {

            echo "javascript:void(window.open('print.s?id=$id&&type=$print_type','','width=500, heigh=300, left=150, top=50, resizable=no, scrollbars=yes'))";
        }

   
        ?>