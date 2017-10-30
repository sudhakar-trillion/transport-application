<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Add Penalities</h1>
                    </div>
                </div>
                
             <div class="row">
            
            <div class=" col-md-12 col-sm-12">
                
            <form method="post">
                   
                    <div class="form-group">
                       
                      <?PHP
							$dataid= explode("Yes_",$this->session->userdata('step1_success'));
							$table='dataform';
							$cond=array();
							
							$cond['SLNO'] = $dataid[1];
							
							$field='LRNO';
							
							$LRNO =$this->Commonmodel->getafield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');
					  ?>
                      <div class="col-md-4">
                       
                        <label for="LRNO">LRNO</label>
                        <input type="text" class="form-control" id="LRNO" placeholder="LR Number" value="<?PHP echo $LRNO; ?>" disabled="disabled" />
                      </div>
                      
                       <div class="clearfix"> </div>
                    </div>
                    
                        
                      
                      
                      
                    
                    <div class="form-group penalities">
                    
                   		<div class="firstpenality total_penalities">
                         	<div class="col-md-4 " >
                                <label for="PenalityNature">Nature Of Penality</label>
                                <input type="text" class="form-control PenalityNature" id="PenalityNature" name="PenalityNature[]" placeholder="Nature Of Penality" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="PenalityAmount">Penality Amount</label>
                                <input type="text" class="form-control PenalityAmount" id="PenalityAmount" name="PenalityAmount[]" placeholder="Penality Amount" />
                           	</div>
                               
                          	<i class="fa fa-plus-circle addmore addmore_penalities" id="addmorepenalities" aria-hidden="true"></i>
                            <div class="clearfix"> </div>
                          </div>
                               
                        
                       
                    </div>
                    
                   
                     <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <button type="button" class="btn btn-warning" id="penalities_btn">Proceed to vehicle repairs</button>
                           <span class="penality_errmsg err-msg"></span>
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>