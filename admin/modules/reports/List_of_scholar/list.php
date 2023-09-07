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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<div class="row">
		<div class="col-lg-12"> 
			<!-- Pachange nalang ng name ng php into reports.php yung department -->
				<h3  >Scholar's List<small></small></h3> 
				
				</div>
				<!-- /.col-lg-12 -->
			</div>
				<div class="print_reciept" id="print_reciept" style="width: 800px;">
					<div class="table-responsive">			
					<table id="example" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
				

	<thead>
						<tr>
							<th width="5%">#</th>
							<th>Name</th>
							<th>Place</th>
							<th>Course</th>
							<th>Program</th>
							<th>School Name</th>
							<th>Contact</th>
							<th width="10%" >Action</th>
						</tr>	
					</thead> 
					<tbody>
						<?php   
$query = "SELECT * FROM `scholar_info` where graduate!='yes'";
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
	<a title="View Information" href="index.php?view=view&id='.$result->scholar_id.'" class="btn btn-default btn-xs " ><i class="fa fa-info fa-fw"></i></a></td>';
	
	// echo '<td  width="10%" ><a title="View Inormation" href="index.php?view=view&id='.$result->IDNO.'" class="btn btn-success btn-xs "><i class="fa fa-info fa-fw"></i></a></td>';

//echo '<td  width="10%" > <button style="font-size:12px" class="btn btn-info btn-xs" onclick="return confirm(Do you want to update this information?)"> Activate</button>
//<button style="font-size:10px" class="btn btn-default btn-xs ">Deactivate</button></td>';
// echo '<td  width="10%" ><a title="View Inormation" href="index.php?view=view&id='.$result->IDNO.'" class="btn btn-success btn-xs "><i class="fa fa-info fa-fw"></i></a></td>';
echo '</tr>';
} 
?>	

				</tbody>
					
					</table>
					
					<div>
					
					<button class="btn btn-success" id="return_to_main" type="submit" name="return">Print this receipt</button>
					<br><br>
				</div>
		
		

	<script>
    const button = document.getElementById('return_to_main');

    function generatePDF() {
        const element = document.getElementById('print_reciept');
        html2pdf().from(element).save();
        // document.getElementById("return_to_main").style.display ="block";
    }

    button.addEventListener('click', generatePDF);
</script>