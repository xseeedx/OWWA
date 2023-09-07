	<?php
			check_message(); 
			?> 
			
	<div class="row">
		<div class="col-lg-12"> 
				<h3 >Scholar Related Information <small>|  <label class="label label-xs" style="font-size: 20px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4">New</a></i></label> |</small></h3> 
				
				</div>
			</div>
					<form action="controller.php?action=delete" Method="POST">  					
					<table id="example"  class="table table-striped table-bordered table-hover" cellspacing="0" style="font-size:12px" >
						
					<thead>
						<tr> 
							<th>#</th>
							<th  width="50">Id</th>
							<th>Name</th>
							<th>Course</th>
							<th>Program</th>  
							<th>Contact#</th> 
							<th width="10%">Action</th>
							<th width="10%">Status</th>
							
							
						</tr>	
					</thead> 	

				<tbody>
						<?php 
							$query = "SELECT * FROM `tblstudent` s, tblcourse c,tbldepartment d WHERE  s.COURSE=c.COURSEID AND   s.DEPARTMENT=d.DEPARTMENTID";
							$mydb->setQuery($query);
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							echo '<tr>'; 
							echo '<td width="5%" align="center"></td>';
								echo '<td  width="13%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->IDNO. '"/>' .$result->IDNO .'</td>';
							echo '<td>'. $result->FNAME.' ' . $result->LNAME .'</td>';
							echo '<td>'.$result->DESCRIPTION . '(' . $result->COURSE.')</td>'; 
							echo '<td>'. $result->DEPARTMENT.'</td>';  
							echo '<td>'. $result->PHONE.'</td>';
							echo '<td  width="10%" > <a title="Edit" href="index.php?view=edit&id='.$result->IDNO.'" class="btn btn-info btn-xs" ><i class="fa fa-pencil fa-fw"></i></a>
										<a title="View Inormation" href="index.php?view=view&id='.$result->IDNO.'" class="btn btn-default btn-xs "><i class="fa fa-info fa-fw"></i></a></td>';	
							echo '<td  width="10%" > <button style="font-size:12px" class="btn btn-info btn-xs" >Activate</button>
							<button style="font-size:10px" class="btn btn-default btn-xs ">Deactivate</button></td>';
							echo '</tr>';
						} 
						?>
					</tbody>
						
						
					</table>
					<div class="btn-group">
					<button style="margin-left:12px" type="submit" class="btn btn-danger" name="terminate"><span class="glyphicon glyphicon-trash"></span> Terminate Selected</button>
					<button style="margin-left:12px" type="submit" class="btn btn-info" name="activate"><span class="glyphicon glyphicon-trash"></span>Graduate Selected</button>
					
					</form> 