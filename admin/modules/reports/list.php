	<?php
		if(!isset($_SESSION['USERID'])){
		redirect(web_root."admin/index.php");
	}

	?>

	<div class="row">
		<div class="col-lg-12"> 
			<!-- Pachange nalang ng name ng php into reports.php yung department -->
				<h3  >List of Reports<small>|  <label class="label label-xs" style="font-size: 12px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4"> New</a></i></label> |</small></h3> 
				
				</div>
				<!-- /.col-lg-12 -->
			</div>
					<form action="controller.php?action=delete" Method="POST">  
					<div class="table-responsive">			
					<table id="example" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
					<button type="button" class="button-print">Print &nbsp;<i class="fa fa-print"></i></button>
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Name</th>
							<th>Course</th>
							<th>Program</th>
							<th>Semester</th>
							<th>School Year</th>
							<th>Termination Date</th>
							<th>Remarks</th>
							<th width="10%" >Action</th>
					
						</tr>	
					</thead> 
					<tbody>
						<?php   
							// $mydb->setQuery("SELECT * 
									// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							$mydb->setQuery("SELECT * 
												FROM  `tbldepartment`");
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							echo '<tr>';
							echo '<td width="5%" align="center"></td>';
							echo '<td> </a></td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td> </td>';
							echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->DEPARTMENTID.'"  class="btn btn-info btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
										<a title="Delete" href="controller.php?action=delete&id='.$result->DEPARTMENTID.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> </a>
										</td>';
							echo '</tr>';
						} 
						?>
					</tbody>
						
					</table>
	
					<!-- <div class="btn-group">
					<a href="index.php?view=add" class="btn btn-default">New</a>
					<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
					</div>
	-->
	

<button class="btn btn-info btn-round" name="save" type="submit" style="font-size: 10px; margin-left: 930px"><span class="fa fa-print fw-fa"></span>  Print </button>
<br><br>
				</div>
					</form>
		