<?php 

	Class Results Extends CI_Controller{

			/*public function __construct(){
		        parent::__construct();
		        $this->load->model('user_model');
	    	}*/

			public function Election_results(){
				/*if($this->user_model->isLoggedIn() === FALSE){
					$this->session->set_flashdata('message', 'You need to be logged in to access that area!');
					redirect('/');
				}*/
				$v_data['resultData'] = $this->candidate_model->getCategory();
				$v_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				$this->load->view('manage_results', $v_data);
		}

			public function view_results($cat_id){
				/*if($this->users_model->isLoggedIn() === FALSE){
					$this->session->set_flashdata('message', 'You need to be logged in to access that area!');
					redirect('/');
				}*/
				$resultData = $this->result_model->getResults($cat_id);
				if($resultData !== FALSE){
					$resultCount = $this->result_model->getOverallVotesByCategory($cat_id);
			 		$v_data['resultCategoryData'] = $this->candidate_model->getCategoryName($cat_id);
					$v_data['resultData'] = $this->_formatAsData($resultData, $resultCount);
					$v_data['resultStat'] = $this->_formatAsCategoryData($resultData);
					$this->load->view('final_result_view', $v_data);
				} else {
					$resultCount = $this->result_model->getOverallVotesByCategory($cat_id);
			 		$v_data['resultCategoryData'] = $this->candidate_model->getCategoryName($cat_id);
					$v_data['resultData'] = FALSE;
					$v_data['resultStat'] = FALSE;
					$this->load->view('final_result_view', $v_data);			
				}
		}

		function _formatAsData($result_array, $total_count = ''){
			$jData = array();
			if(is_array($result_array)){
				foreach($result_array as $key => $value){
					if(! empty($total_count)){
						$jsonData[] = array(/*$value->surname, */$value->first_name, round((((((int) $value->total_votes) / (int) $total_count)) * 100), 2));
					} else {
						$jsonData[] = array(/*$value->surname, */$value->first_name, (int) $value->total_votes);
					}
					
				}
					$jData['name'] = 0;
					$jData['data'] = $jsonData;
					return json_encode($jData);
				}
	}
	
	function _formatAsCategoryData($result_array){
		if(is_array($result_array)){
			$jsonData = array();
			foreach($result_array as $key => $value){
				$jsonData[] = array(
					'nominee_name' => $value->surname . ' ' . $value->first_name,
					'total_votes' => $value->total_votes,
					'passport' => $value->passport
					);
			}
				return $jsonData;
			}
	}
	}
