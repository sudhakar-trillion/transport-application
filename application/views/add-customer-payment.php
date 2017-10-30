<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Add customer payment</h1>
                    </div>
                </div>
                
             <div class="row">
            
            <div class=" col-md-12 col-sm-12">
                
            <form method="post">
                   
                    <div class="form-group">
                       
                       <div class="col-md-2">
                       
                        <label for="subadmin">&nbsp;</label>
                        <input type="text" class="form-control lrnos" id="subadmin" name="subadmin" placeholder="LR number" value="<?PHP echo set_value('subadmin');?>" />
                        <span class="err-msg lr_req"></span>
                      </div>
                      
                      <div class="col-md-2" style="margin-top:33px">
                       
                        <input type="button" id="getlrdetails" class="btn btn-sm btn-success" value="get details" />
                        
                      </div>
                    
                       <div class="clearfix"> </div>
                    </div>
                   
            </form>
                
                
            </div>
              
            </div>
            
            <div class="row">
            	
                <div class="col-md-12 transportdetails">
                
                </div>
            </div>
            
            
            <div class="row paymentsection">
            	<form id="payment_form">
                <div class="col-md-12">
                        <h3 class="page-head-line h3title" style="margin-top:0px">Add customer payment</h3>
                    </div>
                
                <div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="Totalamount">Amount</label>
								<input type="text" class="form-control" name="Totalamount" id="Totalamount"  />
                           	</div>
                          </div>
                          
                          <div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="discount">Discount</label>
								<input type="text" class="form-control discount" id="discount" placeholder="Discount"  />
                           	</div>
                          </div>
                          
                          <div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="discount_in">Discount in</label>
								<select name="discount_in" id="discount_in" class="form-control">
                                <option value="0" >Seelct disccount in </option>
                                
                                <option value="flat">Flat</option>
                                <option value="pecentage">Percentage</option>
                                </select>
                           	</div>
                          </div>
                          
                          
                          <div class="col-md-12">
                         	<div class="col-md-4">
                                <label for="afterdiscount">Pay after discount</label>
								<input type="text" class="form-control discount" id="afterdiscount" readonly="readonly"  />
                           	</div>
                          </div>
                          
                          
                          <div class="col-md-12 cashCheque">
                         	<div class="col-md-4">
                                <label for="Cash_Cheque">Cash/Cheque</label><br />
								<input type="radio" name="Cash_Cheque" class="Cash_Cheque" value="cash" />Cash
                                <input type="radio" name="Cash_Cheque" class="Cash_Cheque" value="cheque" />Cheque 	
                           	</div>
                          </div>
                          
                          
                          <div class="col-md-12 chequedetails">
                         	
                            <div class="col-md-4">
                                <label for="chequeno">Cheque Number</label>
								<input type="text" class="form-control chequeno" id="chequeno" placeholder="Cheque Number"  />
                           	</div>
                            
                            <div class="col-md-4">
                                <label for="bank">Bank</label>
								<input type="text" class="form-control bank" id="bank" placeholder="Bank Name"  />
                           	</div>
                             <div class="clearfix"> </div>
                          </div>
                          
                          <div class="col-md-12 ">
                         	
                            <div class="col-md-4">
                                <label for=""></label>
								<input type="button" class="btn btn-primary" id="adpayment_btn" value="Add payment">
                           	</div>
                            
                          </div>
                          
                          
                          
                
                <div class="clearfix"> </div>
              
               </form> 
                
            </div>
            
            
            
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>