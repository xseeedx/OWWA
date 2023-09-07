<?php
		if(!isset($_SESSION['USERID'])){
		redirect(web_root."admin/index.php");
	}

	?>
	<style>
	
	.button-print {
                margin-left:1400px;
                border-radius: 4px;
                width: 100px;
                height: 26px;
                border-color: lightgray;
                border-radius: 4px;
                margin-bottom: 20px;
}
.button-print:hover {
                background-color: rgb(113, 138, 247);
}

	

</style>

	<div class="row">
		<div class="col-lg-12"> 
			<!-- Pachange nalang ng name ng php into reports.php yung department -->
				<h3  >Granted Scholar List<small></small></h3> 
				
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
							<th>Amount</th>
							<th>Date</th>
							<th>Remarks</th>
							<th width="10%" >Action</th>
					
						</tr>	
					</thead> 
					<tbody>
						<?php   
							$query = "SELECT * FROM `scholar_info`";
							$mydb->setQuery($query);
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							// echo '<tr>';
							//echo '<td  width="10%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->scholar_id. '"/></td>';
							echo '<td align="center"></td>';
							echo '<td  width="5%" position="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->scholar_id. '"/></td>';
							echo '<td with="10%">'. $result->scholar_id.'</td>'; 
							//echo '<td ><a href="index.php?view=view&id="><img src="'. $result->image.'" width="60" height="60" title="'.$result->LNAME.'"/></a></td>';
							echo '<td>'. $result->lastname. ', ' . $result->firstname .' ' . $result->suffix .' ' . $result->middlename .' </td>';
							// echo '<td>'. $result->LASTNAME.'</td>';
							// echo '<td>'. $result->CITYADDRESS.'</td>'; 
							echo '<td>'. $result->Course.'</td>'; 
							echo '<td>'. $result->program.'</td>';  
							echo '<td>'. $result->phone_num.'</td>';

							// $query = "SELECT * FROM `tblstudent` s, tblcourse c,tbldepartment d WHERE  s.COURSE=c.COURSEID AND   s.DEPARTMENT=d.DEPARTMENTID";
							// $mydb->setQuery($query);
							// $cur = $mydb->loadResultList();

							// foreach ($cur as $result) {
							// echo '<tr>'; 
							// echo '<td width="5%" align="center"></td>';
							// // echo '<td  width="13%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->IDNO. '"/>' .$result->IDNO .'</td>';
							// 	echo '<td  width="13%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->IDNO. '"/>' .$result->IDNO .'</td>';
							// // echo '<td ><a href="index.php?view=view&id="><img src="'. $result->image.'" width="60" height="60" title="'.$result->LNAME.'"/></a></td>';
							// echo '<td>'. $result->FNAME.' ' . $result->LNAME .'</td>';
							// // echo '<td>'. $result->LASTNAME.'</td>';
							// // echo '<td>'. $result->CITYADDRESS.'</td>'; 
							// echo '<td>'.$result->DESCRIPTION . '(' . $result->COURSE.')</td>'; 
							// echo '<td>'. $result->DEPARTMENT.'</td>';  
							// echo '<td>'. $result->PHONE.'</td>';
							echo '<td  width="10%" > 
							<div class="action">
								<a title="Edit" href="index.php?view=edit&id='.$result->scholar_id.'" class="btn btn-info btn-xs" ><i class="fa fa-pencil fa-fw"></i></a>
								<a title="View Inormation" href="index.php?view=view&id='.$result->scholar_id.'" class="btn btn-default btn-xs " ><i class="fa fa-info fa-fw"></i></a></td>';
								
								// echo '<td  width="10%" ><a title="View Inormation" href="index.php?view=view&id='.$result->IDNO.'" class="btn btn-success btn-xs "><i class="fa fa-info fa-fw"></i></a></td>';
							
							//echo '<td  width="10%" > <button style="font-size:12px" class="btn btn-info btn-xs" onclick="return confirm(Do you want to update this information?)"> Activate</button>
							//<button style="font-size:10px" class="btn btn-default btn-xs ">Deactivate</button></td>';
				// echo '<td  width="10%" ><a title="View Inormation" href="index.php?view=view&id='.$result->IDNO.'" class="btn btn-success btn-xs "><i class="fa fa-info fa-fw"></i></a></td>';
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
		