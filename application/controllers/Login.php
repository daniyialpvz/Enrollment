<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
	}

	public function index()
	{
		$this->load->view('users/login');
	}

	public function validateuser(){

			$this->form_validation->set_rules('useremail', 'Useremail', 'trim|required|xss_clean');
			$this->form_validation->set_rules('userpassword', 'Password', 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				if(isset($this->session->userdata['logged_in'])){
					$this->session->set_userdata('errors', validation_errors());
					redirect('/', 'refresh');
				}else{
					redirect('/login', 'refresh');
				}
			} else {
				
				$data = array(
				'email' => $this->input->post('useremail'),
				'password' => $this->input->post('userpassword')
				);
	
				$result = $this->user->login($data);
				
				if ($result != FALSE) {
					$session_data = array('userid' => $result[0]->user_id,'email' => $result[0]->email,'username' => $result[0]->username,'role' => $result[0]->role,'division_id'=>$result[0]->division_id,'level'=>$result[0]->level,'district_id'=>$result[0]->district_id,'form_filled'=>$result[0]->form_filled);

					$counter = array('counter'=>$result[0]->counter + 1);

					$this->user->update($counter,$result[0]->user_id);

					$this->session->set_userdata('logged_in', $session_data);

					if ($result[0]->role == 6) {
						redirect('Enrollments/index', 'refresh');
					}else{
						redirect('/', 'refresh');
					}
					
					} else {
					$this->session->set_userdata('errors', 'Invalid useremail or Password');
					redirect('/login', 'refresh');
				}
			}
		
	}

}
