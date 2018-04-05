<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class districts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
			$this->load->model('district');
			$this->load->model('division');
		}else{
			redirect('Users/login', 'refresh');
		}
		
	}

	public function index($action = 0)
	{
		$districts = array();
		$district = $this->district->fetchall();
		if(!empty($district)){
			foreach ($district as $key => $value) {
				$division = $this->division->fetchbyid($value->division_id);
				if(!empty($division)){
					$districts[] = array('id'=>$value->id,'name'=>$value->name,'division'=>$division[0]->name);
				}
			}
		}
		$data = array('districts'=>$districts);
		$action == 1 ? $this->load->view("prints/districts",$data) : $this->load->view("districts/list",$data);
	}

	

	public function add()
	{
		$division = $this->division->fetchall();
		$data = array('divisions'=>$division);
		$this->load->view("districts/add",$data);

	}

	public function create()
	{
		$this->form_validation->set_rules('name', 'district Name', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/districts/add', 'refresh');
		} else {
				$data = array(
				'name' => $this->input->post('name'),
				'division_id' => $this->input->post('division_id')
			);
				$result = $this->district->add($data);
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'district Added Successfully !');
					redirect('districts/add', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'district already exist!');
					redirect('districts/add', 'refresh');
				}
			
		}
	}

	public function edit($id)
	{

		$division = $this->division->fetchall();
		$record = $this->district->fetchbyid($id);
		if($record){
			$data = array('district' => $record[0], 'divisions'=>$division);
			$this->load->view('districts/edit',$data);
		}else{
			$this->session->set_userdata('errors', 'district not exist !');
			redirect('districts/index', 'refresh');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('name', 'district Name', 'trim|required');
		

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/districts/edit/'.$this->input->post('id'), 'refresh');
		} else {

				$data = array(
				'name' => $this->input->post('name'),
				'division_id' => $this->input->post('division_id')
			);

			
				$result = $this->district->update($data,$this->input->post('id'));
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'district Updated Successfully !');
					redirect('districts/index', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'district already exist!');
					redirect('districts/edit/'.$this->input->post('id'), 'refresh');
				}
			
		}
	}

	public function delete($id)
	{	
		$result = $this->district->delete($id);
		if ($result == TRUE) {
			$this->session->set_userdata('message_display', 'district Deleted Successfully !');
			redirect('districts/index', 'refresh');
		} else {
			$this->session->set_userdata('errors', 'Some Error Occur Try Again');
			redirect('districts/index', 'refresh');
		}
	}


}
