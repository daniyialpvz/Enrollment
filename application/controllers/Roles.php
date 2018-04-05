<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
			$this->load->model('role');
		}else{
			redirect('Users/login', 'refresh');
		}
	}

	public function index($action = 0)
	{
		$role = $this->role->fetchall();
		$data = array('roles'=>$role);
		$action == 1 ? $this->load->view("prints/roles",$data) : $this->load->view("roles/list",$data);
	}

	public function add()
	{
		$this->load->view("roles/add");
	}

	public function create()
	{
		$this->form_validation->set_rules('role', 'role', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/Roles/add', 'refresh');
		} else {
				$data = array(
				'description' => $this->input->post('role'),
				'status' => $this->input->post('status')
			);

				$result = $this->role->add($data);
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'role Added Successfully !');
					redirect('roles/add', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'role already exist!');
					redirect('roles/add', 'refresh');
				}
			
		}
	}

	public function edit($id)
	{

		$record = $this->role->fetchbyid($id);
		if($record){
			$data = array('role' => $record[0]);
			$this->load->view('roles/edit',$data);
		}else{
			$this->session->set_userdata('errors', 'role not exist !');
			redirect('roles/index', 'refresh');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('role', 'role', 'trim|required');
		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/Roles/edit/'.$this->input->post('id'), 'refresh');
		} else {

				$data = array(
				'description' => $this->input->post('role'),
				'status' => $this->input->post('status')
			);

			
				$result = $this->role->update($data,$this->input->post('id'));
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'role Updated Successfully !');
					redirect('Roles/index', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'role already exist!');
					redirect('Roles/edit/'.$this->input->post('id'), 'refresh');
				}
			
		}
	}

	public function delete($id)
	{	
		$result = $this->role->delete($id);
		if ($result == TRUE) {
			$this->session->set_userdata('message_display', 'role Deleted Successfully !');
			redirect('Roles/index', 'refresh');
		} else {
			$this->session->set_userdata('errors', 'Some Error Occur Try Again');
			redirect('Roles/index', 'refresh');
		}
	}


}
