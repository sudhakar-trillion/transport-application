<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requestdispatcher extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Commonmodel');	
	}

	public function validateuser()
	{
		$userid = trim($this->input->post('userid'));
		$password = md5( trim($this->input->post('password')) );
		
		$cond = array();
		
		$cond['LoginId'] = $userid;
		$cond['Password'] = $password;
		$table = "admin";
		
		$exists = $this->Commonmodel->exists_not($table,$cond);
		if($exists)
		{
			//get the role and make a session of it, it will be used later onwards
			
			$fields='';
			$order_by='';
			
			$order_by_field='';
			$limit='';
			
			$data = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field='',$limit='');
			
			foreach($data->result() as $details)
			{
				$this->session->set_userdata('Admin_Role',$details->Role);
				$this->session->set_userdata('Admin_Name',$details->Admin_Name);
				$this->session->set_userdata('Admin_SLNO',$details->SLNO);
				
			}
			
			
			echo "1";
		}
		else
			echo "0";
	}
	
	public function activate_inactivate_subadmin()
	{
		
		$cond = array();
		$table="admin";	
		
		$cond['SLNO'] = $this->input->post('ide');
		$setdata = array();
		
		$setdata['Status'] = $this->input->post('label');
		
		if($this->Commonmodel->updatedata($table,$setdata,$cond))
		{
			echo "1";
		}
		else
			echo "0";
		
		
	}
	
//submits the penalities

public function submitpenalities()
{
		
		extract($_POST);
		
		$table = 'dataform';
		$cond = array();
		
		$cond['LRNO'] = $lrno;
		
		$field='SLNO';
		$order_by='';
		
		$order_by_field='';
		$limit='';
		
		$SLNO = $this->Commonmodel->getafield($table,$cond,$field,$order_by,$order_by_field,$limit);
		$total_penalities = sizeof($penalities);
		
		$cnt=1;
		
		if($penalities!='')
		{
			foreach($penalities as $val)
			{
				$insertdata = array();
					
				$insertdata['SLNO'] = $SLNO;
				$insertdata['LRNO'] = $lrno;
				
				$insertdata['PenalityFor'] = $val['PenalityNature'];
				$insertdata['PenalityAmount'] = $val['PenalityAmount'];
				$insertdata['SLNO'] = $SLNO;
				
				$insertdata['Lastupdated']= time();
				
				$table ='penalties';
				if( $this->Commonmodel->insertdata($table,$insertdata))
				{
					$cnt++;	
				}
				
			}
			
			if($total_penalities = $cnt)
			{
				echo "1";	
				$this->session->set_userdata('step1_success','');
				$this->session->set_userdata('penality_success',$lrno."_".$SLNO);
			}
			else	
				echo "0";
		}
		else
		{
				echo "1";	
				$this->session->set_userdata('step1_success','');
				$this->session->set_userdata('penality_success',$lrno."_".$SLNO);
		}
}

