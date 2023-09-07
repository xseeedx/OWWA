
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
		<div class="col-lg-8"> 
				<h3 >Scholars <small>|  <label class="label label-xs" style="font-size: 20px"><a href="index.php?view=add1">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4">New</a></i></label> |</small></h3> 
				
				</div>
               
				<!-- /.col-lg-12 -->
			</div>
					<form action="controller.php?action=add" Method="POST">  					
					<table id="example" class="table table-striped" cellspacing="0" style="font-size:12px" >
						
					<thead>
                        
						<tr> 
                        <div class="col-lg-4"> 
				
				</div>
							<th>#</th>
							<th></th>
							<th width="5%"><!--<input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">-->  Id</th>
							<th>Name</th>
							<!-- <th>LASTNAME</th> -->
							<!-- <th>CITYADDRESS</th> -->
							<th>Course</th>
							<th>Program</th>  
							<th>Contact#</th> 
							<th width="10%">Action</th>
							<!--<th width="10%">Status</th>-->
							
							
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
							echo '<td>'. $result->firstname.' ' . $result->lastname .'</td>';
							echo '<td>'. $result->Course.'</td>'; 
							echo '<td>'. $result->program.'</td>';  
							echo '<td>'. $result->phone_num.'</td>';
							echo '<td   width="10%" ><a title="View Inormation" href="index.php?view=view&id='.$result->scholar_id.'" class="btn btn-default btn-sm "><i class="fa fa-info fa-fw"></i></a></td>';		echo '</tr>';
						} 
						?>
					</tbody>
						
						
					</table>














        <div class="btn-group">
					<!--   <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<!--<button style="margin-left:12px" type="submit" class="btn btn-danger" onclick="return confirm('Do you want to terminate this Scholar?')" name="terminate"><span class="glyphicon glyphicon-trash"></span> Terminate Selected</button>-->
					
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
                    <button type="button" onclick="updateDatabase()" name="deleteButton" class="btn btn-danger">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>     

<!--<button style="margin-left:12px" type="submit" class="btn btn-info" onclick="return confirm('Do you want to add this scholar to graduate list?')" name="activate"><span class="glyphicon glyphicon-trash"></span>Graduate Selected</button>-->   
<div class="bs-example">
						<!-- Button HTML (to Trigger Modal) 
						<a href="#myModal1" class="btn btn-lg btn-info" 
                         onclick="return confirm('Do you want to move this scholar to graduate list?')" 
                         name="activate"><span class="glyphicon glyphicon-trash"></span>Graduate</a>
						-->			
                    
                    <!-- Button HTML (to Trigger Modal) -->
<a href="#myModal1" class="btn btn-lg btn-info" onclick=" return confirmAction()" name="activate">
  <span class="glyphicon glyphicon-trash"></span> Graduate
</a>

<!-- Modal -->
<div id="myModal1" class="modal">
  <div class="modal-content">
    <h3>Confirmation</h3>
    <p>Do you want to move the selected scholars to the graduate list?</p>
    <div class="modal-buttons">
      <button onclick="updateDatabase()">OK</button>
      <button onclick="cancelAction()">Cancel</button>
    </div>
  </div>
</div>
                    
                    
                    
                    </div>
								</div>




                    <!-- Add this script tag to include the JavaScript functions -->
                    <script>
                      // Function to handle the update in the database
                      function updateDatabase() {
                        // Assuming you have a list of checkboxes with the name "scholar" for scholar selection
                        const checkboxes = document.querySelectorAll('input[name="selector"]:checked');

                        if (checkboxes.length > 0) {
                          // Gather the selected scholar IDs into an array
                          const selectedScholarIds = Array.from(checkboxes).map((checkbox) => checkbox.value);

                          // Send the data to the server-side script using AJAX (Assuming you are using jQuery)
                          $.ajax({
                            type: 'POST',
                            url: 'update_database.php',
                            data: { scholar_id: selectedScholarIds },
                            success: function (response) {
                              // Handle the response from the server if needed
                              console.log(response);
                              // You can show a success message to the user here if the update was successful
                              // For example, you can display a success message using an alert or a notification
                              alert('Scholars graduated and database updated successfully.');
                              // Optionally, you can reload the page after the update
                              // window.location.reload();
                            },
                            error: function (xhr, status, error) {
                              // Handle errors if any
                              console.error(error);
                              // Show an error message to the user if the update fails
                              alert('Error: Unable to update the database.');
                            },
                          });
                        } else {
                          // Show a message to the user if no scholars are selected
                          alert('Please select at least one scholar before clicking Graduate.');
                        }

                        // Close the modal after handling the action
                        const modal = document.getElementById('myModal1');
                        modal.style.display = 'none';
                      }

                      // Function to handle the cancel action for the modal
                      function cancelAction() {
                        const modal = document.getElementById('myModal1');
                        modal.style.display = 'none';
                      }

                      // Function to confirm the action before updating the database
                      function confirmAction() {
                        const modal = document.getElementById('myModal1');
                        modal.style.display = 'block';
                        return false; // Prevent default anchor tag behavior
                      }
                    </script>
