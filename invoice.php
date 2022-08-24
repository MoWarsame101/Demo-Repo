<?php
include_once  "includes/security.php";
include_once  "includes/process.php";
include_once "includes/db.php";
include_once  "includes/header.php";
include_once  "includes/navbar.php";
include_once  "timezone.php";

?>


		<style>
			.invoice-box {
				max-width: 1200px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
				position: relative;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
	<?php

if(isset($_POST['print_asset_btn']))
{
    $id = $_POST['print_asset_id'];
    
    $query = "SELECT * FROM registerasset WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    foreach($query_run as $row)
    {
        ?>
		<div class="invoice-box" id="form-user">
			<center>
			<table cellpadding="0" cellspacing="0" style="width: 900px;">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
                                <img src="img/loginimage.png" height="150px" width="240px"><br />
								</td>

								<td class="float-end">
									Invoice PO: <?php echo $row['PO'];?><br />
				
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr  class="heading">
								<td>Username</td>
								<td><?php echo $_SESSION['username'];?></td>
							</tr><br>

				<tr class="heading"><br>
				<td>Description</td>

				<td><?php echo $row['Description'];?></td>
				</tr>

				<tr class="details">
					<td>Quantity</td>

					<td><?php echo $row['quantity'];?></td>
				</tr>

				<tr class="heading">
					<td>Item Price</td>

					<td><?php echo $row['price'];?></td>
				</tr>

				<tr class="item">
					<td>Category</td>
					<td><?php echo $row['categories'];?></td>

				<tr class="item">
					<td>Department</td>

					<td><?php echo $row['department'];?></td>
				</tr>

				<tr class="item last">
					<td>Location</td>

					<td><?php echo $row['Rate'];?></td>
				</tr>
				
				<tr class="total">
					<td>Total</td>

					<td>Total: <?php echo $row['purchaseCost'];?></td>
				</tr>
	
			</table>
			</center>
		</div>
        <div class="invoice-box">
        <button class="btn btn-success btn-sm  ml-5" type="submit" onclick="printContent('form-user')">Print Content</button>
        </div>
        </div>
		<?php
	}
}
		?>
        <?php
include_once "includes/script.php";
include_once  "includes/footer.php";
?>