public function submitrepairs()
{
		extract($_POST);
		
		$table = 'dataform';
		$cond = array();
		
		$cond['LRNO'] = $lrno;
		
		$field='SLNO';
		$order_by='';
		
		$order_by_field='';
		$limit='';
		
		$SLNO = $this->Commonmodel->getafield($table,$cond,$field,$order_by,$order_by_field,$limit);
		$total_repairs = sizeof($repairs);
		
		$cnt=1;
		
		if($repairs!='')
		{
			foreach($repairs as $val)
			{
				$insertdata = array();
					
				$insertdata['SLNO'] = $SLNO;
				$insertdata['LRNO'] = $lrno;
				
				$insertdata['NatureRepair'] = $val['RepairNature'];
				$insertdata['RepairAmount'] = $val['RepairAmount'];
				$insertdata['SLNO'] = $SLNO;
				
				$insertdata['Lastupdated']= time();
				$table = 'vehiclerepair';
				if( $this->Commonmodel->insertdata($table,$insertdata))
				{
					$cnt++;	
				}
				
			}
			
			if($total_repairs = $cnt)
			{
				echo "1";	
				$this->session->set_userdata('step1_success','');
				$this->session->set_userdata('penality_success','');
				$this->session->set_userdata('vehiclerepair_success',$lrno."_".$SLNO);
			}
			else	
				echo "0";
		}
		else
		{
				echo "1";	
				$this->session->set_userdata('step1_success','');
				$this->session->set_userdata('penality_success','');
				$this->session->set_userdata('vehiclerepair_success',$lrno."_".$SLNO);
		}
}


	public function submitexpenses()
	{
		
		extract($_POST);
		
		$table = 'dataform';
		$cond = array();
		
		$cond['LRNO'] = $lrno;
		
		$field='SLNO';
		$order_by='';
		
		$order_by_field='';
		$limit='';
		
		$SLNO = $this->Commonmodel->getafield($table,$cond,$field,$order_by,$order_by_field,$limit);
		$total_expenses = sizeof($expenses);
		
		$cnt=1;
		
		if($expenses!='')
		{
			foreach($expenses as $val)
			{
				$insertdata = array();
					
				$insertdata['SLNO'] = $SLNO;
				$insertdata['LRNO'] = $lrno;
				
				$insertdata['ExpensesNature'] = $val['expensenature'];
				$insertdata['ExpenseAmount'] = $val['ExpenseAmount'];
				$insertdata['SLNO'] = $SLNO;
				
				$insertdata['Lastupdated']= time();
				$table = 'moreexpenses';
				if( $this->Commonmodel->insertdata($table,$insertdata))
				{
					$cnt++;	
				}
				
			}
			
			if($total_expenses = $cnt)
			{
				echo "1";	
				$this->session->set_userdata('step1_success','');
				$this->session->set_userdata('penality_success','');
				$this->session->set_userdata('vehiclerepair_success','');
				
				$msg = "<div class='alert alert-success'>Data added successfully</div>";
				
				$this->session->set_flashdata('data_added',$msg);
			}
			else	
				echo "0";
		}
		else
		{
				echo "1";	
				$this->session->set_userdata('step1_success','');
				$this->session->set_userdata('penality_success','');
				$this->session->set_userdata('vehiclerepair_success','');
		}

	}


	public function gettransportdata()
	{
		extract($_POST);
		
		$table ='dataform';	
		$cond=array();
		
		$cond['SLNO'] = $slno;
		$cond['LRNO'] = $lrno;
		
		$fields='*';
		$order_by='';
		$order_by_field='';
		$limit='';
		
		$transportdata = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);
		if($transportdata!='')
		{
			$outputdata = array();
			foreach( $transportdata->result() as $data)	
			{
					$outputdata['CustomerName'] = $data->CustomerName;
					$outputdata['MobileNumber'] = $data->MobileNumber;
					$outputdata['DispatchMaterial'] = $data->DispatchMaterial;
					
					$outputdata['Size'] = $data->Size;
					$outputdata['Quantity'] = $data->Quantity;
					$outputdata['ToPlace'] = $data->ToPlace;
					
					$outputdata['FromPlace'] = $data->FromPlace;
					$outputdata['TransportAmount'] = $data->TransportAmount;
					$outputdata['VehicleType'] = $data->VehicleType;
					
					$outputdata['VehicleNumber'] = $data->VehicleNumber;
					$outputdata['DriverName'] = $data->DriverName;
					$outputdata['DriverAmount'] = $data->DriverAmount;
					
					$outputdata['HamaliCharges'] = $data->HamaliCharges;
					$outputdata['Remarks'] = $data->Remarks;
			}
			echo json_encode($outputdata);
		}
		else
			echo "nodata";
	}
//gettransport data ends here

