<?php 

	Class Pin_model Extends CI_Model{

		public function generatePinNo($number_to_gen = '', $length = ''){
			$num_to_gen = (! empty($number_to_gen))? $number_to_gen : 10;
			$pin_length = (! empty($length))? $length : 6;
		
			for($i = 1; $i <= (int) $num_to_gen; $i++){
			 $six_digit_pin[] = substr((mt_rand().mt_rand()), 0, 6);
			}
			
			return $six_digit_pin;
		}
	
		public function savePins($pins){
			$pin_array = array();
			foreach($pins as $pin){
				$pin_array[] = array('pin' => $pin,
									'usage_status' => 0);
			}
			
			$this->db->insert_batch('pins', $pin_array);
			if($this->db->affected_rows() > 0){
				return TRUE;
			} else {
				return FALSE;
			}
		
		}

		public function getPinNos(){
		$query = $this->db->select('pin')
					->where('usage_status', 0)
					->get('pins');
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
			if($q->row()->pin_status == 0){
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
	
	}