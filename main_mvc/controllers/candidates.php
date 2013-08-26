<?php
	
	Class Candidates Extends CI_Controller{

		public function __construct(){
        parent::__construct();
        $this->load->model('candidate_model');
    	}

    	public function add_new_category(){
    		$this->load->view('new_category');
    	}

		public function manage_categories(){
		/*if($this->user_model->isLoggedIn() === FALSE){
			$this->session->set_flashdata('message', 'You need to be logged in to access that area!');
			redirect('/');
		}*/
		if($this->input->post('submit_category')){
			$this->form_validation->set_rules('post_name', 'Category Name', 'trim|required');
			if($this->form_validation->run() === FALSE){
				$this->manage_categories();
			} else {
				if($this->candidate_model->saveCategory($this->input->post('post_name'))){
					$this->session->set_flashdata('message', 'Category created successfully');
					redirect('candidates/manage_categories');	
				} else {
					$this->session->set_flashdata('message', 'An error occurred, please try again');
					redirect('candidates/manage_categories');	
				}
			}
		} else {
			$v_data['layout'] = 'manage_categories_v';
			$v_data['categoryData'] = $this->candidate_model->getCategory();
			$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('posts', $v_data);			
		}
		
	}

		public function edit_category($category_id){
		/*if($this->user_model->isLoggedIn() === FALSE){
			$this->session->set_flashdata('message', 'You need to be logged in to access that area!');
			redirect('/');
		}*/
		if($this->input->post('submit_category')){
			$this->form_validation->set_rules('post_name', 'Post Name', 'trim|required');
			if($this->form_validation->run() === FALSE){
				$this->manage_categories();
			} else {
				if($this->candidate_model->updateCategory($this->input->post('id'),$this->input->post('post_name'))){
					$this->session->set_flashdata('message', 'Category updated successfully');
					redirect('candidates/manage_categories');	
				} else {
					$this->session->set_flashdata('message', 'An error occurred, please try again');
					redirect('candidates/manage_categories');	
				}
			}
					
		} else {
			$v_data['layout'] = 'edit_categories_v';
			$v_data['categoryData'] = $this->candidate_model->getCategory($category_id);
			$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('edit_post', $v_data);		
		}

	}

	public function delete_category($category_id){
		if($this->candidate_model->deleteCategory($category_id)){
			$this->session->set_flashdata('message', 'Category deleted successfully');
			redirect('candidates/manage_categories');	
		} else {
			$this->session->set_flashdata('message', 'An error occurred, please try again');
			redirect('candidates/manage_categories');	
		}		
	}

	public function manage_candidates(){
		/*if($this->user_model->isLoggedIn() === FALSE){
			$this->session->set_flashdata('message', 'You need to be logged in to access that area!');
			redirect('/');
		}*/
		$v_data['nomineeData'] = $this->candidate_model->getNominee();
		$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('manage_candidates', $v_data);				
	}
	public function add_new(){
		$this->load->view('new_candidates');
	}
	public function new_nominees(){
		if($this->input->post('submit_nominee')){
			$this->form_validation->set_rules('surname', 'Surname', 'trim|required');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('state_of_origin', 'State Of Origin', 'trim|required');
			$this->form_validation->set_rules('CGPA', 'CGPA', 'trim|required');

			if($this->form_validation->run() === FALSE){
				$this->manage_candidates();
			} else {
				if($this->candidate_model->saveNominee(
				   	$this->input->post('surname'), 
				   	$this->input->post('first_name'),
				   	$this->input->post('state_of_origin'),
				   	$this->input->post('CGPA'),
				   	$this->input->post('passport'),
				   	$this->input->post('posts')

				   	))

				{
					$this->session->set_flashdata('message', 'Candidate Added successfully');
					redirect('candidates/manage_candidates');	
				} else {
					$this->session->set_flashdata('message', 'An error occurred, please try again');
					redirect('candidates/manage_candidates');	
				}
			}
		}	
	}
	
	public function edit_nominee($nominee_id){
		/*if($this->Vote_m->isLoggedIn() === FALSE){
			$this->session->set_flashdata('message', 'You need to be logged in to access that area!');
			redirect('/');
		}*/
		if($this->input->post('submit_nominee')){
			$this->form_validation->set_rules('surname', 'Surname', 'trim|required');
			$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('state_of_origin', 'State Of Origin', 'trim|required');
			$this->form_validation->set_rules('CGPA', 'CGPA', 'trim|required');
			$this->form_validation->set_rules('posts', 'Category');
			if($this->form_validation->run() === FALSE){
				$this->manage_candidates();
			} else {
				if($this->candidate_model->updateNominee(
					$this->input->post('id'),
					$this->input->post('surname'),
					$this->input->post('first_name'),
					$this->input->post('state_of_origin'),
					$this->input->post('CGPA'),
					
					$this->input->post('posts'))){

					$this->session->set_flashdata('message', 'Candidate updated successfully');
					redirect('candidates/manage_candidates');	
				} else {
					$this->session->set_flashdata('message', 'An error occurred, please try again');
					redirect('candidates/manage_candidates');	
				}
			}
					
		} else {
			$v_data['layout'] = 'edit_nominees_v';
			$v_data['nomineeData'] = $this->candidate_model->getNominee($nominee_id);
			$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('edit_candidate', $v_data);		
		}

	}
	
	public function delete_nominee($nominee_id){
		if($this->candidate_model->deleteNominee($nominee_id)){
			$this->session->set_flashdata('message', 'Candidate deleted successfully');
			redirect('candidates/manage_candidates');	
		} else {
			$this->session->set_flashdata('message', 'An error occurred, please try again');
			redirect('candidates/manage_candidates');	
		}		
	}
	
	

	}