<?php
	 // if (!isset($_SESSION['TYPE'])=='Administrator'){
  //     redirect(web_root."index.php");
  //    }

?>
	 <div class="row">
      <div class="col-lg-12"> 
            <h3 >Manage Users <small>|  <label class="label label-xs" style="font-size: 20px"><a href="index.php?view=add">  <i class="fa fa-plus-circle fw-fa" style="color: #00bcd4"> New</a></i></label> |</small></h3> 
       		 
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
			    <form action="controller.php?action=delete" Method="POST">  					
				<table id="example" class="table table-hover" cellspacing="0" style="font-size:12px" >
				
				  <thead>
				  	<tr>
				  		<th>No.</th>
				  		<th>
				  		 <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
				  		 Account Name</th>
				  		<th>Username</th>
						<th>User Role</th>
						<th>Email</th>
						<th>Status</th>
				  		<th width="10%">Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		
				  		$mydb->setQuery("SELECT * 
											FROM  `user_acc`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->NAME. '</td>';
				  		echo '<td>'. $result->username.'</td>';
						echo '<td>'. $result->TYPE.'</td>';
						echo '<td>'. $result->username.'</td>';
						echo '<td>'. $result->account_status.'</td>';
				  		// echo '<td>'. $result->TYPE.'</td>';
				  		echo '<td width="5%" > 
								<a title="Edit" href="index.php?view=edit&id='.$result->USERID.'" class="btn btn-info btn-sm" >
								<i class="fa fa-edit fa-xs">
								</i>
									</a>
									
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 


				
				</form> 