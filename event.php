  	<?php 
 	$sql = "SELECT * FROM `tblblogpost` WHERE CATEGORY='EVENT' ORDER BY `DATEPOSTED` DESC";
		$mydb->setQuery($sql);
		$blog = $mydb->loadResultList();
	foreach ($blog as $result) {  

 // // `BLOGS`, `BLOG_WHAT`, `BLOG_WHEN`, `BLOG_WHERE`, `DATEPOSTED`
	?>

 <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
            <div class="box">
              <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
              <h4 class="title">  <a href="<?php echo web_root ?>index.php?q=blog&id=<?php echo $result->BLOGID; ?>"><?php echo $result->BLOGS ;?> </a></h4>
              <p class="description"><?php echo $result->BLOG_WHAT; ?> on  <?php echo $result->BLOG_WHEN.' @  '.$result->BLOG_WHERE; ?>  </p>
              <p><span class="fa fa-calendar"></span> Posted on  <?php echo  dateFormat($result->DATEPOSTED,"d M Y h:i a"); ?></p>
            </div>
          </div>

<?php } ?>