//getexpenses_lrno starts here

	public function getexpenses_lrno()
	{
		extract($_POST);
		
		$cond = array();
		$table ='penalties';
		
		//get the penalities for the lrno and slno
		
		$expensives_arr = array();
		
		$cond['SLNO'] = $slno;
		$cond['LRNO'] = $lrno;		 
		
		$fields='LRNO,SLNO,PenalityFor,PenalityAmount';
		$order_by='';
		$order_by_field='';
		$limit='';
		
		$penalities = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);
		if($penalities!='0')
		{
			$penal = '';
			foreach($penalities->result() as $penality)
			{
				if($penality->PenalityFor=="No")
					$pen_nature = "No Penalities";
				else
					$pen_nature = $penality->PenalityFor;
				
				$penal.= '<p><span class="labell">'.$pen_nature.':</span><span class="TransportAmount value" >'.$penality->PenalityAmount.'</span></p>';
			}
			if($page=="view-data")
			$penal.="<a href='".base_url('edit-penalties'.'/'.$lrno.'/'.$slno)."' class='btn btn-success btn-sm pull-right marg-btm'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</a><br>";
			
			$expensives_arr['penalities'] = $penal;
		}
		else
		{
			$expensives_arr['penalities'] = '<p><span class="labell">No Penality </span><span class="TransportAmount value" >Nill</span></p>';
		}
		

		//get the repairs for the lr and slno
		
		
		$cond['SLNO'] = $slno;
		$cond['LRNO'] = $lrno;		 
		
		$fields='LRNO,SLNO,NatureRepair,RepairAmount';
		$order_by='';
		$order_by_field='';
		$limit='';
		$table ='vehiclerepair';
		
		$repairs = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);
		if($repairs!='0')
		{
			$rep = '';
			foreach($repairs->result() as $repair)
			{
				
				if($repair->NatureRepair=="No")
					$rep_natu = "No Repair";
				else
					$rep_natu = $repair->NatureRepair;
				
				$rep.= '<p><span class="labell">'.$rep_natu.':</span><span class="TransportAmount value" >'.$repair->RepairAmount.'</span></p>';
			}

			if($page=="view-data")
			$rep.="<a href='".base_url('edit-repairs'.'/'.$lrno.'/'.$slno)."' class='btn btn-warning btn-sm pull-right marg-btm'> <i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</a>";
			
			$expensives_arr['repairs'] = $rep;
		}
		else
		{
			$expensives_arr['repairs'] = '<p><span class="labell">No Repairs: </span><span class="TransportAmount value" >Nill</span></p>';
		}
		
		//get the expenses
		
		$cond['SLNO'] = $slno;
		$cond['LRNO'] = $lrno;		 
		
		$fields='LRNO,SLNO,ExpensesNature,ExpenseAmount';
		$order_by='';
		$order_by_field='';
		$limit='';
		$table ='moreexpenses';
		
		$expenses = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field,$limit);

		if($expenses!='0')
		{
			$exp = '';
			foreach($expenses->result() as $expense)
			{
				if($expense->ExpensesNature=="No")
				$enpnature= "No Expenses";
				else
				$enpnature= $expense->ExpensesNature;
				
				$exp.= '<p><span class="labell">'.$enpnature.': </span><span class="TransportAmount value" >'.$expense->ExpenseAmount.'</span></p>';
			}

			if($page=="view-data")
			$exp.="<a href='".base_url('edit-expenses'.'/'.$lrno.'/'.$slno)."' class='btn btn-primary btn-sm pull-right marg-btm' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</a><br>";
			
			$expensives_arr['expens'] = $exp;
		}
		else
		{
			$expensives_arr['expens'] = '<p><span class="labell">No Other expenses </span><span class="TransportAmount value" >Nill</span></p>';
		}

		echo json_encode($expensives_arr);
	}


//getexpenses_lrno ends here

