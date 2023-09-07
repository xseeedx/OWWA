<?php
			if(!isset($_SESSION['USERID'])){
			redirect(web_root."scholar/index.php");
		}

		?>
		<style>
		#example{
			white-space: nowrap;
		}
		.comment-box {
		display: flex;
		align-items: center;
		margin-bottom: 15px;
		}

		textarea {
		flex-grow: 1;
		height: 40px;
		border: 1px solid #ccc;
		border-radius: 4px;
		padding: 8px;
		resize: none;
		}

		.btn-submit {
		background-color: blue;
		color: white;
		border: none;
		border-radius: 4px;
		padding: 8px 16px;
		cursor: pointer;
		margin-left: 5px;
		}

			</style>
			<div class='card-body'>
		<?php   
		
		// $mydb->setQuery("SELECT * 
				// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
		$mydb->setQuery("SELECT * 
							FROM  `announcement` ORDER BY id_announcement DESC");
		$cur = $mydb->loadResultList();

		foreach ($cur as $result) {
			if ($result->announcement_stat == 'hidden') {
				continue; // Skip this iteration of the loop
			}
			
			echo "<div class='card p-2 bg-light text-dark'> ";
			echo "<div class='card-body'> <h3>Announcement &nbsp;<label> $result->date_posted </label></h3>";
			echo  '<div class="row">
						<div class="col-md-11">
			  				<div class="form-group">
			  					'. $result->announcement_desc.'
			  				</div>
			  			</div>';
			echo "</div>";
			// echo'<div class="comment-box">';
			echo  '<div class="row">
						<div class="col-md-10">
				  			<div class="form-group">	  
							</div>
			  			</div>
						<div class="col-md-2">
							<div class="form-group">
								<button class="btn btn-info btn-round"><a href="index.php?view=add&id='.$result->id_announcement.'" style="color: #FFFFFF">Add comment</a></button>';
			echo'			</div>
						</div>
					</div>
				</div>';
			// echo "</div>";
			echo "</div>";
			echo "&nbsp;";
		}

?>
</div>
	