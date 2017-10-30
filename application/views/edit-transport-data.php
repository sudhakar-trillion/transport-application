<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">Edit transport data</h1>
                    </div>
                </div>
                
             <div class="row">
            
            <div class=" col-md-12 col-sm-12">
<?PHP

if($this->input->post('edittransportdata'))
{
	extract($_POST);

	$Size=$size;
	
	if(trim($customer)=='') { $customerrequired="err-border";	}	
	
	//if(trim($LRNO)=='')	{		$LRNOrequired="err-border";		}
	
	if(trim($mobile)==''){		$mobilerequired="err-border";	}
	
	if($dispatchmaterial==''){	$dispatchmaterialrequired = 'err-border';}
	
	if($size==''){		$sizerequired = 'err-border';	}
	
	if($quantity==0){	$quantityrequired = 'err-border';	}
	
	if($From_Place==''){	$From_Placerequired = 'err-border'; }

	if($To_Place==''){	$To_Placerequired = 'err-border'; }
	
	if($Transport_Amount==''){	$Transport_Amountrequired = 'err-border'; }
	
	if($Vehicle_Type==''){	$Vehicle_Typerequired = 'err-border'; }
	
	if($Vehicle_No==''){	$Vehicle_Norequired = 'err-border'; }

	if($Driver_Name==''){	$Driver_Namerequired = 'err-border'; }

	if($driverpayment==''){	$driverpaymentrequired = 'err-border'; }
	
	if($hamalicharges==''){	$hamalichargesrequired = 'err-border'; }	
}	
else
{
	foreach($transportdata->result() as $data)
	{
		$customer = $data->CustomerName;
		$mobile = $data->MobileNumber;
		$dispatchmaterial = $data->DispatchMaterial;
		
		$Size = $data->Size;
		$quantity = $data->Quantity;
		
		$From_Place = $data->FromPlace;
		$To_Place = $data->ToPlace;
		
		$Transport_Amount = $data->TransportAmount;
		$Vehicle_Type = $data->VehicleType;
		
		$Vehicle_No = $data->VehicleNumber;
		$Driver_Name = $data->DriverName;
		
		$driverpayment = $data->DriverAmount;
		$hamalicharges = $data->HamaliCharges;
		
		$remarks = $data->Remarks;
		$slno = $data->SLNO;
	}
}

?>                
    <?PHP  if( $this->session->flashdata('update_transportdata')!='') { echo $this->session->flashdata('update_transportdata');  } ?>
            <form method="post">
                   
                    <div class="form-group">
                      
                       <div class="col-md-4">
                       <input type="hidden" name="slno" value="<?PHP echo $slno;?>" />
                        <label for="LRNO">LRNO<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$LRNOrequired; ?>" id="LRNO" name="LRNO" placeholder="LR Number" value="<?PHP echo $this->uri->segment(2);?>" readonly="readonly" />
                      </div>
                       <div class="col-md-4">
                       
                        <label for="customer">Customer Name<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$customerrequired; ?>" id="customer" name="customer" placeholder="Customer Name" value="<?PHP echo $customer; ?>" />
                        <span class="err-msg"></span>
                      </div>
                      
                      
                      <div class="col-md-4">
                       
                       <label for="mobile">Mobile Number<span class="required">*</span></label>
 <input type="text" class="form-control <?PHP echo @$mobilerequired; ?>" id="mobile" name="mobile" placeholder="Enter mobile" value="<?PHP echo $mobile;?>" />
                        
                      </div>
                      
                       <div class="clearfix"> </div>
                    </div>
                    
                     <div class="form-group">
                     
                     <div class="col-md-4">
                       
                       <label for="dispatchmaterial">Dispatch Material<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$dispatchmaterialrequired;?>" id="dispatchmaterial" name="dispatchmaterial" placeholder="Enter Dispatch Material"  value="<?PHP echo @$dispatchmaterial; ?>"/>
                      </div>
                     
                    <div class="col-md-4">
            	            <label for="size">Size<span class="required">*</span></label>
        	                <input type="text" name="size" id="size" class="form-control <?PHP echo @$sizerequired;?>" placeholder="Enter size" value="<?PHP echo $Size; ?>">
                        </div>
                          <div class="col-md-4">
                        <?PHP
								$quantities = $this->db->get('quantities');
						?>
    	                     <label for="quantity">Quantity<span class="required">*</span></label>
	                        <select name="quantity" id="quantity" class="form-control">
                            	<option value="0">Select quantity</option>
                                <?PHP
									foreach($quantities->result() as $quant)
									{
										?>
                                        <option value="<?PHP echo $quant->Quantity; ?>" <?PHP if(@$quantity==$quant->Quantity){ echo 'selected="selected"'; } ?> ><?PHP echo $quant->Quantity; ?></option>
                                        <?PHP	
									}
								?>
                            </select>
                        </div>     
                         
                         
                        
                         <div class="clearfix"> </div>
                    </div>
                    
                    
                    
                     <div class="form-group">
                       
                       <div class="col-md-4">
            	            <label for="From_Place">From Place<span class="required">*</span></label>
        	                <input type="text" class="form-control <?PHP echo @$From_Placerequired;?>" id="From_Place" name="From_Place" placeholder="From Place" value="<?PHP echo $From_Place; ?>" />
                        </div>
                          <div class="col-md-4">
                        
    	                     <label for="To_Place">To Place<span class="required">*</span></label>
