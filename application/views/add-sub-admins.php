<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Add sub admin</h1>
                    </div>
                </div>
                
             <div class="row">
            
            <div class=" col-md-12 col-sm-12">
                
            <form method="post">
                   
                    <div class="form-group">
                       
                       <div class="col-md-6">
                       
                        <label for="subadmin">Sub Admin Name</label>
                        <input type="text" class="form-control" id="subadmin" name="subadmin" placeholder="Sub admin name" value="<?PHP echo set_value('subadmin');?>" />
                        <span class="err-msg"><?PHP echo form_error('subadmin');?></span>
                      </div>
                      
                      <div class="col-md-6">
                       
                        <label for="loginid">Login Id</label>
                        <input type="text" class="form-control" id="loginid" name="loginid" placeholder="Login Id" value="<?PHP echo set_value('loginid');?>" />
                      <span class="err-msg"><?PHP echo form_error('loginid');?></span>
                      </div>
                    
                       <div class="clearfix"> </div>
                    </div>
                   
                   
                    
                     <div class="form-group">
                     
                     
                      <div class="col-md-6">
                       
                       <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" />
                          <span class="err-msg"><?PHP echo form_error('password');?></span>
                      </div>
                      
                      <div class="col-md-6">
                       
                       <label for="confpwd">Confirm Password</label>
                        <input type="text" class="form-control" id="confpwd" name="confpwd" placeholder="Enter confirm password" />
                          <span class="err-msg"><?PHP echo form_error('confpwd');?></span>
                      </div>
                     
                      <div class="clearfix"> </div>
                        
                    </div>
                    
                    <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <input type="submit" class="btn btn-primary" name="createuser" value="Create user" />
                         
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>