<?php 

	Class Pins Extends CI_Controller{

		public function __construct(){
        parent::__construct();
        $this->load->model('pin_model');
    	}

		public function manage_pin(){
			$v_data['layout'] = 'manage_pin_v';
			$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('generate_pins', $v_data);
		}

		public function generate_pins(){
		if($this->input->post('pin')){
			$this->form_validation->set_rules('number_of_pin', 'Total PIN(s)','required|numeric');
			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('message', validation_errors());
				redirect('pins/manage_pin');
			} else {
				$total_pins = $this->input->post('number_of_pin');
				$pins = $this->pin_model->generatePinNo($total_pins);
				
				if($this->pin_model->savePins($pins) === TRUE){
					$this->session->set_flashdata('message', $total_pins . ' PIN(s) created succesfully!');
					redirect('pins/manage_pin');						
				} else {
					$this->session->set_flashdata('message', 'An error occured while trying to create the PIN(s)');
					redirect('pins/manage_pin');				
				}
			}
		
				
		} else {
			$v_data['layout'] = 'create_pin';
			$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('generate_pins', $v_data);			
		}

	}

	public function view_pins(){
		$v_data['layout'] = 'view_pins_v';
		$v_data['pins'] = $this->pin_model->getPinNos();
		$v_data['association_name'] = 'ADSU e-Voting';
		$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		$this->load->view('view_pins', $v_data);		
	}
	}