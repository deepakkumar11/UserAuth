<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function index()
	{
		$this->load->view('welcome_message');
	}


	public function getuserlist()
	{
		$data1 = $this->usermodel->getData();
		$data['status']="OK";
		$data['data'] = $data1;
		echo json_encode($data);
	}

	public function register()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$addflag = $this->usermodel->register($username,$password,$email);
		if($addflag == true)
		{
			$data['status']="OK";
			$data['msg'] = "Register successfully";
		}
		else
		{
			$data['status']="NOK";
			$data['msg'] = "Register failed";	
		}
		echo json_encode($data);

	}


	public function update()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$updateflag = $this->usermodel->update($id,$username,$password,$email);
		if($updateflag == true)
		{
			$data['status']="OK";
			$data['msg'] = "User Updated successfully";
		}
		else
		{
			$data['status']="NOK";
			$data['msg'] = "User Updation failed";	
		}

		echo json_encode($data);
	}



	public function delete()
	{
		
		$id = $this->input->post('id');
		$deleteFlag = $this->usermodel->delete($id);
		if($deleteFlag == true)
		{
			$data['status']="OK";
			$data['data'] = "User Deleted successfully";
		}
		else
		{
			$data['status']="NOK";
			$data['data'] = "User Deletion failed";	
		}

		echo json_encode($data);
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$loginflag = $this->usermodel->login($username,$password);

		$tokenData = array();
		$tokenData['username'] = $username ;
		$tokenData['password'] = $password ;
		 //TODO: Replace with data for token


		if($loginflag == true)
		{
			$data['status']="OK";
			$data['data'] = "User login successfully";
			$tokenData = array();
			$tokenData['username'] = $username ;
			$tokenData['password'] = $password;
			//$data['token'] = AUTHORIZATION::generateToken($tokenData);
		}
		else
		{
			$data['status']="User Login failed";
			$data['data'] = "NOK";
		}

		echo json_encode($data);
	}
}
?>