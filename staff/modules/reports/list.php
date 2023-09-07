<?php
		if(!isset($_SESSION['USERID'])){
		redirect(web_root."staff/index.php");
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
				<h3  >Submitted Documents<small>|  <label class="label label-xs" style="font-size: 20px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4"> New</a></i></label> |</small></h3> 
				
				</div>
				<!-- /.col-lg-12 -->
			</div>
					<form action="controller.php?action=delete" Method="POST">  
					<div class="table-responsive">			
					<table id="example" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
					<button type="button" class="button-print">Print &nbsp;<i class="fa fa-print"></i></button>
					<thead>
						<tr>
						<th></th>
							<th></th>
							<th width="5%"><!--<input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">-->  Id</th>
							<th>Sender Name</th>
							<!-- <th>LASTNAME</th> -->
							<!-- <th>CITYADDRESS</th> -->
							<th>Document Name</th>
							<th>Document Description</th>
							<th>Particulars</th>
							<th>Date Submitted</th>
							<th>Program</th> 
							<th>Email</th>
							<th width="10%">Action</th>
							<!--<th width="10%">Status</th>-->
							
							
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

							


							$query = "SELECT * FROM `upload_documents` INNER JOIN `scholar_info` WHERE upload_documents.report_sender=scholar_info.user_id AND address LIKE '%$staffLocation%'";
							$mydb->setQuery($query);
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							// echo '<tr>';
							//echo '<td  width="10%"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->scholar_id. '"/></td>';
							echo '<td align="center"></td>';
							echo '<td  width="5%" position="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->scholar_id. '"/></td>';
							echo '<td with="10%">'. $result->scholar_id.'</td>'; 
							//echo '<td ><a href="index.php?view=view&id="><img src="'. $result->image.'" width="60" height="60" title="'.$result->LNAME.'"/></a></td>';
							echo '<td>'. $result->lastname. ', ' .   $result->firstname .' ' . $result->suffix .' ' . $result->middlename .' </td>';
							// echo '<td>'. $result->LASTNAME.'</td>';
							// echo '<td>'. $result->CITYADDRESS.'</td>'; 
							echo '<td>'. $result->document_name.'</td>'; 
							echo '<td>'. $result->document_description.'</td>';
							echo '<td>'. $result->document_description.'</td>';
							echo '<td>'. $result->date_submitted.'</td>'; 
							echo '<td>'. $result->program.'</td>';
							echo '<td>'. $result->email.'</td>';

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
						} }
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
		