//update penalities

	public function updatepenalities()
	{
		extract($_POST);
		
		$SLNO =$SLNO;
		$LRNO = $LRNO;
		
		// store the penality ids 
		
		$penalitIds = array();
		foreach($penalities as $val)
		{
			if($val['penalityid']>0)
			{
					$penalitIds[] = $val['penalityid'];
			}
		}
		
		//get the penality ids form the database which had the LRNO and SLNO
		
			$cond=array();
				
			$cond['SLNO']=$SLNO;
			$cond['LRNO']=$LRNO;
	
			$penalityids_database = array();
			
			$table='penalties';
			$fields='PenaltyId';
			$order_by='';
	
			$penalty_ids = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field='',$limit='');
			
			foreach($penalty_ids->result() as $pen)
			{
				$penalityids_database[] = $pen->PenaltyId;
			}	
		
		
		//delete if any penalty is deleted by the user
				
				$deleted_penalities = array_diff($penalityids_database,$penalitIds);
				
				foreach($deleted_penalities as $val)
				{
					$cond=array();
					$cond['PenaltyId'] = $val;
					$this->Commonmodel->deleterow($table,$cond);
				}
		
			$total_update = sizeof($penalities);
			
				
			$cnt=0;
			$table = 'penalties';
			
			foreach($penalities as $val)
			{
				
				if($val['penalityid']>0)
				{
					//update here 
					$cond=array();
					$setdata = array();
					
					$cond['SLNO']=$SLNO;
					$cond['LRNO']=$LRNO;
					$cond['PenaltyId']=trim($val['penalityid']);
					
					$setdata['PenalityFor'] = trim($val['penality']['nature']);
					$setdata['PenalityAmount'] = trim($val['penality']['amount']);
					
					$setdata['Lastupdated'] = time();
					if(trim($val['penality']['nature'])!='' && trim($val['penality']['amount'])!='')
					{
						if($this->Commonmodel->updatedata($table,$setdata,$cond))
						{
							$cnt++;
							
						}
					}
				}
				else
				{
					//insert data here 
					$insertdata = array();
	
					$insertdata['SLNO'] = $SLNO;
					$insertdata['LRNO'] = $LRNO;
					
					$insertdata['PenalityFor'] = trim($val['penality']['nature']);
					$insertdata['PenalityAmount'] = trim($val['penality']['amount']);
					
					$insertdata['Lastupdated'] = time();
					
					if(trim($val['penality']['nature'])!='' && trim($val['penality']['amount'])!='')
					{
						if($this->Commonmodel->insertdata($table,$insertdata) )
							$cnt++;					
					}
						
				}
				
			
		}
		
		
				
				if($cnt==$total_update)
				echo "1";
		
	}
//update penalities ends here


