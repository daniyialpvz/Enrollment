<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class divisions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
			$this->load->model('division');
		}else{
			redirect('Users/login', 'refresh');
		}
	}

	public function index($action = 0)
	{
		$division = $this->division->fetchall();
		$data = array('divisions'=>$division);
		$action == 1 ? $this->load->view("prints/divisions",$data) : $this->load->view("divisions/list",$data);
	}

	public function add()
	{
		$this->load->view("divisions/add");
	}

	public function create()
	{
		$this->form_validation->set_rules('name', 'division Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/divisions/add', 'refresh');
		} else {
				$data = array(
				'name' => $this->input->post('name'),
			);

				$result = $this->division->add($data);
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'division Added Successfully !');
					redirect('divisions/add', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'division already exist!');
					redirect('divisions/add', 'refresh');
				}
			
		}
	}

	public function edit($id)
	{

		$record = $this->division->fetchbyid($id);
		if($record){
			$data = array('division' => $record[0]);
			$this->load->view('divisions/edit',$data);
		}else{
			$this->session->set_userdata('errors', 'division not exist !');
			redirect('divisions/index', 'refresh');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('name', 'division Name', 'trim|required');
		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/divisions/edit/'.$this->input->post('id'), 'refresh');
		} else {

				$data = array(
				'name' => $this->input->post('name'),
			);

			
				$result = $this->division->update($data,$this->input->post('id'));
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'division Updated Successfully !');
					redirect('divisions/index', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'division already exist!');
					redirect('divisions/edit/'.$this->input->post('id'), 'refresh');
				}
			
		}
	}

	public function delete($id)
	{	
		$result = $this->division->delete($id);
		if ($result == TRUE) {
			$this->session->set_userdata('message_display', 'division Deleted Successfully !');
			redirect('divisions/index', 'refresh');
		} else {
			$this->session->set_userdata('errors', 'Some Error Accur Try Again');
			redirect('divisions/index', 'refresh');
		}
	}


}
