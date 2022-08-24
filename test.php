
<?php

//index.php

$error = '';
$output = '';

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

if(isset($_POST["add"]))
{
    if(empty($_POST["email_address"]))
    {
        $error = '<label class="text-danger">Email Address List is required</label>';
    }
    else
    {
        $array = explode("\r\n", $_POST["email_address"]);

        $email_array = array_unique($array);

        $query = "
        INSERT INTO tbl_email_list 
        (email_address) 
        VALUES ('".implode("'),('", $email_array)."')
        ";

        $statement = $connect->prepare($query);

        $statement->execute();

        $error = '<label class="text-success">Data Inserted Successfully</label>';
    }
}

$query = "
SELECT * FROM tbl_email_list 
ORDER BY email_list_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

if($statement->rowCount() > 0)
{
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output .= '
        <tr>
            <td>'.$row["email_address"].'</td>
        </tr>
        ';
    }
}
else
{
    $output .= '
        <tr>
            <td>No Data Found</td>
        </tr>
    ';
}

?>

<html>
    <head>
        <title>Insert multiple data to mysql using single textarea in PHP</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>  
    <body>
        <div class="container">    
            <div class="row content">
                <div class="col-sm-2">
                    &nbsp;
                </div>
                <div class="col-sm-8 text-left">
                    <br />
                    <h3 align="center">Insert Multiple Data to Mysql using Textarea in PHP</h3>
                    <br />
                    <div align="center"><?php echo $error; ?></div>
                    <form method="post">
                        <div class="row">
                            <label class="col-md-3 text-right">Enter Email List</label>
                            <div class="col-md-9">
                                 <textarea name="email_address" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <br />
                        <div align="center">
                            <input type="submit" name="add" class="btn btn-primary" value="Add" />
                        </div>
                    </form>
                    <br />
                    <h3 align="center">Email List</h3>
                    <br />
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Email Address</td>
                        </tr>
                        <?php
                        echo $output;
                        ?>
                    </table>
                </div>
                <div class="col-sm-2">
                    &nbsp;
                </div>
            </div>
        </div>
    </body>  
</html>