//update repairs

	public function updaterepairs()
	{
		extract($_POST);
		
		$SLNO =$SLNO;
		$LRNO = $LRNO;
		
		// store the repair ids 
		
		$repairIds = array();
		foreach($repairs as $val)
		{
			if($val['repairid']>0)
			{
					$repairIds[] = $val['repairid'];
			}
		}
		
/*		
		echo "<pre>";
		print_r($repairIds);
		echo "</pre>";
*/
		//get the repair ids form the database which had the LRNO and SLNO
		
			$cond=array();
				
			$cond['SLNO']=$SLNO;
			$cond['LRNO']=$LRNO;
	
			$repairids_database = array();
			
			$table='vehiclerepair';
			$fields='RepairId';
			$order_by='';
	
			$repair_ids = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field='',$limit='');
			
			foreach($repair_ids->result() as $rep)
			{
				$repairids_database[] = $rep->RepairId;
			}	
			
	/*		echo "<pre>";
			print_r($repairids_database);
			echo "</pre>";
*/
			
			//delete if any penalty is deleted by the user
				
				$deleted_repairs = array_diff($repairids_database,$repairIds);
		/*		
			echo "<pre>";
			print_r($deleted_repairs);
			echo "</pre>";
			
			
			exit;
			*/
				foreach($deleted_repairs as $val)
				{
					$cond=array();
					$cond['RepairId'] = $val;
					$this->Commonmodel->deleterow($table,$cond);
				}
				
		
		
		
			$total_update = sizeof($repairs);
			
				
			$cnt=0;
			$table = 'vehiclerepair';
			
			foreach($repairs as $val)
			{
				
				if($val['repairid']>0)
				{
					//update here 
					$cond=array();
					$setdata = array();
					
					$cond['SLNO']=$SLNO;
					$cond['LRNO']=$LRNO;
					$cond['RepairId']=trim($val['repairid']);
					
					$setdata['NatureRepair'] = trim($val['repair']['nature']);
					$setdata['RepairAmount'] = trim($val['repair']['amount']);
					
					$setdata['Lastupdated'] = time();
					if(trim($val['repair']['nature'])!='' && trim($val['repair']['amount'])!='')
					{
						if($this->Commonmodel->updatedata($table,$setdata,$cond))
						{
							$cnt++;
							
						}
					}
				}
				else
				{
					//insert data here 
					$insertdata = array();
	
					$insertdata['SLNO'] = $SLNO;
					$insertdata['LRNO'] = $LRNO;
					
					$insertdata['NatureRepair'] = trim($val['repair']['nature']);
					$insertdata['RepairAmount'] = trim($val['repair']['amount']);
					
					$insertdata['Lastupdated'] = time();
					
					if(trim($val['repair']['nature'])!='' && trim($val['repair']['amount'])!='')
					{
						if($this->Commonmodel->insertdata($table,$insertdata) )
							$cnt++;					
					}
						
				}
				
			
		}
		
		
				if($cnt==$total_update)
				echo "1";
		
	}
//update repairs ends here

//updateexpenses starts here


	public function updateexpenses()
	{
		
		
		extract($_POST);
		
		$SLNO =$SLNO;
		$LRNO = $LRNO;
		
		// store the repair ids 
		
		$expenseIds = array();
		foreach($expenses as $val)
		{
			if($val['expenseid']>0)
			{
					$expenseIds[] = $val['expenseid'];
			}
		}
	
		//get the repair ids form the database which had the LRNO and SLNO
		
			$cond=array();
				
			$cond['SLNO']=$SLNO;
			$cond['LRNO']=$LRNO;
	
			$expensesids_database = array();
			
			$table='moreexpenses';
			$fields='ExpenseId';
			$order_by='';
	
			$expense_ids = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field='',$limit='');
			
			foreach($expense_ids->result() as $exp)
			{
				$expensesids_database[] = $exp->ExpenseId;
			}	
			
			
			//delete if any penalty is deleted by the user
				
			$deleted_expenses = array_diff($expensesids_database,$expenseIds);

			foreach($deleted_expenses as $val)
				{
					$cond=array();
					$cond['ExpenseId'] = $val;
					$this->Commonmodel->deleterow($table,$cond);
				}
				
			$total_update = sizeof($expenses);
				
			$cnt=0;
			$table = 'moreexpenses';
			
			foreach($expenses as $val)
			{
				
				if($val['expenseid']>0)
				{
					//update here 
					$cond=array();
					$setdata = array();
					
					$cond['SLNO']=$SLNO;
					$cond['LRNO']=$LRNO;
					$cond['ExpenseId']=trim($val['expenseid']);
					
					$setdata['ExpensesNature'] = trim($val['expense']['nature']);
					$setdata['ExpenseAmount'] = trim($val['expense']['amount']);
					
					$setdata['Lastupdated'] = time();
					if(trim($val['expense']['nature'])!='' && trim($val['expense']['amount'])!='')
					{
						if($this->Commonmodel->updatedata($table,$setdata,$cond))
						{
							$cnt++;
							
						}
					}
				}
				else
				{
					//insert data here 
					$insertdata = array();
	
					$insertdata['SLNO'] = $SLNO;
					$insertdata['LRNO'] = $LRNO;
					
					$insertdata['ExpensesNature'] = trim($val['expense']['nature']);
					$insertdata['ExpenseAmount'] = trim($val['expense']['amount']);
					
					$insertdata['Lastupdated'] = time();
					
					if(trim($val['expense']['nature'])!='' && trim($val['expense']['amount'])!='')
					{
						if($this->Commonmodel->insertdata($table,$insertdata) )
							$cnt++;					
					}
						
				}
				
			
		}
		
		
				if($cnt==$total_update)
				echo "1";
		
	
		
			
	}

