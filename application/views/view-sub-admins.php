<div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line" style="margin-top:0px">View Subadmins</h1>
                    </div>
                </div>
                
             <div class="row">
             <?PHP if( $this->session->flashdata('subadmin_success')!='' ) { echo $this->session->flashdata('subadmin_success'); } ?>
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sub-Admins
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sub Admin Name</th>
                                            <th>Login Id</th>
                                            <th>Status</th>
                                            <th >Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
											
											if($subadminslist!='0')
											{
												if($this->uri->segment(2)=='')
													$slno=1;
												else
													$slno=$this->uri->segment(2)+1;
												foreach($subadminslist->result() as $subadmin)	
												{
													?>
                                                    	<tr>
                                                        	<td><?PHP echo $slno;?> </td>
                                                            <td><?PHP echo $subadmin->Admin_Name;?> </td>
                                                            <td><?PHP echo $subadmin->LoginId;?> </td>
                                                            <td  id="Status_<?PHP echo $subadmin->SLNO; ?>"><?PHP echo $subadmin->Status;?> </td>
                                                            <td> 
<a class="btn btn-primary btn-sm" href="<?PHP echo base_url('edit-sub-admin/'.$subadmin->SLNO); ?>"><i class="fa fa-edit "></i> Edit</a> 

<?PHP 
if($subadmin->Status =="Active") 
{ 
	$label="Active"; 
	$cls="btn-success";
	$font_awesome = "fa-check";
		$act_inac="Inactive";
}
else
{
	$label="Inactive"; 
	$cls="btn-danger";
	$font_awesome = "fa-times";
	$act_inac="Active";
}
?>
                                                            
<a class="btn <?PHP echo $cls; ?> btn-sm cursor-pointer act_inact" ide="<?PHP echo $subadmin->SLNO; ?>" actInct="<?PHP echo $act_inac; ?>" >
<i class="fa <?PHP echo $font_awesome; ?>"></i> 
<?PHP echo $label;?>
 </a> 
                                                            </td>
                                                        </tr>
                                                    <?PHP	
													$slno++;
												}
												?>
                                                 <tr>
                                	<td colspan="9"><?PHP echo $pagination_string;?> </td>
                                    <td> </td>
                                </tr>   
                                                <?PHP
												
											}
											else
											{
												echo "<div class='alert alert-warning'>No data available</div>";	
											}
										?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
                
                
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>