<input type="text" class="form-control <?PHP echo @$To_Placerequired;?>" id="To_Place" name="To_Place" placeholder="To Place" value="<?PHP echo $To_Place;?>" />
                        </div>
                       
                       <div class="col-md-4">
                        <label for="Transport_Amount">Transport Amount<span class="required">*</span></label>
<input type="text" class="form-control <?PHP echo @$Transport_Amountrequired;?>" id="Transport_Amount" name="Transport_Amount" placeholder="Transport Amount" value="<?PHP echo $Transport_Amount;?>" />
                        </div>
                      
                        
                     <div class="clearfix"> </div>
                    </div>
                        
                      
                      <div class="form-group">
                      
                      <div class="col-md-4">
                        <label for="Vehicle_Type">Vehicle Type<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$Vehicle_Typerequired;?>"  id="Vehicle_Type" name="Vehicle_Type" placeholder="Vehicle Type" value="<?PHP echo $Vehicle_Type;?>" />
                        </div>
                         
                         <div class="col-md-4">
                        <label for="Vehicle_No">Vehicle Number<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$Vehicle_Norequired;?>" id="Vehicle_No" name="Vehicle_No" placeholder="Vehicle Number" value="<?PHP echo $Vehicle_No;?>" />
                    	</div>  
                        <div class="col-md-4">
                        <label for="Driver_Name">Driver Name<span class="required">*</span></label>
<input type="text" class="form-control <?PHP echo @$Driver_Namerequired;?>" id="Driver_Name" name="Driver_Name" placeholder="Driver Name" value="<?PHP echo $Driver_Name?>" />
                       </div>
                       
                        
                       <div class="clearfix"> </div>
                        
                    </div>
                    
                    <div class="form-group">
                    
                    <div class="col-md-4">
                        <label for="driverpayment">Driver Payment<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$driverpaymentrequired;?>" id="driverpayment" name="driverpayment" placeholder="Driver Payment" value="<?PHP echo $driverpayment; ?>" />
                        </div>
                        
                         <div class="col-md-4">
                        <label for="hamalicharges">Hamali Charges<span class="required">*</span></label>
                        <input type="text" class="form-control <?PHP echo @$hamalichargesrequired;?>" id="hamalicharges" name="hamalicharges" placeholder="Hamali Charges" value="<?PHP echo $hamalicharges; ?>" />
                        </div>
                        
                         <div class="col-md-4">
                        <label for="remarks">Remarks</label>
<input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks if any" value="<?PHP echo $remarks; ?>" />
                        </div>
                        
                        
                       <div class="clearfix"> </div>
                    </div>
                    
                   
                     <div class="form-group" style="margin-top:10px; margin-left:15px">

                         <input type="submit" name="edittransportdata" class="btn btn-primary " value="Update transport data" />
                         <span class="penality_errmsg"></span>
                      </div>
            </form>
                
                
            </div>
              
             
              
              
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>