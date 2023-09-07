	<?php
		// if (!isset($_SESSION['TYPE'])=='Administrator'){
	//     redirect(web_root."index.php");
	//    }

	?>
		<div class="row">
		<div class="col-lg-12"> 
				<h3 >Documents</h3> 
				
				</div>
			</div>
					<form action="controller.php?action=delete" Method="POST">  					
					<table id="example" class="table table-hover table-bordered" cellspacing="0" style="font-size:12px" >
					
					<thead>
						<tr>
							<th>No.</th>
							<th>
							Description</th>
							<th>Semester</th>
							<th>School Year</th>
							<th>Date</th>
					
						</tr>	
					</thead> 
					<tbody>
						<?php 
							
							$mydb->setQuery("SELECT * 
												FROM  `tblusers`");
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							echo '<tr>';
							echo '<td width="5%" align="center"></td>';
							echo '<td> </a></td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '</tr>';
						} 
						?>
					</tbody>
						
					</table> 
					</form> 