<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Edit Other expenses</h1>
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
                    
                        
                      
                      
                      
                    
                    <div class="form-group expenses">
                   <?PHP
				   $cnt = 0 ;
				   
				   	foreach( $expenses->result() as $exp)
					{
						$cnt++;
						if($cnt==1)
						{
				   ?> 
                   		<div class="firstexpense total_expenses Expense_<?PHP echo $exp->ExpenseId?>" id="<?PHP echo $exp->ExpenseId?>">
                         	<div class="col-md-4 " >
                                <label for="ExpenseNature">Nature Of Expense</label>
                                <input type="text" class="form-control ExpenseNature "  name="ExpenseNature[]" value="<?PHP echo $exp->ExpensesNature;?>" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="ExpenseAmount">Amount</label>
<input type="text" class="form-control ExpenseAmount"  name="ExpenseAmount[]" value="<?PHP echo $exp->ExpenseAmount;?>"  />
                           	</div>
                               
                          	<i class="fa fa-times delete_editexpense" aria-hidden="true" delexp="<?PHP echo $exp->ExpenseId; ?>" ></i>
                            &nbsp;&nbsp;
                            <i class="fa fa-plus-circle addmore addmore_editexpenses" id="addmoreexpenses" aria-hidden="true"></i>
                            <div class="clearfix"> </div>
                          </div>
                          
                          <?PHP
							}//if its the first one
							else
							{
								?>
                                
                         <div class="moreexpenses total_expenses Expense_<?PHP echo $exp->ExpenseId?>"  id="<?PHP echo $exp->ExpenseId; ?>">
                         
                   			 <div class="col-md-4 " >
                                <label for="ExpenseNature">Nature Of Expense</label>
                                <input type="text" class="form-control ExpenseNature"  name="ExpenseNature[]" value="<?PHP echo $exp->ExpensesNature;?>" />
                          	</div>
                                
                         	 <div class="col-md-4">
                                <label for="ExpenseAmount">Amount</label>
<input type="text" class="form-control ExpenseAmount"  name="ExpenseAmount[]" value="<?PHP echo $exp->ExpenseAmount;?>"  />
                           	</div>
                               
                          	<i class="fa fa-times delete_editexpense" aria-hidden="true" delexp="<?PHP echo $exp->ExpenseId; ?>"></i>
                            <div class="clearfix"> </div>
                          </div>
                                
                                
                                <?PHP
								
							}
						 
						  }
						  ?>
                               


                    </div>
                    
                   
                     <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <button type="button" class="btn btn-warning" id="update_expenses">Update Expenses</button>
                           <span class="expense_errmsg err-msg"></span>
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>