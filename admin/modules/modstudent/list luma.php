<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Example of Setting Focus on First Text Input inside a Bootstrap Modal</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>	
	<?php
			check_message(); 
			?> 

<script>
$(document).ready(function(){
    $("#myModal").on('shown.bs.modal', function(){
        $(this).find('input[type="text"]').focus();
    });
});
</script>
<style>
    .bs-example{
    margin: 20px;
    }
	.action{
		display:flex;
	}
</style>

	<div class="row">
		<div class="col-lg-12"> 
				<h1 >Scholars <small>|  <label class="label label-xs" style="font-size: 20px"><a href="index.php?view=add1">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4">New</a></i></label> |</small></h3> 
			</div>
			</div>

					<form action="controller.php?action=delete" Method="POST">  					
					<table id="example"  class="table table-striped table-bordered table-hover" cellspacing="0" style="font-size:12px" >
						
					<thead>
						<tr> 
							<th>#</th>
							<th></th>
							<th width="5%">Id</th>
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
							$query = "SELECT * FROM `scholar_info`";
							$mydb->setQuery($query);
							$cur = $mydb->loadResultList();

							foreach ($cur as $result) {
							echo '<tr>';
							echo '<td width="10%" align="center"></td>';
							echo '<td  width="10%" position="center"><input type="checkbox" name="selector[]" id="selector[]" value="'.$result->scholar_id. '"/></td>';
							echo '<td with="10%">'. $result->scholar_id.'</td>'; 
							echo '<td>'. $result->firstname.' ' . $result->lastname .'</td>';
							echo '<td>'. $result->Course.'</td>'; 
							echo '<td>'. $result->program.'</td>';  
							echo '<td>'. $result->phone_num.'</td>';
							echo '<td  width="10%" > 
							<div class="action">
								<a title="Edit" href="index.php?view=edit&id='.$result->scholar_id.'" class="btn btn-info btn-xs" ><i class="fa fa-pencil fa-fw"></i></a>
								<a title="View Inormation" href="index.php?view=view&id='.$result->scholar_id.'" class="btn btn-default btn-xs " ><i class="fa fa-info fa-fw"></i></a></td>';
								echo '<td  width="10%" > 
								<div class="action">
									<a title="Activate"  class="btn btn-info btn-xs" style="font-size:12px; color: white" onclick="return confirm(Do you want to activate this scholar?)"> Activate</a>
									<a title="Deactivate" class="btn btn-default btn-xs" style="font-size:12px; color: white" onclick="return confirm(Do you want to deactivate this scholar?)"> Deactivate</a></td>';
							echo '</tr>';
						} 
						?>
					</tbody>
						
						
					</table>
					<div class="btn-group">					
					<div class="bs-example">
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="btn btn-lg btn-danger" data-toggle="modal">Terminate</a>
    
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Scholar Termination</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label style="color: black" for="inputComment">Remarks:</label> <br>
                            <textarea style="border-color: black" class="form-control" id="inputComment" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>     

					<div class="bs-example">
						<!-- Button HTML (to Trigger Modal) -->
						<a href="#myModal" class="btn btn-lg btn-info"  onclick="return confirm('Do you want to move this scholar to graduate list?')" name="activate"><span class="glyphicon glyphicon-trash"></span>Graduate</a>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</form> 