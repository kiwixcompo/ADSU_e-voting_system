<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }

    public function main_page(){
		if($this->session->userdata('login_success'))
			$this->load->view('dashboard');
	else{
		redirect('users/index');
	    }
    }

	public function index()
	{
		$this->load->view('home');
	}
	
	public function view_login(){
		$this->load->view('login');
	}
	public function login(){
		$this->form_validation->set_rules('matric_no', 'Registration Number', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation == FALSE) {
			$this->view_login();
		}else{
			$matric_no = $this->input->post('matric_no');
			$password = $this->input->post('password');
			$log_me = $this->user_model->check_login($matric_no, $password);
			if (! $log_me) {
				$this->session->set_flashdata('login_failure', TRUE);
				redirect('users/view_login');
			}else{
				$this->session->set_userdata('login_success', TRUE);
				$this->session->set_userdata('log_me', $log_me);
			if($this->session->userdata('admin_users_id')==1){
					redirect('users/main_page');
			}else{
					$this->load->view('logged_users');
			}
			}
		}
	}

	public function manage_users(){
		$v_data['layout'] = 'manage_nominees_v';
		$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('manage_users', $v_data);				
	}

	public function new_users(){
		if($this->input->post('submit_user')){
			$this->form_validation->set_rules('matric_no', 'Matric Number', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if($this->form_validation->run() === FALSE){
				$this->manage_users();
			} else {
				if($this->user_model->saveUser(
				   	$this->input->post('matric_no'), 
				   	$this->input->post('password'),
				   	$this->input->post('user_type')

				   	))

				{
					$this->session->set_flashdata('message', 'User Added successfully');
					$this->load->view('manage_users');	
				} else {
					$this->session->set_flashdata('message', 'An error occurred, please try again');
					$this->manage_users();	
				}
			}
		}	
	}

	public function view_users(){
		$v_data['display_user'] = $this->user_model->view_users();
		$this->load->view('view_users', $v_data);
	}

	public function edit_user($user_id){

		if($this->input->post('submit_user')){
			$this->form_validation->set_rules('matric_no', 'Matric Number', 'trim|required');
			if($this->form_validation->run() === FALSE){
				$this->manage_users();
			} else {
				if($this->user_model->updateUser($this->input->post('id'),$this->input->post('matric_no'))){
					$this->session->set_flashdata('message', 'User updated successfully');
					redirect('users/manage_users');	
				} else {
					$this->session->set_flashdata('message', 'An error occurred, please try again');
					redirect('users/manage_users');	
				}
			}
					
		} else {
			$v_data['UserData'] = $this->user_model->getUser($user_id);
			$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('edit_user', $v_data);		
		}

	}

		public function import_xls()
		 {
			  //load library phpExcel
			  $this->load->library("PHPExcel");
			  //here I used microsoft excel 2013
			  $objReader = PHPExcel_IOFactory::createReader('Excel2013');
			  //set to read only
			  $objReader->setReadDataOnly(true);
			  //load excel file
			  $objPHPExcel = $objReader->load("data.xlsx");
			  $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);  
			  //loop from first data until last data
			  for($i=2; $i<=77; $i++){
			   $matric_no = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
			   $password = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
			   $admin_users_id = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
			   $data_user = array(
			    "matric_no" => $matric_no,
			    "password" => $password,     
			    "admin_users_id" => $admin_users_id     
			      );
			   $this->user_model->add_data($data_user);
			  }

		 }

	public function voting_area(){
		$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('voting_area', $v_data);		
	}
	public function voting_category(){
		if($this->input->post('posts')){
			if($this->user_model->getVotingCategory($this->input->post('posts')) !== FALSE){
				$this->vote_nominee($this->input->post('posts'));
			} else {
				$this->session->set_flashdata('message','No candidate in the choosen category');
				redirect('users/voting_area');
			}
			
		} else {
			$this->session->set_flashdata('message','You can not access that page without selecting a category');
			redirect('users/voting_area');
		}
	}
	
	public function vote_nominee($category_id = ''){
		$pinNo = $this->input->post('pin_no');
		$cat_id = (! empty($category_id))? $category_id : $this->input->post('category_id');
		$nomineeId = $this->input->post('candidate');
		// var_dump($nomineeId);
		// exit();
		if($this->input->post('vote')){
			// Check if pin is valid
			if($this->user_model->isValidPinNo($this->input->post('pin_no')) === FALSE){
				$v_data['votingCategory'] = $this->user_model->getVotingCategory($cat_id);
				$v_data['category'] = $this->user_model->getCategoryName($cat_id);
				$v_data['cat_id'] = $cat_id;
				$v_data['message'] = 'Invalid PIN!';
				$this->load->view('vote_candidate', $v_data);
			} else if($this->user_model->hasVoted($pinNo,$cat_id) === TRUE){
				$v_data['votingCategory'] = $this->user_model->getVotingCategory($cat_id);
				$v_data['category'] = $this->user_model->getCategoryName($cat_id);
				$v_data['cat_id'] = $cat_id;
				$v_data['message'] = 'You have already voted for this category';
				$this->load->view('vote_candidate', $v_data);
			} else {
				$v_data['votingCategory'] = $this->user_model->getVotingCategory($cat_id);
				$v_data['category'] = $this->user_model->getCategoryName($cat_id);
				$v_data['cat_id'] = $cat_id;
				if($this->user_model->saveVote($pinNo, $nomineeId, $cat_id) === TRUE){
					$nominee = $this->candidate_model->getNominee($nomineeId);
					$v_data['message'] = 'Your vote for <strong>' . $nominee[0]['first_name'] .' '. $nominee[0]['surname'] . '</strong> has been recorded.';
					
				} else {
					$v_data['message'] = 'An error occurred,we could not save your vote';
				}
				$this->load->view('vote_candidate', $v_data);
			}
			
		} else {
			$v_data['votingCategory'] = $this->user_model->getVotingCategory($cat_id);
			$v_data['category'] = $this->user_model->getCategoryName($cat_id);
			$v_data['cat_id'] = $cat_id;
			$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('vote_candidate', $v_data);			
		}
		}

	public function change_password(){
        $this->load->view('change_password');
    }

    public function change_p(){
    	$this->form_validation->set_rules('old_password', 'Old Password', 'required');
        $this->form_validation->set_rules('new_password','Password','required');
        $this->form_validation->set_rules('confirm_new_password','Confirm Password','required|matches[new_password]');
        if( $this->form_validation->run() === false ){
            $this->change_password();
        } else {
        	$old_password = $this->input->post('old_password');
        	$old_db_password = $this->user_model->old_password();

        	if ($old_db_password != md5($old_password)) {
        		$this->session->set_flashdata('password_error', 'Old password is incorrect');
        		redirect('users/change_password');
        	}else{
            $new_password = $this->input->post('new_password');
            $id = $this->input->post('id');
            $change_password = $this->user_model->change_password($id,$new_password);
            }
            if($change_password == FALSE){
                $this->session->set_flashdata('message', "<p class=\"error\">An error occurred, please try again!</p>");
                redirect('users/change_password');
            } else {
                $this->session->set_flashdata('message', "<p class=\"success\">Successfully changed password</p>");
                redirect('users/change_password');
            }
        }
    }

	public function logout(){
		$this->session->sess_destroy();
		redirect('users/view_login');
	}
}

