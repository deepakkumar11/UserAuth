<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usermodel extends CI_Model
{

	function index()
	{
		echo "hello i am in model";
	}


	function register($username,$password,$email)
	{
		$data = array( 
        'username'	=>  $username , 
        'password' =>  $password, 
        'email'	=>  $email
    );
		$query = $this->db->insert('user',$data);
		if($query == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function update($id,$username,$password,$email)
	{
		$data = array( 
        'username'	=>  $username , 
        'password' =>  $password, 
        'email'	=>  $email
    );

	$this->db->where('id', $id);  
	$updateflag= $this->db->update('user', $data); 
	if($updateflag == true)
	{
		return true;
	}
	else
	{
		return false;
	}
	}



	function getData()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}

	function delete($id)
	{
		$this->db->where('id', $id);  
		$deleteFlag = $this->db->delete('user');  
		if($deleteFlag == true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	function login($username,$password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$loginflag = $this->db->get('user');
		$logindata = $loginflag->result_array();
		if(count($logindata)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}


?>