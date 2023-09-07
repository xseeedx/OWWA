<?php 
  $sql = "SELECT * FROM `tblblogpost` WHERE CATEGORY='ANNOUNCEMENT' ORDER BY `DATEPOSTED` DESC";
    $mydb->setQuery($sql);
    $blog = $mydb->loadResultList();

  ?>



<!--   <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </p>
 -->

 <?php
  foreach ($blog as $result) {  

 // // `BLOGS`, `BLOG_WHAT`, `BLOG_WHEN`, `BLOG_WHERE`, `DATEPOSTED`
 ?> 
<div class="col-lg-6 content order-lg-1 order-2">
  <div class="icon-box wow fadeInUp">
    <div class="icon"><i class="fa fa-shopping-bag"></i><p style="font-size: 9px;font-weight: bolder;"><?php echo date_format(date_create($result->DATEPOSTED),'M d, Y'); ?></p></div><a href="<?php echo web_root ?>index.php?q=blog&id=<?php echo $result->BLOGID; ?>">
    <h4 class="title"><?php echo $result->BLOGS ;?> 
     </a></h4>
    <p class="description"><?php echo $result->BLOG_WHAT?> </p>
  </div>  
</div>
<?php  } ?>
 