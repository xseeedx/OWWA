	<?php
		// if (!isset($_SESSION['TYPE'])=='Administrator'){
	//     redirect(web_root."index.php");
	//    }

	?>
		<div class="row">
		<div class="col-lg-12"> 
				<h3 >Manage Users <small>|  <label class="label label-xs" style="font-size: 20px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4"> New</a></i></label> |</small></h3> 
				
				</div>

			</div>
					<form action="controller.php?action=delete" Method="POST">  					
					<table id="example" class="table table-hover" cellspacing="0" style="font-size:12px" >
					
					<thead>
						<tr>
							<th>No.</th>
							<th>
							Account Name</th>
							<th>Username</th>
							<th>User Role</th>
							<th>Email</th>
							<th>Status</th>
							<th width="10%">Action</th>
					
						</tr>	
					</thead> 
					<tbody>
						<?php 
							
														// Create a MySQLi connection
								$connection = mysqli_connect('localhost', 'root', '', 'db_scholar');

								// Check if the connection was successful
								if (!$connection) {
									die('Connection failed: ' . mysqli_connect_error());
								}

							$USERID = $_SESSION['USERID'];
							$query = "SELECT staff_address FROM user_acc WHERE USERID = $USERID";
							$result = mysqli_query($connection, $query);

							if ($result && mysqli_num_rows($result) > 0) {
								$row = mysqli_fetch_assoc($result);
								$staffLocation = $row['staff_address'];


							$mydb->setQuery("SELECT * 
												FROM  `user_acc` INNER JOIN `scholar_info` WHERE user_acc.USERID=scholar_info.user_id AND address LIKE '%$staffLocation%'");
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							echo '<tr>';
							echo '<td width="5%" align="center"></td>';
							echo '<td>' . $result->NAME. '</td>';
							echo '<td>'. $result->username.'</td>';
							echo '<td>'. $result->TYPE.'</td>';
							echo '<td>'. $result->username.'</td>';
							echo '<td>'. $result->account_status.'</td>';
							// echo '<td>'. $result->TYPE.'</td>';
							echo '<td width="5%" > 
									<a title="Edit" href="index.php?view=edit&id='.$result->USERID.'" class="btn btn-info btn-sm" >
									<i class="fa fa-edit fa-xs">
									</i>
										</a>
										
										</td>';
							echo '</tr>';
						} }
						?>
					</tbody>
						
					</table> 

					</form> 