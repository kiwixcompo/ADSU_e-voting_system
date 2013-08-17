<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function category_dropdown($name='posts', $selected=NULL, $extra=NULL)
	{
		$c =& get_instance();	
		$options = $c->db->select('id,post_name')->from('posts')->get()->result_array();
		$select_options = array();
		foreach($options as $option)
		{
			$select_options[$option['id']] = $option['post_name'];
		}
		$dropdown = form_dropdown($name, $select_options, $selected, $extra);
		
		return $dropdown;
	
	}

	function expand_category($id)
	{
		if(! empty($id)){
			$c =& get_instance();
			
			return $c->db->select('post_name')
					 ->where('id', $id)
					 ->limit(1)
					 ->get('posts')
					 ->row()
					 ->post_name;
		}

	}
	function user_type_dropdown($name='user_type', $selected=NULL, $extra=NULL)
	{
		$c =& get_instance();	
		$options = $c->db->select('id,position')->from('admin_users')->get()->result_array();
		$select_options = array();
		foreach($options as $option)
		{
			$select_options[$option['id']] = $option['position'];
		}
		$dropdown = form_dropdown($name, $select_options, $selected, $extra);
		
		return $dropdown;
	
	}
