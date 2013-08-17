<?php 

	Class Candidate_model Extends CI_Model{

		public function getCategory($category_id = ''){
		if(! empty($category_id)){
			$this->db->where('id', $category_id);		
		}
		$query = $this->db->get('posts');
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return FALSE;
		}		
	}
	
	public function getCategoryName($category_id){
		$query = $this->db->select('post_name')->where('id',$category_id)->limit(1)->get('posts');
		if($query->num_rows() > 0){
			return $query->row(0)->post_name;
		} else {
			return FALSE;
		}		
	}
	
	public function saveCategory($category_name){
		$this->db->insert('posts', array('post_name' => $category_name));
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}		
	}

	public function updateCategory($category_id, $category_name){
		$this->db->where('id', $category_id)->update('posts', array('post_name' => $category_name));
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}		
	}
	
	public function deleteCategory($category_id){
		$this->db->where('id', (int) $category_id)->delete('posts');
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}		
	}

	public function getNominee($nominee_id = ''){
		if(! empty($nominee_id)){
			$this->db->where('id', $nominee_id);		
		}
		$query = $this->db->get('candidates');
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return FALSE;
		}		
	}
	
	public function saveNominee($surname, $first_name, $state_of_origin, $CGPA, $passport, $post_id){
		$saveArray = array(
			'surname' 	=> ucfirst(strtolower($surname)),
			'first_name' 	=> ucfirst(strtolower($first_name)),
			'state_of_origin' 	=> ucfirst(strtolower($state_of_origin)),
			'CGPA' 	=> ucfirst(strtolower($CGPA)),
			'post_id' 			=> $post_id
		);

		$updateArray = array(
			'surname'		=> ucfirst(strtolower($surname)),
			'first_name'    => ucfirst(strtolower($first_name)),
			'state_of_origin'    => ucfirst(strtolower($state_of_origin)),
			'CGPA'    => ucfirst(strtolower($CGPA)),
			'post_id' 			=> $post_id
			
		);
		if($this->db->where('surname', $surname)->where('first_name', $first_name)->where('state_of_origin', $state_of_origin)->where('CGPA', $CGPA)->where('post_id', $post_id)->get('candidates')->num_rows() > 0)
		{
		   $this->db->where('surname', $surname)->where('first_name', $first_name)->where('state_of_origin', $state_of_origin)->where('CGPA', $CGPA)->where('post_id', $post_id)->update('candidates', $updateArray);
		} else {
			$this->db->insert('candidates', $saveArray);		
			$id = $this->db->insert_id();

			$config['upload_path'] = './uploads/images';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '1024';
			// $config['max_width']  = '105';
			// $config['max_height']  = '115';
			$config['file_name']  = $id . '_passport';

			$this->load->library('upload', $config);
			if($this->db->affected_rows() > 0 && $this->upload->do_upload('passport')){
				$upload_data = $this->upload->data();
				$this->db->where('id',$id)->update('candidates', array('passport'=>$upload_data['file_name']));
				return TRUE;
			} else {
				return FALSE;
			}

		}
				
	}

	public function updateNominee($id, $surname, $first_name, $state_of_origin, $CGPA, $post_id){
		$this->db->where('id', $id)->update('candidates', array(
			'surname' => $surname,
			'first_name'    => $first_name,
			'state_of_origin'    => $state_of_origin,
			'CGPA'    => $CGPA,
			'post_id' => $post_id));

			$config['upload_path'] = './uploads/images';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '1024';
			// $config['max_width']  = '105';
			// $config['max_height']  = '115';
			$config['file_name']  = $id . '_passport';

			$this->load->library('upload', $config);

		if($this->db->affected_rows() > 0 && $this->upload->do_upload('passport')){
			$upload_data = $this->upload->data();
			var_dump($upload_data);
			exit();
			return TRUE;
		} else {
			return FALSE;
		}		
	}
	
	public function deleteNominee($id){
		$this->db->where('id', (int) $id)->delete('candidates');
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}		
	}
	//End CRUD methods
	
	public function uploadPassport($id, $name){
		$config['upload_path'] = './uploads/images';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '1024';
		$config['max_width']  = '105';
		$config['max_height']  = '115';
		$config['file_name']  = $id . '_passport';
		
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload($name)){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			//echo "success";
		}
	}

	}