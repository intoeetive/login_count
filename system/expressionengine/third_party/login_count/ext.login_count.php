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
 File: ext.login_count.php
-----------------------------------------------------
 Purpose: Count and display number of logins
=====================================================
*/

if ( ! defined('BASEPATH'))
{
    exit('Invalid file request');
}

require_once PATH_THIRD.'login_count/config.php';

class Login_count_ext
{
	var $name	     	= LOGIN_COUNT_ADDON_NAME;
	var $version 		= LOGIN_COUNT_ADDON_VERSION;
	var $description	= "Count number of logins";
	var $settings_exist	= 'n';
	var $docs_url		= 'https://github.com/intoeetive/login_count/README';
    
    var $settings 		= array();
    //var $required_by 	= array('module');	
    
   	/**
	 * Constructor
	 *
	 * @param 	mixed	Settings array or empty string if none exist.
	 */
	function __construct($settings = '')
	{
		$this->EE =& get_instance();
        $this->settings = $settings;
	}
    
    /**
     * Activate Extension
     */
    function activate_extension()
    {
        
        $hooks = array(
    		array(
    			'hook'		=> 'member_member_login_single',
    			'method'	=> 'count',
    			'priority'	=> 10
    		)
            
    	);
    	
        foreach ($hooks AS $hook)
    	{
    		$data = array(
        		'class'		=> __CLASS__,
        		'method'	=> $hook['method'],
        		'hook'		=> $hook['hook'],
        		'settings'	=> '',
        		'priority'	=> $hook['priority'],
        		'version'	=> $this->version,
        		'enabled'	=> 'y'
        	);
            $this->EE->db->insert('extensions', $data);
    	}	

    }
    
    /**
     * Update Extension
     */
    function update_extension($current = '')
    {
    	if ($current == '' OR $current == $this->version)
    	{
    		return FALSE;
    	}
    	
    	if ($current < '2.0')
    	{
    		// Update to version 1.0
    	}
    	
    	$this->EE->db->where('class', __CLASS__);
    	$this->EE->db->update(
    				'extensions', 
    				array('version' => $this->version)
    	);
    }
    
    
    /**
     * Disable Extension
     */
    function disable_extension()
    {
    	$this->EE->db->where('class', __CLASS__);
    	$this->EE->db->delete('extensions');
    }
    
    
    function settings()
    {
        $settings = array();
        
        return $settings;
    }

	
	function count($row)
	{
		$this->EE->db->query("UPDATE exp_members SET login_count=login_count+1 WHERE member_id=".$row->member_id);
	}
	
	  /* END */

}

