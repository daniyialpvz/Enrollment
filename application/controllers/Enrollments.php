<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class enrollments extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$check = isset($this->session->userdata['logged_in']) ? 1 : 0;
		if($check == 1){
			$this->load->model('enrollment');
		}else{
			redirect('Users/login', 'refresh');
		}
	}

	public function index($action = 0)
	{
		$this->load->view("enrollments/searchSchool");
	}

	public function searchSchool(){
		
		$semis_code = $this->input->post('semiscode');
		$record = $this->enrollment->fetchBySemisCode($semis_code);

		if ($record == TRUE) {

			$class = $this->enrollment->fetchClasses();
			$data = array('records'=>$record,'classes'=>$class,'semisCode'=>$semis_code);
			$this->load->view("enrollments/schoolInfo",$data);

		}else{
			
			$this->session->set_userdata('message_display', 'Semis Code does not Exist!');
			redirect('enrollments/index', 'refresh');
		}
	}

	public function enrollmentData(){
		// print_r($_POST); exit;
		$school_semis_code = $this->input->post('school_semis_code');
		$record = $this->enrollment->fetchBySemisCode($semis_code);

		print_r($record); exit;

		$boys_enrollment = $this->input->post('boysEnrollment');	
		$girls_enrollment = $this->input->post('girlsEnrollment');
		$new_boys_enrollment = $this->input->post('newBoysEnrollment');
		$new_girls_enrollment = $this->input->post('newGirlsEnrollment');
		$boys_enrollment_total = $this->input->post('BoysEnrollmentTotal');
		$girls_enrollment_total = $this->input->post('GirlsEnrollmentTotal');

		//Old Enr
		$boys_enrollment_katchi = $boys_enrollment[0];
		$boys_enrollment_one = $boys_enrollment[1];
		$boys_enrollment_two = $boys_enrollment[2];
		$boys_enrollment_three = $boys_enrollment[3];
		$boys_enrollment_four = $boys_enrollment[4];
		$boys_enrollment_five = $boys_enrollment[5];
		$boys_enrollment_six = $boys_enrollment[6];
		$boys_enrollment_seven = $boys_enrollment[7];
		$boys_enrollment_eight = $boys_enrollment[8];
		$boys_enrollment_nine = $boys_enrollment[9];
		$boys_enrollment_ten = $boys_enrollment[10];
		$boys_enrollment_eleven = $boys_enrollment[11];
		$boys_enrollment_twelve = $boys_enrollment[12];

		$total_boys_old = $this->input->post('TotalBoysOld');

		$girls_enrollment_katchi = $girls_enrollment[0];
		$girls_enrollment_one = $girls_enrollment[1];
		$girls_enrollment_two = $girls_enrollment[2];
		$girls_enrollment_three = $girls_enrollment[3];
		$girls_enrollment_four = $girls_enrollment[4];
		$girls_enrollment_five = $girls_enrollment[5];
		$girls_enrollment_six = $girls_enrollment[6];
		$girls_enrollment_seven = $girls_enrollment[7];
		$girls_enrollment_eight = $girls_enrollment[8];
		$girls_enrollment_nine = $girls_enrollment[9];
		$girls_enrollment_ten = $girls_enrollment[10];
		$girls_enrollment_eleven = $girls_enrollment[11];
		$girls_enrollment_twelve = $girls_enrollment[12];

		$total_girls_old = $this->input->post('TotalGirlsOld');
		
		//new enr
		$new_boys_enrollment_katchi = $new_boys_enrollment[0];
		$new_boys_enrollment_one = $new_boys_enrollment[1];
		$new_boys_enrollment_two = $new_boys_enrollment[2];
		$new_boys_enrollment_three = $new_boys_enrollment[3];
		$new_boys_enrollment_four = $new_boys_enrollment[4];
		$new_boys_enrollment_five = $new_boys_enrollment[5];
		$new_boys_enrollment_six = $new_boys_enrollment[6];
		$new_boys_enrollment_seven = $new_boys_enrollment[7];
		$new_boys_enrollment_eight = $new_boys_enrollment[8];
		$new_boys_enrollment_nine = $new_boys_enrollment[9];
		$new_boys_enrollment_ten = $new_boys_enrollment[10];
		$new_boys_enrollment_eleven = $new_boys_enrollment[11];
		$new_boys_enrollment_twelve = $new_boys_enrollment[12];

		$total_boys_new = $this->input->post('TotalBoysNew');

		$new_girls_enrollment_katchi = $new_girls_enrollment[0];
		$new_girls_enrollment_one = $new_girls_enrollment[1];
		$new_girls_enrollment_two = $new_girls_enrollment[2];
		$new_girls_enrollment_three = $new_girls_enrollment[3];
		$new_girls_enrollment_four = $new_girls_enrollment[4];
		$new_girls_enrollment_five = $new_girls_enrollment[5];
		$new_girls_enrollment_six = $new_girls_enrollment[6];
		$new_girls_enrollment_seven = $new_girls_enrollment[7];
		$new_girls_enrollment_eight = $new_girls_enrollment[8];
		$new_girls_enrollment_nine = $new_girls_enrollment[9];
		$new_girls_enrollment_ten = $new_girls_enrollment[10];
		$new_girls_enrollment_eleven = $new_girls_enrollment[11];
		$new_girls_enrollment_twelve = $new_girls_enrollment[12];

		$total_girls_new = $this->input->post('TotalGirlsNew');

		//grand total
		$total_boys_enrollment_katchi = $boys_enrollment_total[0];
		$total_boys_enrollment_one = $boys_enrollment_total[1];
		$total_boys_enrollment_two = $boys_enrollment_total[2];
		$total_boys_enrollment_three = $boys_enrollment_total[3];
		$total_boys_enrollment_four = $boys_enrollment_total[4];
		$total_boys_enrollment_five = $boys_enrollment_total[5];
		$total_boys_enrollment_six = $boys_enrollment_total[6];
		$total_boys_enrollment_seven = $boys_enrollment_total[7];
		$total_boys_enrollment_eight = $boys_enrollment_total[8];
		$total_boys_enrollment_nine = $boys_enrollment_total[9];
		$total_boys_enrollment_ten = $boys_enrollment_total[10];
		$total_boys_enrollment_eleven = $boys_enrollment_total[11];
		$total_boys_enrollment_twelve = $boys_enrollment_total[12];

		$grand_total_boys = $this->input->post('TotalBoys');

		$total_girls_enrollment_katchi = $girls_enrollment_total[0];
		$total_girls_enrollment_one = $girls_enrollment_total[1];
		$total_girls_enrollment_two = $girls_enrollment_total[2];
		$total_girls_enrollment_three = $girls_enrollment_total[3];
		$total_girls_enrollment_four = $girls_enrollment_total[4];
		$total_girls_enrollment_five = $girls_enrollment_total[5];
		$total_girls_enrollment_six = $girls_enrollment_total[6];
		$total_girls_enrollment_seven = $girls_enrollment_total[7];
		$total_girls_enrollment_eight = $girls_enrollment_total[8];
		$total_girls_enrollment_nine = $girls_enrollment_total[9];
		$total_girls_enrollment_ten = $girls_enrollment_total[10];
		$total_girls_enrollment_eleven = $girls_enrollment_total[11];
		$total_girls_enrollment_twelve = $girls_enrollment_total[12];

		$grand_total_girls = $this->input->post('TotalGirls');

		$enr_data_before = array(
				'semis_code' => $school_semis_code,
				'boys_katchi' => $boys_enrollment_katchi,
				'boys_one' => $boys_enrollment_one,
				'boys_two' => $boys_enrollment_two,
				'boys_three' => $boys_enrollment_three,
				'boys_four' => $boys_enrollment_four,
				'boys_five' => $boys_enrollment_five,
				'boys_six' => $boys_enrollment_six,
				'boys_seven' => $boys_enrollment_seven,
				'boys_eight' => $boys_enrollment_eight,
				'boys_nine' => $boys_enrollment_nine,
				'boys_ten' => $boys_enrollment_ten,
				'boys_eleven' => $boys_enrollment_eleven,
				'boys_twelve' => $boys_enrollment_twelve,
				'total_boys' => $total_boys_old,
				'girls_katchi' => $girls_enrollment_katchi,
				'girls_one' => $girls_enrollment_one,
				'girls_two' => $girls_enrollment_two,
				'girls_three' => $girls_enrollment_three,
				'girls_four' => $girls_enrollment_four,
				'girls_five' => $girls_enrollment_five,
				'girls_six' => $girls_enrollment_six,
				'girls_seven' => $girls_enrollment_seven,
				'girls_eight' => $girls_enrollment_eight,
				'girls_nine' => $girls_enrollment_nine,
				'girls_ten' => $girls_enrollment_ten,
				'girls_eleven' => $girls_enrollment_eleven,
				'girls_twelve' => $girls_enrollment_twelve,
				'total_girls' => $total_girls_old,
			);

		$enr_data_after = array(
				'semis_code' => $school_semis_code,
				'boys_katchi' => $new_boys_enrollment_katchi,
				'boys_one' => $new_boys_enrollment_one,
				'boys_two' => $new_boys_enrollment_two,
				'boys_three' => $new_boys_enrollment_three,
				'boys_four' => $new_boys_enrollment_four,
				'boys_five' => $new_boys_enrollment_five,
				'boys_six' => $new_boys_enrollment_six,
				'boys_seven' => $new_boys_enrollment_seven,
				'boys_eight' => $new_boys_enrollment_eight,
				'boys_nine' => $new_boys_enrollment_nine,
				'boys_ten' => $new_boys_enrollment_ten,
				'boys_eleven' => $new_boys_enrollment_eleven,
				'boys_twelve' => $new_boys_enrollment_twelve,
				'total_boys' => $total_boys_new,
				'girls_katchi' => $new_girls_enrollment_katchi,
				'girls_one' => $new_girls_enrollment_one,
				'girls_two' => $new_girls_enrollment_two,
				'girls_three' => $new_girls_enrollment_three,
				'girls_four' => $new_girls_enrollment_four,
				'girls_five' => $new_girls_enrollment_five,
				'girls_six' => $new_girls_enrollment_six,
				'girls_seven' => $new_girls_enrollment_seven,
				'girls_eight' => $new_girls_enrollment_eight,
				'girls_nine' => $new_girls_enrollment_nine,
				'girls_ten' => $new_girls_enrollment_ten,
				'girls_eleven' => $new_girls_enrollment_eleven,
				'girls_twelve' => $new_girls_enrollment_twelve,
				'total_girls' => $total_girls_new,
			);

		$enr_data_total = array(
				'semis_code' => $school_semis_code,
				'boys_katchi' => $total_boys_enrollment_katchi,
				'boys_one' => $total_boys_enrollment_one,
				'boys_two' => $total_boys_enrollment_two,
				'boys_three' => $total_boys_enrollment_three,
				'boys_four' => $total_boys_enrollment_four,
				'boys_five' => $total_boys_enrollment_five,
				'boys_six' => $total_boys_enrollment_six,
				'boys_seven' => $total_boys_enrollment_seven,
				'boys_eight' => $total_boys_enrollment_eight,
				'boys_nine' => $total_boys_enrollment_nine,
				'boys_ten' => $total_boys_enrollment_ten,
				'boys_eleven' => $total_boys_enrollment_eleven,
				'boys_twelve' => $total_boys_enrollment_twelve,
				'total_boys' => $grand_total_boys,

				'girls_katchi' => $total_girls_enrollment_katchi,
				'girls_one' => $total_girls_enrollment_one,
				'girls_two' => $total_girls_enrollment_two,
				'girls_three' => $total_girls_enrollment_three,
				'girls_four' => $total_girls_enrollment_four,
				'girls_five' => $total_girls_enrollment_five,
				'girls_six' => $total_girls_enrollment_six,
				'girls_seven' => $total_girls_enrollment_seven,
				'girls_eight' => $total_girls_enrollment_eight,
				'girls_nine' => $total_girls_enrollment_nine,
				'girls_ten' => $total_girls_enrollment_ten,
				'girls_eleven' => $total_girls_enrollment_eleven,
				'girls_twelve' => $total_girls_enrollment_twelve,
				'total_girls' => $grand_total_girls,
			);

			$result = $this->enrollment->addBeforeApril($enr_data_before);
			$result = $this->enrollment->addAfterApril($enr_data_after);
			$result = $this->enrollment->addGrandTotal($enr_data_total);

			if ($result == TRUE) {
				$this->session->set_userdata('message_display', 'Enrollment Added Successfully !');
				redirect('enrollments/index', 'refresh');
			} else {
				$this->session->set_userdata('errors', 'Enrollment already exist!');
				redirect('enrollments/index', 'refresh');
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
