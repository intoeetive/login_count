<?php

/*
=====================================================
 Login Count
-----------------------------------------------------
 http://www.intoeetive.com/
-----------------------------------------------------
 Copyright (c) 2011-2012 Yuri Salimovskiy
=====================================================
 This software is intended for usage with
 ExpressionEngine CMS, version 2.0 or higher
=====================================================
 File: mod.login_count.php
-----------------------------------------------------
 Purpose: Count and display number of logins
=====================================================
*/

if ( ! defined('BASEPATH'))
{
    exit('Invalid file request');
}


class Login_count {

    var $return_data	= ''; 						// Bah!
    
    var $settings = array();

    /** ----------------------------------------
    /**  Constructor
    /** ----------------------------------------*/

    function __construct()
    {        
    	$this->EE =& get_instance(); 
    }
    /* END */
	
	
	
	
	function count()
	{
		
		if ($this->EE->TMPL->fetch_param('member_id')!='' && $this->EE->TMPL->fetch_param('member_id')!=0)
		{
			$member_id = $this->EE->TMPL->fetch_param('member_id');
		}
		else
		{
			$member_id = $this->EE->session->userdata('member_id');
		}
		
		if ($member_id==0 || !is_numeric($member_id))
		{
			return $this->EE->TMPL->no_results();
		}
		
		$q = $this->EE->db->select('login_count')
				->from('members')
				->where('member_id', $member_id)
				->get();
		if ($q->num_rows()==0)
		{
			return $this->EE->TMPL->no_results();
		}
		
		return $q->row('login_count');
	}
	
	


}
/* END */
?>