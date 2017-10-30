<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		$this->load->model('Commonmodel');
		
		if( $this->uri->segment(1) == 'login' )
		{
			if($this->session->userdata('Admin_SLNO')!='')
			redirect(base_url('dashboard'));
		}
		elseif(  $this->uri->segment(1) != 'login' )
		{
			if($this->session->userdata('Admin_SLNO')=='')
			redirect(base_url('login'));
		}
			
	}

public function index()
{

	if( $this->uri->segment(1) == 'login' )
		{
			if($this->session->userdata('Admin_SLNO')!='')
			redirect(base_url('dashbard'));
		}
		elseif(  $this->uri->segment(1) != 'login' )
		{
			if($this->session->userdata('Admin_SLNO')=='')
			redirect(base_url('login'));
		}
}


public function login()
{

	$this->load->view('login');
}

public function logout()
{
	 $session_items = array('Admin_Role' => '', 'Admin_SLNO' => '',"Admin_Name"=>'');
	 $this->session->set_userdata($session_items);	
	redirect(base_url('login'));
	
	
}
	
	public function dashboard()
	{
		$this->load->view('header');
		
		$this->load->view('dashboard');
		
		$this->load->view('footer');
	}

	public function addsubadmin()
	{
		$this->load->view('header')	;
			if($this->input->post('createuser'))
			{
				
				$this->form_validation->set_rules($this->config->item('addsubadmin'));
				
				if( $this->form_validation->run()===false)
				{
					$this->load->view('add-sub-admins');
				}
				else
				{
					$table='admin';
					
					$insertdata = array();
					
					$insertdata['LoginId'] = $this->input->post('loginid');
					$insertdata['Password'] = md5($this->input->post('password'));
					
					$insertdata['Admin_Name'] = $this->input->post('subadmin');
					$insertdata['Role'] = 'Subadmin';
					
					$insertdata['Status'] = 'Active';
					$insertdata['Lastupdtaed'] = time();
					
					if( $this->Commonmodel->insertdata($table,$insertdata))
					{
						$msg = "<div class='alert alert-success'>New subadmin has added successfully</div>";
						$this->session->set_flashdata("subadmin_success",$msg);
					}
					else
					{
						$msg = "<div class='alert alert-danger'>Unable to create subadmin</div>";
						$this->session->set_flashdata("subadmin_success",$msg);
					}
					
					
					redirect(base_url('view-sub-admins'));
					
					
				}
			}
			else
			$this->load->view('add-sub-admins');
		$this->load->view('footer');		
	}

