<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Add vechile repairs</h1>
                    </div>
                </div>
                
             <div class="row">
            
            <div class=" col-md-12 col-sm-12">
                
            <form method="post">
                   
                    <div class="form-group">
                       
                      
                      <div class="col-md-4">
                       
                        <label for="LRNO">LRNO</label>
                        <?PHP
							
							$penality_success = $this->session->userdata('penality_success');
							$penality_success = explode("_",$penality_success);
							$LRNO=$penality_success[0];
						?>
                        <input type="text" class="form-control" id="LRNO" placeholder="LR Number" value="<?PHP echo $LRNO; ?>" disabled="disabled" />
                      </div>
                      
                       <div class="clearfix"> </div>
                    </div>
                    
                        
                      
                      
                      
                    
                    <div class="form-group repairs">
                    
                   		<div class="firstrepair total_repairs">
                         	<div class="col-md-4 " >
                                <label for="RepairNature">Nature Of Repair</label>
                                <input type="text" class="form-control RepairNature" id="RepairNature" name="RepairNature[]" placeholder="Nature Of Reapir" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="RepairAmount">Repair Amount</label>
                                <input type="text" class="form-control RepairAmount" id="RepairAmount" name="RepairAmount[]" placeholder="Repair Amount" />
                           	</div>
                               
                          	<i class="fa fa-plus-circle addmore addmore_repairs" id="addmorerepairs" aria-hidden="true"></i>
                            <div class="clearfix"> </div>
                          </div>
                               
                        
                       
                    </div>
                    
                   
                     <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <button type="button" class="btn btn-success" id="reapirs_btn">Proceed to other expenses</button>
                         <span class="repair_errmsg err-msg"></span>
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>