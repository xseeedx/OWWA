<?php
		if(!isset($_SESSION['USERID'])){
		redirect(web_root."parent/index.php");
	}

	?>
	<style>
	#example{
		white-space: nowrap;
	}
	</style>

	<div class="row">
		<div class="col-lg-12"> 
				<h3 class=" r" >History</h3> 
				
				</div>
			</div>
					<form action="controller.php?action=delete" Method="POST">  
					<div class="table-responsive">			
					<table id="example" class="table table-striped  " style="font-size:12px" cellspacing="0">
					
					<thead>
						<tr>
						<th>No.</th>
							<th>Name</th>
							<th>Course</th>
							<th>Program</th>
							<th>Semester</th>
							<th>School Year</th>
							<th>Amount</th>
							<th>Date</th>
							<th>Remarks</th>
							<th width="10%">Action</th>
						</tr>	
					</thead> 
					<tbody>
						<?php   
							$mydb->setQuery("SELECT * 
												FROM  `tblannouncement` ORDER BY ANNOUNCEMENTID DESC");
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
								echo '<tr>';
								echo '<td width="5%" align="center"></td>';
								echo '<td> </td>';
								echo '<td> </a></td>'; 
								echo '<td> </td>';
								echo '<td> </td>';
								echo '<td> </td>';
								echo '<td> </td>';
								echo '<td> </td>';
								echo '<td> </td>';	
							echo '<td align="center" >
										<a title="View Information" href="index.php?view=view&id='.$result->ANNOUNCEMENTID.'" class="btn btn-default btn-xs "><span class="fa fa-info fa-fw"></span></a>
										<a title="Delete" href="controller.php?action=delete&id='.$result->ANNOUNCEMENTID.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> </a>
										</td>';
							echo '</tr>';
						} 
						?>
					</tbody>
						
					</table>
				</div>
					</form> 