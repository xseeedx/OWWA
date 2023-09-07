	<?php
		if (!isset($_SESSION['USERID'])){
		redirect(web_root."admin/index.php");
		}

	?>
		<div class="row">
		<div class="col-lg-12"> 
				<h3>Scholar's Grant List <small>|  <Button class="btn btn-info btn-xs" style="font-size: 5px"><a href="index.php?view=add">  <i class="fa fa-history fw-fa" style="color: #ffffff; font-size:10px"> History</a></i></Button> |</small></h3> 
				
				</div>
			</div>
					<form action="controller.php?action=delete" Method="POST">  					
					<table id="example" class="table table-bordered table-hover" cellspacing="0" style="font-size:12px" >
					
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
												FROM  `tblcourse`");
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							echo '<tr>';
							echo '<td width="5%" align="center"></td>';
							echo '<td> </td>';
							echo '<td>' . $result->COURSE.'</a></td>'; 
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td > <a title="Edit" href="index.php?view=edit&id='.$result->COURSEID.'" class="btn btn-info btn-xs" ><i class="fa fa-check fa-fw"></i></a>
										<a title="Delete" href="controller.php?action=delete&id='.$result->COURSEID.'" class="btn btn-danger btn-xs" ><i class="fa fa-times  fa-fw"></i> </a>
										</td>';
							echo '</tr>';
						} 
						?>
					</tbody>
						
					</table>
					
				
					</form>
		