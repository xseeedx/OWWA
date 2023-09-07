<?php
@$IDNO = $_GET['id'];
@$syid = $_GET['sy'];
if ($IDNO == '') {
	redirect("index.php");
}
$student = new Student();
$result = $student->single_students($IDNO);
?>

<div class="student-profile py-4">

<div class="w-100">
	<div class="card-body pt-0">
	<h3>Pending Request Approval</h3>
<?php
			$mydb->setQuery("SELECT * FROM `notification` WHERE notification_for = 'Administrator' AND notification_status = 'unread'");
			$notifications = $mydb->loadResultList();
			
			if (count($notifications) > 0) { 
				?>
								
                       
                       
                        <div class="row">
                        <div class="col-sm-5">
                        <div class="form-group">
                            <label class="bmd-label-floating">Body</label>
                        </div>
                        </div> 

                        <div class="col-sm-1">
                        <div class="form-group">
                            <label class="bmd-label-floating">Notification type</label>
                        </div>
                        </div>   

                        <div class="col-sm-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">Creator</label>
                        </div>
                        </div>   
                        <div class="col-sm-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">Created</label>
                        </div>
                        </div> 
                        <div class="col-sm-2">
                        <div class="form-group">
                            <label class="bmd-label-floating">Actions</label>
                        </div>
                        </div> 
                        </div>

						<?php
                            foreach ($notifications as $notification) {
                                $type = $notification->notification_type;
                                $id = $notification->catch_id;

								// if ($notifications->notification_type == 'hidden') {
								// 	continue; // Skip this iteration of the loop
								// }
							if ($notification->notif_creator == "$IDNO" and $notification->notification_type  == "request") {

                                $student = new Student();
                                $scholarid = $student->single_students($id);
                                $scholar_id = $scholarid ? $scholarid->scholar_id : null;

								// $request = new Request();
                                // $requestid = $request->single_studentrequest($id);
                                // $request_desc = $requestid ? $requestid->request_description : null;
								// $request_status = $requestid ? $requestid->request_status : null;
							
							
								// if ($request_status == "approve" or $request_status == "reject"){
								// 	continue; 
								// }
								// else{
							
								if ($request_desc = "1"){
									$link = web_root . "admin/modules/modstudent/index.php?view=approval_edit_info&id=" . $IDNO;
								}
								else if ($request_desc = "2"){
									$link = web_root . "admin/modules/modstudent/index.php?view=approval_fam_info&id=" . $IDNO;
								}	
								else if ($request_desc = "3"){
									$link = web_root . "admin/modules/modstudent/index.php?view=approval_educational_info&id=" . $IDNO;
								}
								else{
									$link = web_root . "admin/modules/modstudent/index.php?view=approval_scholarship_application&id=" . $IDNO;
                         
								}
							
                                // if ($type == "comment" ) {
                                //     $comment = new Comment();
                                //     $res = $comment->single_comments($id);
                                //     $commentid = $res ? $res->announcement_id : null;
        
        
                                //     $announcement_id = null;
                                //     $announcement = new Announcement();
                                //     $a = $announcement->single_announcement($commentid);
                                //     $announcement_id = $a ? $a->id_announcement : null;
                            
                                //     $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
                                //     $mydb->setQuery($sql);
                                //     $link = web_root . "admin/modules/announcement/index.php?view=view&id=" . $announcement_id;
                                // } elseif ($type == "reply") {    

                                //     $reply = new Reply ();
                                //     $res = $reply->single_replies($id);
                                //     $id = $res ? $res->commentid : null;

                                //     $comment = new Comment();
                                //     $res = $comment->single_comments($id);
                                //     $commentid = $res ? $res->announcement_id : null;


                                //     $announcement_id = null;
                                //     $announcement = new Announcement();
                                //     $a = $announcement->single_announcement($commentid);
                                //     $announcement_id = $a ? $a->id_announcement : null;
                                //     $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
                                //     $mydb->setQuery($sql);
                                    
                                //     $link = web_root . "admin/modules/announcement/index.php?view=view&id=" . $announcement_id;
                                // } elseif ($type == "request") {    
                                //     $sql = "UPDATE `notification` set `notification_status`='read'   WHERE `notification_id` = $id";
                                //     $mydb->setQuery($sql);  
                                //     $link = web_root . "admin/modules/modstudent/index.php?view=view&id=" . $scholar_id;
                                // } else {
                                //     $link = web_root . "admin/index.php";
                                // }

                        echo '
                            <div class="bg-light rounded p-2">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notification_message . '</label>
                                        </div>
                                    </div> 
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notification_type . '</label>
                                        </div>
                                    </div>   
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notif_creator . '</label>
                                        </div>
                                    </div>   
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label class="bmd-label-floating dark-label">' . $notification->notification_date . '</label>
                                        </div>
                                    </div> 
                                    <div class="col-sm-2">
                                        <div class="form-group"> 
                                        <a href="' . $link . '" class="userinfo btn btn-info" name="save" type="submit" value="' . $notification->notification_id . '"
                                        onclick="updateNotificationStatus(' . $notification->notification_id . ')">
                                        <span class="fa fa-save fw-fa"></span> View Info
                                    </a>                                                              
                                        </div>
                                    </div>
                                </div> 
                            </div>';
                    }
				}
			}
			else {
                echo '<div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="bmd-label-floating">No pending request found.</label>
                </div>
              </div>
            </div>';
            }
			// }

                    ?>
                </div>

	<!-- the whole student form -->
	<div class="container">
		<!-- table  -->
		<h3>Scholar Information</h3>
		<div class="row">
			<div class="col-lg-6">
				<div class="student-profile py-4">
					<div class="card shadow-sm mb-5 mt-4">
						<div class="card-header bg-transparent text-center">
							<img class="profile_img" src="C:\xampp\htdocs\OWWASPOM\images\profile.jpg" alt="student dp">
							<h5>
								<?php echo $result->firstname; ?>
								<?php echo $result->middlename; ?>
								<?php echo $result->lastname; ?>
								<?php if ($result->suffix !== 'none') echo $result->suffix; ?>
							</h5>
						</div>
						<div class="card-body">
							<p class="mb-0"><strong class="pr-1">Scholar ID:</strong>
								<?php echo $result->scholar_id; ?>
							</p>
							<p class="mb-0"><strong class="pr-1">Scholarship Program:</strong>
								<?php echo $result->program; ?>
							</p>
							<p class="mb-0"><strong class="pr-1">School:</strong>
								<?php echo $result->school; ?>
							</p>
							<p class="mb-0"><strong class="pr-1">Year:</strong>
								<?php echo $result->year_level; ?>
							</p>
						</div>

						<div class="card-body bg-transparent border-0">
							<div class="text-right">
								<a href="index.php?view=editme&id= <?php echo $result->scholar_id ?>">
									<button type="button" class="btn btn-success btn-floating">
										<i class="fa fa-pencil-square-o"></i>
									</button>
								</a>
							</div>


							<h4 class="mb-0"><i class="fa fa-user pr-3"></i>Scholars Information </h4>

						</div>

						<div class="card-body pt-0">
							<table class="table table-hover table-sm">
								<tr>
									<td width="50%"><strong>Permanent Address </strong>:
										<?php echo $result->address; ?><?php echo $result->scholar_region; ?>
									</td>
									<td width="50%"><strong>Present address : </strong>
										<?php echo $result->presentaddress; ?>
										</$td>
								</tr>

								<tr>
									<td width="50%"><strong>Gender: </strong>
										<?php echo $result->gender; ?>
									</td>
									<td width="50%"><strong>Age: </strong>
										<?php echo $result->age; ?>
									</td>
								</tr>
								<tr>
									<td width="50%"><strong>Birthday : </strong>
										<?php echo $result->birthdate; ?>
									</td>
									<td width="50%"><strong>Place of Birth : </strong></td>

								</tr>
								<tr>
									<td width="50%"><strong>Telephone Number: </strong></td>
									<td width="50%"><strong>Cellphone Number : </strong>
										<?php echo $result->phone_num; ?>
									</td>

								</tr>
								<tr>
									<td width="50%"><strong>Religion : </strong>
										<?php echo $result->religion; ?>
									</td>
									<td width="50%"><strong>Citizenship : </strong>
										<?php echo $result->citizenship; ?>
									</td>
								</tr>
							</table>
						</div>

					</div>
					<!-- end of table -->
				</div>
			</div>
			<div class="col-lg-6">
    <div class="student-profile py-4 mt-4">
        <div class="card shadow-sm">

            <div class="card-body bg-transparent border-0">
                <div class="text-right">

                </div>
                <h4 class="mb-0"><i class="fas fa-user-friends pr-3"></i>Upload Documents</h4>
            </div>
            <div class="card-body pt-0">
			<?php
					$mydb->setQuery("SELECT * FROM `upload_documents`");
					$cur = $mydb->loadResultList();

					// Check if there are any documents
					if ($cur) {
						echo '<table class="table table-striped table-hover table-sm">';
						echo '<thead>';
						echo '<tr>';
						echo '<th></th>';
						echo '<th>Document Name</th>';
						echo '<th>Description</th>';
						echo '<th>Year Level</th>';
						echo '<th>Semester</th>';
						// echo '<th>Actions</th>';
						echo '</tr>';
						echo '</thead>';
						echo '<tbody>';

						foreach ($cur as $docu) {
							if ($docu->document_status == 'hidden') {
								continue; // Skip this iteration of the loop
							}

							if ($docu->report_sender == $IDNO) {
								echo '<tr>';
								echo '<td align="center"></td>';
								echo '<td>' . $docu->document_name . '</td>';
								echo '<td>' . $docu->document_description . '</td>';
								echo '<td>' . $docu->year_level . '</td>';
								echo '<td>' . $docu->semester . '</td>';
								echo '<td>';
								// echo '<a href="downloads.php?file_id=' . $docu->document_id . '">';
								// echo '<button class="btn btn-warning btn-sm"><i class="fa fa-download"></i> </button>';
								// echo '</a>';
								// echo '<a href="view_document.php?file_id=' . $docu->document_id . '">';
								// echo '<button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> </button>';
								// echo '</a>';
								
							}
						}

						echo '</tbody>';
						echo '</table>';
					} else {
						echo '<p>No documents found.</p>';
					}
					?>

              
            </div>
        </div>
    </div>
