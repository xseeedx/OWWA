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
              <h3 class="">Update Announcement</h3>
            </div>
        </div> 


                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Title:</label> 
                          <input name="ANNOUNCEMENTID" type="hidden" value="<?php echo $res->ANNOUNCEMENTID ; ?>">
                            <input class="form-control input-sm" id="ANNOUNCEMENT_TEXT" name="ANNOUNCEMENT_TEXT"  type="text" value="<?php echo $res->ANNOUNCEMENT_TEXT ; ?>">
                          </div>
                      </div>
                    </div> 

                    <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Body:</label> 
                            <textarea  class="form-control input-sm" id="ANNOUNCEMENT_WHAT" name="ANNOUNCEMENT_WHAT"><?php echo $res->ANNOUNCEMENT_WHAT; ?></textarea>
                          </div>
                      </div>
                    </div>  


                <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">When (mm/dd/yyyy hh:mm) :</label> 
                            <div class='input-group date'>
                              <input type='text' id="datetimepicker2" name="ANNOUNCEMENT_WHEN" class="form-control TRANSDATE" value="<?php echo $res->ANNOUNCEMENT_WHEN;?>" />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                        </div>
                      </div>
                    </div>


              <div class="row">
                    <div class="col-md-11">
                      <div class="form-group">
                      <label class="bmd-label-floating">Location:</label> 
                            <input class="form-control input-sm" id="ANNOUNCEMENT_WHERE" name="ANNOUNCEMENT_WHERE"  type="text" value="<?php echo $res->ANNOUNCEMENT_WHERE ; ?>">
                        </div>
                      </div>
                    </div>
                  
                

              
              <div class="row"> 
                        <button class="btn btn-info btn-round" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button>  
              </div> 

          </form>