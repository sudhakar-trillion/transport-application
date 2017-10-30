<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">View Transport data</h1>
                    </div>
                </div>
                
             <div class="row">
             <?PHP
			 if( $this->input->post('transport_datafilter'))
			{	
			
			if(trim($this->input->post('searchby_lrno'))!='')
			{
				$LRNO = trim($this->input->post('searchby_lrno'));
			}
			
			if(trim($this->input->post('searchby_customer'))!='')
			{
				$CustomerName = trim($this->input->post('searchby_customer'));
			}
				
			}
			else 
			{
				if($this->session->flashdata('searchby_lrno')!='')
				{
					$LRNO = trim($this->session->flashdata('searchby_lrno'));
					$this->session->set_flashdata('searchby_lrno',$LRNO);
				}
				
				if($this->session->flashdata('searchby_customer')!='')
				{
					
					$CustomerName = trim($this->session->flashdata('searchby_customer'));
					$this->session->set_flashdata('searchby_customer',$CustomerName);
				}
			}
			 
			 ?>
             
             
             <?PHP if( $this->session->flashdata('data_added')!='' ) { echo $this->session->flashdata('data_added'); } ?>
                
                <form method="post">
                 <div class="col-md-3 filterzone">
                     <input type="text" class="form-control lrnos" name="searchby_lrno" placeholder="Search by LRNO"  value="<?PHP echo @$LRNO; ?>"   /> 
                     </div>
                   <div class="col-md-3 filterzone">
                     <input type="text" class="form-control customers" name="searchby_customer" placeholder="Search by customer" value="<?PHP echo @$CustomerName;?>" /> 
                     </div>
                     
                      <div class="col-md-3 filterzone">
                     <input type="submit" class="btn btn-primary" name="transport_datafilter" value="search"  /> 
                     </div>   
                 </form>    
                <div class="col-md-12">
                
                     <!--    Hover Rows  -->
                    
                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Transport-data
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Slno</th>
                                            <th>LRNO</th>
                                            <th>Customer</th>
                                            <th>Mobile No</th>
                                            
                                            <th>Material</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                          
                                            <th>Transport Details</th>
                                            
                                           
                                            <th>Expenses Details</th>
                                         <!--   <th >Actions</th>-->
                                        </tr>
                                        
                                        <tbody>
                                        <?PHP
											if($transportdata!='0')
											{
												if($this->uri->segment(2)=='')
													$slno=1;
												else
													$slno=$this->uri->segment(2);
												foreach($transportdata->result() as $transport)
												{
													
										?>
                                                <tr>
                                                	<td><?PHP echo $slno;?> </td>
                                                    <td><?PHP echo $transport->LRNO;?> </td>
                                                    <td><?PHP echo $transport->CustomerName;?>  </td>
                                                    
                                                    <td><?PHP echo $transport->MobileNumber;?> </td>
                                                    <td><?PHP echo $transport->DispatchMaterial;?> </td>
                                                    <td><?PHP echo $transport->Size;?> </td>
                                                    
                                                    <td><?PHP echo $transport->Quantity;?> </td>
 <td><a data-toggle="modal" data-target="#transport" page='view-data' id="<?PHP echo $transport->LRNO."_".$transport->SLNO;?>" class="btn btn-sm btn-warning transportpopup"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
  
 <td><a data-toggle="modal" data-target="#expenses" page='view-data' id="<?PHP echo $transport->LRNO."-".$transport->SLNO;?>" class="btn btn-sm btn-success expensespopup"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
<!--  <td><a id="<?PHP echo $transport->LRNO."-".$transport->SLNO;?>" class="btn btn-sm btn-primary">Edit</a></td>-->
                                                </tr>
                                             <?PHP
												$slno++;
												}//foreach ends here
											}//if ends here
											 ?>   
                                             
                                              <tr>
                                	<td colspan="12"><?PHP echo $pagination_string;?> </td>
                                    <td> </td>
                                </tr>   
                                        </tbody>
                                        
                                        
                                    </thead>
                                    
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                    
                   
                </div>
                 <div class="clearfix"></div>
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>