</div>
<!-- end of whole student form -->


		</div>


		<!-- Relationship to OFW form -->
		<!-- <div class="container"> -->
		<!-- table  -->
		<div class="row">
			<div class="col-lg-6">
				<div class="student-profile py-4 ">
					<div class="card shadow-m">
						<div class="card-header bg-transparent text-center">
							
							<h4>Relationship to OFW </h4><br>
						</div>
						<div class="card-body">

							<h5>Name of the OFW :
								<?php echo $result->OFW_firstname; ?>
								<?php echo $result->OFW_middlename; ?>
								<?php echo $result->OFW_lastname; ?>
							</h5>
							<p class="mb-0"><strong class="pr-1">Relationship : </strong>
								<?php echo $result->OFW_relationship; ?>
							</p>
							<p class="mb-0"><strong class="pr-1">Category: </strong>
								<?php echo $result->category; ?>
							</p>
						</div>
					<!--</div>
				</div>-->

				<!-- <div class="col-lg-8"> -->
				<!--<div class="card shadow-sm">-->
					<div class="card-body bg-transparent border-0">
						<div class="text-right">
							<a href="index.php?view=editfam&id= <?php echo $result->scholar_id ?>">
								<button type="button" class="btn btn-success btn-floating">
									<i class="fa fa-pencil-square-o"></i>
								</button>
							</a>
						</div>
						<h4 class="mb-0"><i class="fas fa-user-circle pr-3"></i>Family background</h4>
					</div>
					<div class="card-body pt-0">
						<table class="table table-hover table-sm">
							<tr>
								<td width="50%"><strong class="pr-3">Number of siblings :</strong>
									<?php echo $result->number_siblings; ?>
								</td>
							</tr>
							<tr>
								<th>Father's information</th>
								<td></td>
							</tr>
							<tr>
								<td width="50%"><strong>Name: </strong>
									<?php echo $result->father_fname; ?>
									<?php echo $result->father_mname; ?>
									<?php echo $result->father_lname; ?>
								</td>
								<td width="50%"><strong> Status: </strong>
									<?php echo $result->fatherstatus; ?>
								</td>
							</tr>
							<tr>
								<td width="50%"><strong>Occupation: </strong>
									<?php echo $result->father_occupation; ?>
								</td>
								<td width="50%"><strong>Educational Attainment: </strong>
									<?php echo $result->Father_Educ; ?>
								</td>
							</tr>
							<tr>
								<td width="50%"><strong>Contact numbers: </strong>
									<?php echo $result->father_contactnum; ?>
								</td>
								<td width="50%"></td>
							</tr>
							<tr>
								<th>Mother's information</th>
								<td></td>
							</tr>
							<tr>
								<td width="50%"><strong>Name: </strong>
									<?php echo $result->mother_fname; ?>
									<?php echo $result->mother_mname; ?>
									<?php echo $result->mother_lname; ?>
								</td>
								<td width="50%"><strong>Status: </strong>
									<?php echo $result->motherstatus; ?>
								</td>
							</tr>
							<tr>
								<td width="50%"><strong>Occupation: </strong>
									<?php echo $result->mother_occupation; ?>
								</td>
								<td width="50%"><strong>Educational Attainment: </strong>
									<?php echo $result->mother_Educ; ?>
								</td>
							</tr>
							<tr>
								<td width="50%"><strong>Contact numbers: </strong>
									<?php echo $result->mother_contactnum; ?>
								</td>
								<td></td>
							</tr>
						</table>
					</div>

				</div>


				<!-- </div> -->
				<!-- end of table -->
				<!-- Whole table -->
				<div style="height: 26px"></div>
				<div class="card shadow-sm">

					<div class="card-body bg-transparent border-0">
						<div class="text-right">
							<a href="index.php?view=edited&id= <?php echo $result->scholar_id ?>">
								<button type="button" class="btn btn-success btn-floating">
									<i class="fa fa-pencil-square-o"></i>
								</button>
							</a>
						</div>
						<h4 class="mb-0"><i class="	fas fa-user-friends pr-3"></i>Educational Information</h4>
					</div>
					<div class="card-body pt-0">
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div> -->
						<table class="table table-striped table-hover table-sm">
							<tr>
								<th colspan="3">Primary</th>
							</tr>
							<tr>
								<td><strong>School :
										<?php echo $result->primary_school; ?>
									</strong></td>
								<td><strong>Period of Attendance :</strong>
									<?php echo $result->primary_year_from; ?> -
									<?php echo $result->primary_year_to; ?>
								</td>
							</tr>
							<th colspan="3">Secondary</th>
							<tr>
								<td><strong>School : </strong>
									<?php echo $result->secondary_school; ?>
								</td>
								<td><strong>Period of Attendance :</strong>
									<?php echo $result->secondary_year_from; ?> -
									<?php echo $result->secondary_year_to; ?>
								</td>

							</tr>

							<tr>
								<th colspan="3">Tertiary</th>
							</tr>
							<tr>
								<td><strong>School : </strong>
									<?php echo $result->school; ?>
								</td>
								<td><strong>Period of Attendance :</strong>
									<?php echo $result->tertiary_year_from; ?> -
									<?php echo $result->tertiary_year_to; ?>
								</td>
							</tr>


						</table>
					</div>

				</div>
				<!-- end of whole table -->
				<!-- Whole table -->
				<div style="height: 26px"></div>
				<div class="card shadow-sm">

					<div class="card-body bg-transparent border-0">
						<div class="text-right">
							<a href="index.php?view=editapp&id= <?php echo $result->scholar_id ?>">
								<button type="button" class="btn btn-success btn-floating">
									<i class="fa fa-pencil-square-o"></i>
								</button></a>
						</div>
						<h4 class="mb-0"><i class="	fas fa-user-friends pr-3"></i>Scholar Application
							Information
						</h4>
					</div>
					<div class="card-body pt-0">
						<table class="table table-striped table-hover table-sm">
							<tr>
								<td colspan="2"><strong>Name of School :
										<?php echo $result->school; ?>
									</strong></td>
							</tr>
							<tr>
								<td><strong>Course : </strong>
									<?php echo $result->Course; ?>
								</td>
								<td><strong>Year Level : </strong>
									<?php echo $result->year_level; ?>

							</tr>
						</table>
					</div>

				</div>
				<!-- end of whole table -->

				<div style="height: 26px"></div>

			</div>


		</div>
		<!-- end of whole student form -->

		<script>
function updateNotificationStatus(id) {
  // Code to be executed when the button is clicked
  alert("Button clicked! " + id);
  
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "update_notification.php?id=" + id, true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the PHP script
    //   alert(xhr.responseText);
      // Additional logic or actions can be performed here
    }
  };
  xhr.send();
}
</script>