//updateexpenses ends here



//get the lrnos

	public function getlrnos()
	{
		
		extract($_GET);
		
		$table='dataform';
		$fields='LRNO';
		$likefield='LRNO';
		$string=$term;
		
		$lrnos = $this->Commonmodel->wherelike($table,$fields,$likefield,$string);
		
		if($lrnos!='0')
		{
			foreach($lrnos->result() as $lr)
			{
				$outputarr[] = $lr->LRNO;
			}
		}
		else
			$outputarr[] = "No lrs found";
			
			echo json_encode($outputarr);
		
		
	}
	
	//end of get irnos
	
	//start of gt customers
	
	public function getcustomers()
	{
	
		
		extract($_GET);
		
		$table='dataform';
		$fields='CustomerName';
		$likefield='CustomerName';
		$string=$term;
		
		$lrnos = $this->Commonmodel->wherelike($table,$fields,$likefield,$string);
		
		if($lrnos!='0')
		{
			foreach($lrnos->result() as $lr)
			{
				$outputarr[] = $lr->CustomerName;
			}
		}
		else
			$outputarr[] = "No customer found";
			
			echo json_encode($outputarr);
		
		
		
	}
	
	//end of get customers
	
//gettransport_lrno starts here

	public function gettransport_lrno()
	{
		
		extract($_POST);
		$cond = array();
		
		$table ='dataform';
		
		$cond['LRNO'] = $lrno;
		$outputdata='';
		//check whether LRNO exists or not
		
		if( $this->Commonmodel->exists_not($table,$cond))
		{
			//get the transport data
			$fields='*';
			$order_by='';
			
			$transportdata = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by,$order_by_field='',$limit='');
			
			$outputdata.=' <table class="table table-hover"><thead><tr><th>LRNO</th><th>Transport Amount</th><th>Customer</th><th>Mobile No</th><th>Material</th><th>Size</th><th>Quantity</th><th>Transport Details</th><th>Expenses Details</th> <th>Add Payment</th></tr><tbody>';
			foreach($transportdata->result() as $data)
			{
				
				$transportdetails = '<a data-toggle="modal" data-target="#transport" page="add-customer-payment" id="'.$data->LRNO."_".$data->SLNO.'" class="btn btn-sm btn-warning transportpopup"><i class="fa fa-eye" aria-hidden="true"></i> View</a>';
				
				$expensesdetails ='<a data-toggle="modal" data-target="#expenses" page="add-customer-payment" id="'.$data->LRNO."-".$data->SLNO.'" class="btn btn-sm btn-success expensespopup"><i class="fa fa-eye" aria-hidden="true"></i> View</a>';
				
				
				
				$outputdata.="<tr> <td>".$data->LRNO."</td><td>".$data->TransportAmount."</td> <td>".$data->CustomerName."</td> <td>".$data->MobileNumber."</td> <td>".$data->DispatchMaterial."</td> <td>".$data->Size."</td> <td>".$data->Quantity."</td> <td>".$transportdetails."</td> <td>".$expensesdetails."</td><td><a class='cursor-pointer btn btn-sm btn-primary add_payment'>Add payment</a></td> </tr>";	
				$TransportAmount = $data->TransportAmount;
				
					
			}
			
			$outputdata.='</tbody></table>:::::'.$TransportAmount;
			
		}
		else
		{
			$outputdata = "<div class='alert alert-warning'> No data found with request </div>";
		}
		
		echo $outputdata;
			
		
	}

//gettransport_lrno ends here	

}//class ends here
