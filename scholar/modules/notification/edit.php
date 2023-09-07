<?php  
    if(!isset($_SESSION['USERID'])){
  redirect(web_root."admin/index.php");
}

  @$id = $_GET['id'];
  if($id==''){
    redirect("index.php");

}
  $announcement = New Announcement();
  $res = $announcement->single_announcement($id);
  ?> 

  <style type="text/css">
  .row {
    margin-bottom: 10px;
  }
  </style>
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="">Update Announcement!</h3>
    </div>
    <!-- /.col-lg-12 -->
  </div> 

  <div class="row">
    <div class="col-md-11">
      <div class="form-group">
        <label class="bmd-label-floating">Body:</label> 
        <input name="id_announcement" type="hidden" value="<?php echo $res->id_announcement; ?>">
        <textarea class="form-control" id="announcement_desc" name="announcement_desc"><?php echo $res->announcement_desc; ?></textarea>
      </div>
    </div>
  </div>               

  <div class="row"> 
    <button class="btn btn-info btn-round" name="save" type="submit"><span class="fa fa-save fw-fa"></span> Save</button>  
  </div> 
</form>
                 