<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Edit Penalities</h1>
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
                    
                        
                      
                      
                      
                    
                    <div class="form-group penalities">
                   <?PHP
				   $cnt = 0 ;
				   
				   	foreach( $penalities->result() as $penality)
					{
						$cnt++;
						if($cnt==1)
						{
				   ?> 
                   		<div class="firstpenality total_penalities penality_<?PHP echo $penality->PenaltyId?>" id="<?PHP echo $penality->PenaltyId?>">
                         	<div class="col-md-4 " >
                                <label for="PenalityNature">Nature Of Penality</label>
                                <input type="text" class="form-control PenalityNature"  name="PenalityNature[]" value="<?PHP echo $penality->PenalityFor;?>" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="PenalityAmount">Penality Amount</label>
<input type="text" class="form-control PenalityAmount"  name="PenalityAmount[]" value="<?PHP echo $penality->PenalityAmount;?>"  />
                           	</div>
                               
                          	<i class="fa fa-times delete_editpenality" aria-hidden="true" delexp="<?PHP echo $penality->PenaltyId; ?>" ></i>
                            &nbsp;&nbsp;
                            <i class="fa fa-plus-circle addmore addmore_editpenalities" id="addmorepenalities" aria-hidden="true"></i>
                            <div class="clearfix"> </div>
                          </div>
                          
                          <?PHP
							}//if its the first one
							else
							{
								?>
                                
                         <div class="morepenalities total_penalities penality_<?PHP echo $penality->PenaltyId?>"  id="<?PHP echo $penality->PenaltyId; ?>">
                         
                    <div class="col-md-4 " >
                   		 <label for="PenalityNature">Nature Of Penality</label>
                  		  <input type="text" class="form-control PenalityNature"  name="PenalityNature[]" value="<?PHP echo $penality->PenalityFor;?>" />
                    </div>
                    
                    <div class="col-md-4">
                  	 	 <label for="PenalityAmount">Penality Amount</label>
                 	  	 <input type="text" class="form-control PenalityAmount"  name="PenalityAmount[]" value="<?PHP echo $penality->PenalityAmount;?>"  />
                    </div>
                               
                          	<i class="fa fa-times delete_editpenality" aria-hidden="true" delexp="<?PHP echo $penality->PenaltyId; ?>"></i>
                            <div class="clearfix"> </div>
                          </div>
                                
                                
                                <?PHP
								
							}
						 
						  }
						  ?>
                               
                       
                       
                    </div>
                    
                   
                     <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <button type="button" class="btn btn-warning" id="update_penalities">Update penalities</button>
                           <span class="penality_errmsg err-msg"></span>
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>