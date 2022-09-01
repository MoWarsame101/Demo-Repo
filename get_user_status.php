<?php
include_once "includes/db.php";
$uid=$_SESSION['UID'];
$time=time();
$res=mysqli_query($link,"SELECT * FROM login");
$i=1;
$html='';
while($row=mysqli_fetch_assoc($res)){
	$status='Offline';
	$class="btn-danger";
	if($row['last_login']>$time){
		$status='Online';
		$class="btn-success";
	}
	$html.='<tr>
                  <th scope="row">'.$i.'</th>
				  <td><img src="img/'.$row['pic'].'"height = 30px width = 30px"></td>
                  <td>'.$row['username'].'</td>
                  <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
               </tr>';
	$i++;
}
echo $html;
?>