//view subadmins starts here

	public function viewsubadmins()
	{
		
		$this->load->view('header');
		
		$config['base_url'] = base_url('view-sub-admins/');
		$cond = array();
		$table='admin';
		
		$cond['Role'] = 'Subadmin';
		
		
		$total_rows = $this->Commonmodel->getnumRows($table,$cond);
		 
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;
		
	/* Pagination configuration style starts here */
	
		$config['full_tag_open'] = '<div><ul class="pagination">';
	$config['full_tag_close'] = '</ul></div><!--pagination-->';
	$config['first_link'] = '&laquo; First';
	$config['first_tag_open'] = '<li class="prev page">';
	$config['first_tag_close'] = '</li>';
	$config['last_link'] = 'Last &raquo;';
	$config['last_tag_open'] = '<li class="next page">';
	$config['last_tag_close'] = '</li>';
	$config['next_link'] = 'Next &rarr;';
	$config['next_tag_open'] = '<li class="next page">';
	$config['next_tag_close'] = '</li>';
	$config['prev_link'] = '&larr; Previous';
	$config['prev_tag_open'] = '<li class="prev page">';
	$config['prev_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="page">';
	$config['num_tag_close'] = '</li>';
	// $config['display_pages'] = FALSE;
	// 
	$config['anchor_class'] = 'follow_link';
		
	/* Pagination configuration style ends here */		
		
		$this->pagination->initialize($config);
		
		$data['page'] = ($this->uri->segment(2)) ? (($this->uri->segment(2))) : 0;
		
		$limit = $config["per_page"];

		if($data['page']==0)
		$start = 0;
		else
		$start = ($data['page']-1)*$config["per_page"];
		
		$order_by='DESC';
		$order_by_field='SLNO';
		
		$data['subadminslist'] = $this->Commonmodel->getrows_pagination($table,$cond,$order_by,$order_by_field,$limit,$start );
		
		$data['pagination_string'] = $this->pagination->create_links();		
		
		
		$this->load->view('view-sub-admins',$data);
		
		
		$this->load->view('footer');
			
		
	}



//view subadmins ends here


//edit sub admin

public function editsubadmin()
{
	$this->load->view('header');
	
	//call the sub admin details 
	
	$cond = array();
	$table ='admin';
	
	$cond['SLNO'] = $this->uri->segment(2);
	
	$fields='LoginId, Admin_Name, Status';

	$subadmindetails = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
	if($subadmindetails=='0')
	{
		$data['message'] = "Sub admin does not exisits";
		$this->load->view('data-not-exists',$data);	
	}
	else
	{
		$data['subadmindetails'] = $subadmindetails;
		
		if($this->input->post('updateadmin'))
		{
			
			$setdata['Admin_Name'] = trim($this->input->post('subadmin'));
			$setdata['LoginId'] =  trim($this->input->post('loginid'));
			
			if(trim($this->input->post('password'))!='')
			
			$setdata['Password'] = md5( trim($this->input->post('password')) );
			$setdata['Status']   =   trim($this->input->post('status'));
			$setdata['Lastupdtaed']   =   time();			
			
			
			if($this->Commonmodel->updatedata($table,$setdata,$cond))
			{
				$data['subadmin'] = trim($this->input->post('subadmin'));
				$data['loginid'] =  trim($this->input->post('loginid'));
				$data['password'] = '';
				$data['status']   =   trim($this->input->post('status'));
				$data['updatemsg'] = "<div class='alert alert-success'>Subadmin details updated successfully</div>";
	
			}
			else
			{
				$data['subadmin'] = trim($this->input->post('subadmin'));
				$data['loginid'] =  trim($this->input->post('loginid'));
				$data['password'] = '';
				$data['status']   =   trim($this->input->post('status'));
				$data['updatemsg'] = "<div class='alert alert-warning'>Unable to update the subadmin details</div>";
				
			}
			
			$this->load->view('edit-sub-admin',$data);			
			
			
		}
		else
		$this->load->view('edit-sub-admin',$data);	
		
		
	}
	
	$this->load->view('footer');
	
	
	
}

//edit sub admin ends here


	public function adddata()
	{
		$this->load->view('header')	;
		
		if(	$this->input->post('step1'))
		{
			$this->form_validation->set_rules($this->config->item('addtransportdata'));
			
			if($this->form_validation->run()=== false)
			{
				$this->load->view('add-data');
				
				#echo validation_errors();
			}
			else
				{
					//insert the data into the database and show the penalities form if nay penalities then the form gets filled 
					
					$insertdata = array();

					$insertdata['LRNO'] = $this->input->post('LRNO');
					$insertdata['CustomerName'] = $this->input->post('customer');
					$insertdata['MobileNumber'] = $this->input->post('mobile');
					
					$insertdata['DispatchMaterial'] = $this->input->post('dispatchmaterial');
					$insertdata['Size'] = $this->input->post('size');
					$insertdata['Quantity'] = $this->input->post('quantity');
					
					$insertdata['ToPlace'] = $this->input->post('To_Place');
					$insertdata['FromPlace'] = $this->input->post('From_Place');
					$insertdata['TransportAmount'] = $this->input->post('Transport_Amount');
					
					$insertdata['VehicleType'] = $this->input->post('Vehicle_Type');
					$insertdata['VehicleNumber'] = $this->input->post('Vehicle_No');
					$insertdata['DriverName'] = $this->input->post('Driver_Name');
					
					$insertdata['DriverAmount'] = $this->input->post('driverpayment');
					$insertdata['HamaliCharges'] = $this->input->post('hamalicharges');
					$insertdata['AddedBy'] = $this->session->userdata('Admin_SLNO');
					
					$insertdata['Remarks'] = $this->input->post('remarks');
					$insertdata['Lastupdated'] = time();
					
					$table='dataform';
					
					$lastinsertedid = $this->Commonmodel->insertdata($table,$insertdata);

				#	echo $this->db->last_query(); exit; 
				
					if($lastinsertedid>0)
					{
						$this->session->set_userdata('step1_success',"Yes_".$lastinsertedid);
						$data['dataid'] = $this->session->userdata('step1_success');		
						$this->load->view('add-penalities',$data);
					}
					else
					{
						$data['message'] = "<div class='alert alert-warning'>Unable to add data kindly contact admin</div>";
						$this->load->view('add-data',$data);				
					}
					
				}
			
		}
		else	
		{
			
			if($this->session->userdata('step1_success')!='')	
			{
				$data['dataid'] = $this->session->userdata('step1_success');
				
				
				$dataid= explode("Yes_",$this->session->userdata('step1_success'));
				//get the LRNO 

				$table='dataform';
				$cond=array();
				
				$cond['SLNO'] = $dataid[1];
				
				$field='LRNO';
				
				$data['LRNO'] =$this->Commonmodel->getafield($table,$cond,$field,$order_by='',$order_by_field='',$limit='');

				$this->load->view('add-penalities',$data);
			}
			elseif( $this->session->userdata('penality_success')!='' )	
			{
				$data['dataid'] = $this->session->userdata('penality_success');
				$this->load->view('add-vechile-repair',$data);
			}
			elseif($this->session->userdata('vehiclerepair_success')!='')	
			{
				$data['dataid'] = $this->session->userdata('vehiclerepair_success');
				$this->load->view('add-expenses',$data);
			}
			else	
			$this->load->view('add-data');
		}
			$this->load->view('footer');
	}

//view the transport data

public function viewtransportdata()
{
	
	$this->load->view('header');	


		$config['base_url'] = base_url('view-data/');
		$cond = array();
		
		if( $this->input->post('transport_datafilter'))
		{
			
			if(trim($this->input->post('searchby_lrno'))!='')
			{
				$cond['LRNO'] = trim($this->input->post('searchby_lrno'));
				$this->session->set_flashdata('searchby_lrno',$cond['LRNO']);
			}
			
			if(trim($this->input->post('searchby_customer'))!='')
			{
				$cond['CustomerName'] = trim($this->input->post('searchby_customer'));
				$this->session->set_flashdata('searchby_customer',$cond['CustomerName']);
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
		
		
		$table='dataform';
		
		$total_rows = $this->Commonmodel->getnumRows($table,$cond);
		 
		$config['total_rows'] = $total_rows;
		$config['per_page'] = 3;
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;
		
	/* Pagination configuration style starts here */
	
		$config['full_tag_open'] = '<div><ul class="pagination">';
	$config['full_tag_close'] = '</ul></div><!--pagination-->';
	$config['first_link'] = '&laquo; First';
	$config['first_tag_open'] = '<li class="prev page">';
	$config['first_tag_close'] = '</li>';
	$config['last_link'] = 'Last &raquo;';
	$config['last_tag_open'] = '<li class="next page">';
	$config['last_tag_close'] = '</li>';
	$config['next_link'] = 'Next &rarr;';
	$config['next_tag_open'] = '<li class="next page">';
	$config['next_tag_close'] = '</li>';
	$config['prev_link'] = '&larr; Previous';
	$config['prev_tag_open'] = '<li class="prev page">';
	$config['prev_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="page">';
	$config['num_tag_close'] = '</li>';
	// $config['display_pages'] = FALSE;
	// 
	$config['anchor_class'] = 'follow_link';
		
	/* Pagination configuration style ends here */		
		
		$this->pagination->initialize($config);
		
		$data['page'] = ($this->uri->segment(2)) ? (($this->uri->segment(2))) : 0;
		
		$limit = $config["per_page"];

		if($data['page']==0)
		$start = 0;
		else
		$start = ($data['page']-1)*$config["per_page"];
		
		$order_by='DESC';
		$order_by_field='SLNO';
		
		$data['transportdata'] = $this->Commonmodel->getrows_pagination($table,$cond,$order_by,$order_by_field,$limit,$start );
		
		$data['pagination_string'] = $this->pagination->create_links();	


	$this->load->view('view-transport-data',$data);	
	$this->load->view('footer');	
	
	
}


//edit transport data starts here

	public function edittransportdata()
	{
		$this->load->view('header');
		
		//get the transport data and send it to the view
		
		$cond = array();
		$table='dataform';
		
		$cond['LRNO'] = trim($this->uri->segment(2));
		$cond['SLNO'] = trim($this->uri->segment(3));
		
		//check whether the record exists with the above conditions
		
		if($this->Commonmodel->exists_not($table,$cond))
		{
			//now get the data
			$fields = '*';
			
			$data['transportdata'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
			
			if( $this->input->post('edittransportdata'))
			{
				$this->form_validation->set_rules($this->config->item('addtransportdata'));
				
				if( $this->form_validation->run() === false )
				{
					$this->load->view('edit-transport-data',$data);
				}
				else
				{
					
					extract($_POST);
				
				$setdata['CustomerName'] = trim($customer);
				$setdata['MobileNumber'] = trim($mobile);
				$setdata['DispatchMaterial'] = trim($dispatchmaterial);
				
				$setdata['Size']= trim($size);
				$setdata['Quantity'] = trim($quantity);
				
				$setdata['FromPlace'] = trim($From_Place);
				$setdata['ToPlace'] = trim($To_Place);;
				
				$setdata['TransportAmount']= trim($Transport_Amount);
				$setdata['VehicleType'] = trim($Vehicle_Type);
				
				$setdata['VehicleNumber'] = trim($Vehicle_No);
				$setdata['DriverName'] = trim($Driver_Name);
				
				$setdata['DriverAmount']= trim($driverpayment);
				$setdata['HamaliCharges']= trim($hamalicharges );
				
				$setdata['Remarks'] = trim($remarks);
				
				$cond['SLNO'] = trim($slno);
				$cond['LRNO'] = trim($LRNO);
				
				$table='dataform';
				
				if( $this->Commonmodel->updatedata($table,$setdata,$cond)	)
				{
					
					$msg = "<div class='alert alert-success'>Transport data updated successfully</div>";	
					$this->session->set_flashdata("update_transportdata",$msg);	
				}
				else
				{
					$msg = "<div class='alert alert-warning'>Unable to update transport data</div>";	
					$this->session->set_flashdata("update_transportdata",$msg);
				}
				
				redirect(base_url('edit-transport-data/'.$this->uri->segment(2).'/'.$this->uri->segment(3)));
				
				}
				
			}
			else
				$this->load->view('edit-transport-data',$data);
		}
		else
		{
			$data['message'] = "No transport data available with the request";
			$this->load->view('data-not-exists',$data);
		}
		
		
		
		
		$this->load->view('footer');
		
	}

//edit penalities starts here

	public function editpenalities()
	{
		$this->load->view('header');
		
		//check whether the lr has any penalities
		
		$cond = array();
		$table='penalties';
		
		$cond['SLNO'] = $this->uri->segment(3);
		$cond['LRNO'] = $this->uri->segment(2);
		
		if( $this->Commonmodel->exists_not($table,$cond) )
		{
			//get the penalities on this lr and slno
			
			$fields = '*';
			
			$data['penalities'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
			$this->load->view('edit-penalities',$data);	
			
		}
		else
		{
			$data['message'] = "No penalities available with the requested lrno";
			$this->load->view('data-not-exists',$data);		
		}
		
		
		
		
		$this->load->view('footer');
		
	}


//edit repairs starts here

	public function editrepairs()
	{
		$this->load->view('header');
		
		
		//check whether the lr has any penalities
		
		$cond = array();
		$table='vehiclerepair';
		
		$cond['SLNO'] = $this->uri->segment(3);
		$cond['LRNO'] = $this->uri->segment(2);
		
		if( $this->Commonmodel->exists_not($table,$cond) )
		{
			//get the penalities on this lr and slno
			
			$fields = '*';
			
			$data['repairs'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
			$this->load->view('edit-repairs',$data);	

			
		}
		else
		{
			$data['message'] = "No penalities available with the requested lrno";
			$this->load->view('data-not-exists',$data);		
		}
		
		
		
		$this->load->view('footer');
		
	}

//edit repairs starts here

	public function editexpenses()
	{
		$this->load->view('header');
		
		//check whether the lr has any penalities
		
		$cond = array();
		$table='moreexpenses';
		
		$cond['SLNO'] = $this->uri->segment(3);
		$cond['LRNO'] = $this->uri->segment(2);
		
		if( $this->Commonmodel->exists_not($table,$cond) )
		{
			//get the penalities on this lr and slno
			
			$fields = '*';
			
			$data['expenses'] = $this->Commonmodel->getRows_fields($table,$cond,$fields,$order_by='',$order_by_field='',$limit='');
			$this->load->view('edit-expenses',$data);	

			
		}
		else
		{
			$data['message'] = "No penalities available with the requested lrno";
			$this->load->view('data-not-exists',$data);		
		}

		$this->load->view('footer');
		
	}


// addcustomerpayment starts here

	public function addcustomerpayment()
	{
		$this->load->view('header');
		$this->load->view('add-customer-payment');
		$this->load->view('footer');
		
	}
	
	

//addcustomerpayment ends here

}//class ends here
