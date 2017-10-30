<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Edit Repairs</h1>
                    </div>
                </div>
                
             <div class="row">
            
            <div class=" col-md-12 col-sm-12">
                
            <form method="post">
                   
                    <div class="form-group">
                       
                      <?PHP
							
							$table='dataform';
							$cond=array();
							
							$cond['SLNO'] = $this->uri->segment(3);
							
							$field='LRNO';
							
							$LRNO =$this->Commonmodel->getafield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');

					  ?>
                      <div class="col-md-4">
                       
                        <label for="LRNO">LRNO</label>
                        <input type="text" class="form-control" id="LRNO" placeholder="LR Number" value="<?PHP echo $LRNO; ?>" disabled="disabled" />
                         <input type="hidden" class="form-control" id="SLNO" value="<?PHP echo $this->uri->segment(3); ?>"/>
                      </div>
                      
                       <div class="clearfix"> </div>
                    </div>
                    
                        
                      
                      
                      
                    
                    <div class="form-group repairs">
                   <?PHP
				   $cnt = 0 ;
				   
				   	foreach( $repairs->result() as $repair)
					{
						$cnt++;
						if($cnt==1)
						{
				   ?> 
                   		<div class="firstrepair total_repairs Repair_<?PHP echo $repair->RepairId?>" id="<?PHP echo $repair->RepairId?>">
                         	<div class="col-md-4 " >
                                <label for="RepairNature">Nature Of Repair</label>
                                <input type="text" class="form-control RepairNature "  name="RepairNature[]" value="<?PHP echo $repair->NatureRepair;?>" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="RepairAmount">Reapir Amount</label>
<input type="text" class="form-control RepairAmount"  name="RepairAmount[]" value="<?PHP echo $repair->RepairAmount;?>"  />
                           	</div>
                               
                          	<i class="fa fa-times delete_editrepair" aria-hidden="true" delexp="<?PHP echo $repair->RepairId; ?>" ></i>
                            &nbsp;&nbsp;
                            <i class="fa fa-plus-circle addmore addmore_editpenalities" id="addmorerepairs" aria-hidden="true"></i>
                            <div class="clearfix"> </div>
                          </div>
                          
                          <?PHP
							}//if its the first one
							else
							{
								?>
                                
                         <div class="morerepairs total_repairs Repair_<?PHP echo $repair->RepairId?>"  id="<?PHP echo $repair->RepairId; ?>">
                         
                   			 <div class="col-md-4 " >
                                <label for="RepairNature">Nature Of Repair</label>
                                <input type="text" class="form-control RepairNature"  name="RepairNature[]" value="<?PHP echo $repair->NatureRepair;?>" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="RepairAmount">Repair Amount</label>
<input type="text" class="form-control RepairAmount"  name="RepairAmount[]" value="<?PHP echo $repair->RepairAmount;?>"  />
                           	</div>
                               
                          	<i class="fa fa-times delete_editrepair" aria-hidden="true" delexp="<?PHP echo $repair->RepairId; ?>"></i>
                            <div class="clearfix"> </div>
                          </div>
                                
                                
                                <?PHP
								
							}
						 
						  }
						  ?>
                               

                       
                    </div>
                    
                   
                     <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <button type="button" class="btn btn-warning" id="update_repairs">Update Repairs</button>
                           <span class="repair_errmsg err-msg"></span>
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>