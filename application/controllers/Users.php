<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
		$this->load->model('user');
		$this->load->model('role');
		$this->load->model('division');
		$this->load->model('district');
		$this->load->model('commonModel');
		}else{
			redirect('/login', 'refresh');
		}
	}

	public function index($action = 0)
	{
		$users = array();
		$user = $this->user->fetchall();
		if(!empty($user)){
			foreach ($user as $key => $value) {
				$r_obj = $this->role->fetchbyid($value->role); 
				$users[] = array(
					'user_id'=>$value->user_id,
					'username'=>$value->username,
					'short_name'=>$value->short_name,
					'full_name'=>$value->full_name,
					'email'=>$value->email,
					'counter'=>$value->counter,
					'description'=> (!empty($r_obj) ? $r_obj[0]->description : ''));

					
			}
		}
		$data = array('users'=>$users);
		$action == 1 ? $this->load->view("prints/users",$data) : $this->load->view("users/list",$data);
	}

	

	public function add()
	{
		$division = $this->division->fetchall();
		$district = $this->district->fetchall();
		$role = $this->role->fetchall();
		$data = array('roles'=>$role,'divisions'=>$division,'districts'=>$district);
		$this->load->view("users/add",$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('username', 'user', 'trim|required');
		$this->form_validation->set_rules('agency_id', 'agency', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('short_name', 'Short Name', 'trim|required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('errors', validation_errors());
			redirect('/Users/add', 'refresh');
		} else {
				$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'short_name' => $this->input->post('short_name'),
				'full_name' => $this->input->post('full_name'),
				'email' => $this->input->post('email'),
				'role' => $this->input->post('role'),
				'division_id'=> $this->input->post('division_id'),
				'level'=> $this->input->post('level'),
				'district_id'=> $this->input->post('district_id')
			);
				$result = $this->user->add($data);
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'user Added Successfully !');
					redirect('users/add', 'refresh');
				} else {
					$this->session->set_userdata('errors', 'user already exist!');
					redirect('users/add', 'refresh');
				}
			
		}
	}

	public function edit($user_id)
	{
		$division = $this->division->fetchall();
		$district = $this->district->fetchall();
		$role = $this->role->fetchall();
		$record = $this->user->fetchbyid($user_id);
		if($record){
			$data = array('user' => $record[0], 'roles'=>$role,'divisions'=>$division,'districts'=>$district,'profile'=>0);
			$this->load->view('users/edit',$data);
		}else{
			$this->session->set_userdata('errors', 'user not exist !');
			redirect('users/index', 'refresh');
		}
	}

	public function update()
	{

			$field = array(
			'form_filled'=> 1,
			);
			$id = $this->session->userdata['logged_in']['userid'];

			$status = $this->user->update($field,$id);

			$profile = $this->input->post('profile');
			

				$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'short_name' => $this->input->post('short_name'),
				'full_name' => $this->input->post('full_name'),
				'email' => $this->input->post('email'),
				'contact' => $this->input->post('contact'),
				'role' => $this->input->post('role'),
				'division_id'=> $this->input->post('division_id'),
				'level'=> $this->input->post('level'),
				'district_id'=> $this->input->post('district_id')
			);	

	
			
				$result = $this->user->update($data,$this->input->post('user_id'));
				if ($result == TRUE) {
					$this->session->set_userdata('message_display', 'user Updated Successfully !');
					$this->session->userdata['logged_in']['form_filled'] = 1;
					$profile == 1 ? redirect('Profiles/edit/'.$this->input->post('user_id'), 'refresh') : redirect('Users/edit/'.$this->input->post('user_id'), 'refresh');
				} else {
					$this->session->set_userdata('errors', 'user Information already exist!');
					$profile == 1 ? redirect('Profiles/edit/'.$this->input->post('user_id'), 'refresh') : redirect('Users/edit/'.$this->input->post('user_id'), 'refresh');
				}
			
		
	}

	public function delete($user_id)
	{	
		$result = $this->user->delete($user_id);
		if ($result == TRUE) {
			$this->session->set_userdata('message_display', 'user Deleted Successfully !');
			redirect('Users/index', 'refresh');
		} else {
			$this->session->set_userdata('errors', 'Some Error Occur Try Again');
			redirect('Users/index', 'refresh');
		}
	}




	public function login(){
		redirect('Login/index', 'refresh');
	}


	public function logout() {
		$sess_array = array('userid' => '','email' => '','username' => '','role' => '','division_id'=>'','level'=>'','district_id'=>'','form_filled'=>'');
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->session->unset_userdata('tagged_notification',array('notifications'=>''));
		$this->session->set_userdata('message_display', 'Successfully Logout');
		redirect('/', 'refresh');
	}


}
