<?php 
	Class Result_model Extends CI_Model{

		public function getResults($category_id){
		$query = $this->db->select('COUNT(vote.candidate_id) AS total_votes, surname, first_name, passport, post_name')
						  ->from('vote')
						  ->join('candidates','vote.candidate_id = candidates.id','inner')
						  ->join('posts','vote.post_id = posts.id','inner')
						  ->where('vote.post_id', $category_id)
						  ->group_by('candidates.id')
						  ->get();
		if($query->num_rows() > 0){
			return $query->result();
		} else {
			return FALSE;
		}
	}

		public function getOverallVotesByCategory($category_id){
		$query = $this->db->select('COUNT(vote.candidate_id) AS overall_votes')
						  ->from('vote')
						  ->where('vote.post_id', $category_id)
						  ->get();
		if($query->num_rows() > 0){
			return $query->row(0)->overall_votes;
		} else {
			return FALSE;
		}
	}
}