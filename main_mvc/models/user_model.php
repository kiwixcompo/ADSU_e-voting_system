<?php 
	Class User_model Extends CI_Model {
		
		public function check_login($matric_no, $password){

			$query = $this->db->where('matric_no',$matric_no)->where('password', md5($password))->get('users');
			if ($query->num_rows()>0) {
                $users = $query->row();
                $session_data = array(
                    'user_id' => $users->id,
                    'matric_no' => $users->matric_no,
                    'admin_users_id' => $users->admin_users_id);
                $this->session->set_userdata($session_data);
				return $users;
			} else {
				return FALSE;
			}
			}
		public function old_password(){

			$query = $this->db->where('matric_no',$this->session->userdata('matric_no'))->limit(1)->get('users');
			if ($query->num_rows()>0) {
                $old_password = $query->row();
                
				return $old_password->password;
			} else {
				return FALSE;
			}
			}
		public function change_password($id, $new_password){
            $this->db->where('id', $id)->update('users', array('password' => md5($new_password)));
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            }
            return FALSE;
        }

		public function isLoggedIn(){
			if($this->session->userdata('loggedIn')){
				return TRUE;
			} else {
				return FALSE;
			}
		}	

		public function saveUser($matric_no, $password, $admin_users_id){
		$saveArray = array(
			'matric_no' 	=> $matric_no,
			'password' 	=> md5($password),
			'admin_users_id' 			=> $admin_users_id
		);

		$updateArray = array(
			'matric_no' 	=> ucfirst(strtolower($matric_no)),
			'password' 	=> ucfirst(strtolower($password)),
			'admin_users_id' 			=> $admin_users_id
			
		);
		if($this->db->where('matric_no', $matric_no)->where('password', $password)->where('admin_users_id', $admin_users_id)->get('users')->num_rows() > 0)
		{
		   $this->db->where('matric_no', $matric_no)->where('password', $password)->where('admin_users_id', $admin_users_id)->update('users', $updateArray);
		} else {
			$this->db->insert('users', $saveArray);		

			if($this->db->affected_rows() > 0){
				return TRUE;
			} else {
				return FALSE;
			}

		}
				
	}

	public function view_users(){
		$this->db->select('id, matric_no, password');
		$get = $this->db->get('users');
		if ($get->num_rows() > 0) {
			return $get->result();
		}else{
			return FALSE;
		}
	}

	public function getUser($user_id = ''){
		if(! empty($user_id)){
			$this->db->where('id', $user_id);		
		}
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			return $query->result_array();
		} else {
			return FALSE;
		}		
	}

	public function updateUser($user_id, $matric_no){
		$this->db->where('id', $user_id)->update('users', array('matric_no' => $matric_no));
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}		
	}

		function add_data($datauser)
	 {
	  $this->db->insert('users',$datauser);
	  return $this->db->insert_id();
	 } 

	 public function getVotingCategory($category_id){
		$query = $this->db->where('post_id', (int) $category_id)
					  ->get('candidates');
		if($query->num_rows() > 0){
			return $query->result();
		} else {
			return FALSE;
		}			  
	}

	public function isValidPinNo($pin_no){
		$q = $this->db->where('pin', (int) $pin_no)
					  ->limit(1)
					  ->get('pins');
		if($q->num_rows() > 0) {
			if($q->row()->usage_status == 0){
				$this->db->where('pin', $pin_no)->set('usage_status',1)->update('pins');
				if($this->db->affected_rows() > 0){
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				TRUE;
			}
		} else {
			return FALSE;
		}
	}

	public function saveVote($used_pins, $candidate_id, $post_id){
		$saveArray = array(
			'used_pins' => $used_pins,
			'candidate_id'	=> $candidate_id,
			'post_id'	=> $post_id
		);
		$this->db->insert('vote', $saveArray);
		if($this->db->affected_rows() > 0){
			return TRUE;
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

	public function hasVoted($pinNo,$category_id){
			$q = $this->db
					  ->where('post_id', (int) $category_id)
					  ->where('used_pins', $pinNo)
					  ->limit(1)
					  ->get('vote');
		if($q->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
	}