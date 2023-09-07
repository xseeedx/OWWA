<?php
	if (!isset($_SESSION['USERID'])) {
		redirect(web_root . "admin/index.php");
	}

	?>
	<style>
		#example {
			white-space: nowrap;
		}

		.dropdown {
			position: relative;
			display: inline-block;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			right: 0;
			font-weight: small;
			min-width: 160px;
			padding: 8px;
			background-color: #ffffff;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			z-index: 1;
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

		.meatballs {
			width: 20px;
			height: 20px;

			border-radius: 50%;
			margin-left: 10px;
			cursor: pointer;
		}

		.dot {
			width: 4px;
			height: 4px;
			margin: 3px;
			background-color: #b0b3b8;
			border-radius: 50%;
		}

		.links-hidden {
			color: black;
		}
	</style>



	<div class="row">
		<div class="col-lg-12">
			<h3 class=" r">List of Announcements
				<small>|
					<label class="label label-sm" style="font-size: 20px">
						<a href="index.php?view=add">
							<i class="fa fa-plus-circle fw-fa" ></i>
							New Announcement
						</a>
					</label>
				</small>
			</h3>

		</div>
		<!-- /.col-lg-12 -->
	</div>
	<form action="controller.php?action=delete" method="POST">
		<div class="w-100">
			<table id="example" class="table table-striped" style="font-size: 12px" cellspacing="0">
				<thead>
					<tr>
						<th width="5%">#</th>

						<th>Body</th>
						<th>Status</th>
						<th>Author</th>
						<th>Created</th>
						<th width="10%">Actions</th>

					</tr>
				</thead>
				<tbody>

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
						echo '<tr>';
						echo '<td width="5%" align="center"></td>';
						// echo '<td>' . $result->ANNOUNCEMENTID.'</a></td>';

						echo '<td class="tds">' . $result->announcement_desc . '</td>';
						echo '<td class="tds">' . $result->announcement_stat . '</td>';
						echo '<td>' . $result->author . '</td>';
						echo '<td>' . $result->date_posted . '</td>';

						echo '<td  width="10%" > 
						<a title="View Inormation" href="index.php?view=view&id='.$result->id_announcement.'" class="btn btn-default btn-sm "><i class="fa fa-info fa-fw"></i></a>
						<a title="Edit" href="index.php?view=edit&id='.$result->id_announcement.'" class="btn btn-info btn-sm" ><i class="fa fa-pencil fa-fw"></i></a>
						<a title="Delete" href="controller.php?action=delete&id='.$result->id_announcement.'" class="btn btn-danger btn-sm" ><i class="fa fa-bitbucket  fa-fw"></i></a></td>';
		
						echo '</tr>';
					}
					?>
				</tbody>
			</table>
		</div>
	</form>

	