<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commonmodel extends CI_Model 
{
	public function getrowswitout_cond($table)
	{
		$qry = $this->db->get($table);
		if( $qry->num_rows()>0)
			return $qry;
		else
			return "0";
		 
	}
		
	public function exists_not($table,$cond)	
	{
		$this->db->where($cond)	;
		$qry = $this->db->get($table);
		if($qry->num_rows()>0)
			return "1";
		else
			return "0";
	}
	
	public function getnumRows($table,$cond)	
	{
		$this->db->where($cond)	;
		$qry = $this->db->get($table);
		return  $qry->num_rows();
	}
	
	public function getRows_fields($table,$cond,$fields,$order_by,$order_by_field='',$limit='')
	{
		$this->db->select($fields);
		$this->db->from($table);
		
		if( sizeof($cond) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit);
		}
		$qry = $this->db->get('');
		if($qry->num_rows()>0)
		{
			return $qry;		
		}
		else
			return "0";
		
	}
	public function getafield($table,$cond,$field,$order_by,$order_by_field='',$limit='')
	{
		
		$this->db->select($field);
		$this->db->from($table);
		
		if( sizeof($cond) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit);
		}
		$qry = $this->db->get('');
		if($qry->num_rows()>0)
		{
			return $qry->row($field);			
		}else
			return "0";
		
		
	}//getafield method ends here
	
	
//pagination for views which involves only one table
	
	public function getrows_pagination($table,$cond,$order_by='',$order_by_field='',$limit,$start )
	{
		$this->db->select('*');
		$this->db->from($table);
		
		if( sizeof($cond) )
		{
			$this->db->where($cond);
		}
		if($order_by!='')
		{
			$this->db->order_by($order_by_field,$order_by);
		}	
		if($limit!='')
		{
				$this->db->limit($limit,$start);
		}
		$qry = $this->db->get('');

		
		if($qry->num_rows()>0)
		{
			return $qry;		
		}
		else
			return "0";
		
	}
	//getrows_pagination ends here
	
	
	public function insertdata($table,$data)
	{
		$this->db->insert($table,$data)	;
		return $this->db->insert_id();
		
	} //insertdata ends here
	
	
	public function updatedata($table,$data,$cond)	
	{
		$this->db->where($cond);
		$this->db->update($table,$data);
		if($this->db->affected_rows()>0)
			return "1";
		else
			return "0";
	}//update data method ends here
	
	//getDotor_Editdata starts here


public function deleterow($table,$cond)
{
	$this->db->delete($table,$cond);
	return "1";	
}

public function wherelike($table,$fields,$likefield,$string)
{
	
	$this->db->select($fields);
	$this->db->like($likefield, $string);
	$qry = $this->db->get($table);
	
	//return $this->db->last_query();
	
	if($qry->num_rows()>0)
	{
		return $qry;	
	}
	else
		return "0";
		
		
}



}

?>