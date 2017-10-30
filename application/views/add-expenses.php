<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Add other expenses</h1>
                    </div>
                </div>
                
             <div class="row">
            
            <div class=" col-md-12 col-sm-12">



                
            <form method="post">
                   
                    <div class="form-group">
                       
                      
                      <div class="col-md-4">
                       
                        <label for="LRNO">LRNO</label>
                        <?PHP
							
							$vechile_success = $this->session->userdata('vehiclerepair_success');
							$vechile_success = explode("_",$vechile_success);
							$LRNO=$vechile_success[0];
						?>
                        <input type="text" class="form-control" id="LRNO" placeholder="LR Number" value="<?PHP echo $LRNO; ?>" disabled="disabled" />
                      </div>
                      
                       <div class="clearfix"> </div>
                    </div>
                    
                        
                      
                      
                      
                    
                    <div class="form-group expenses">
                    
                   		<div class="firstexpense total_expenses">
                         	<div class="col-md-4 " >
                                <label for="expensenature">Nature Of expense</label>
                                <input type="text" class="form-control expensenature" id="expensenature" name="expensenature[]" placeholder="Nature Of Expense" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="ExpenseAmount">Amount</label>
                                <input type="text" class="form-control ExpenseAmount" id="ExpenseAmount" name="ExpenseAmount[]" placeholder="Amount" />
                           	</div>
                               
                          	<i class="fa fa-plus-circle addmore addmore_expenses" id="addmoreexpenses" aria-hidden="true"></i>
                            <div class="clearfix"> </div>
                          </div>
                               
                        
                       
                    </div>
                    
                   
                     <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <button type="button" class="btn btn-success" id="expenses_btn">Proceed to other expenses</button>
                         <span class="expenses_errmsg err-msg"></span>
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>