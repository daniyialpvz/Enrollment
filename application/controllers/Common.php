<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
			$this->load->model('commonModel');
		}else{
			redirect('Users/login', 'refresh');
		}
	}

	public function index()
	{
		
	}

	public function taggedNotification(){
		$role = $this->session->userdata['logged_in']['agency_id'];
		if($role != 0)
		{
			$notification = $this->commonModel->fetchallNotification($role);
			$data = array('notifications'=>$notification);
			$this->load->view("common/right_navigation",$data);
		}
		
	}
}
