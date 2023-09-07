  <?php 
                      if(!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }

                        ?> 
  
  <form class="form-horizontal span6" action="controller.php?action=add" method="POST">
                  <div class="row">
        <div class="col-lg-12">
              <h3 class="">Post New Announcement</h3>
            </div>
        </div>   
            
                    <div class="row">
                      <div class="col-md-9">
                      <div class="form-group">
                        
                          <label class="bmd-label-floating">Body:</label> 
                              <textarea  class="form-control " id="announcement_desc" name="announcement_desc"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label class="bmd-label-floating">Recipient:</label>
                            <select class="form-control" id="Recipient" name="Recipient">
                              <option value="scholar">Scholar</option>
                              <option value="parent">Parent</option>
                              <option value="Parent and Scholar">Parent and Scholar</option>
                            </select>
                          </div>
                        </div>

                    </div>     
              
              <div class="row">
                      <div class="col-md-11"> 
                        <button class="btn btn-info btn-round" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button>  
                        </div>
                      </div>  
            
          </form>
        