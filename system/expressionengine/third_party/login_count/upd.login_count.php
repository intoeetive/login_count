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
 File: upd.login_count.php
-----------------------------------------------------
 Purpose: Count and display number of logins
=====================================================
*/

if ( ! defined('BASEPATH'))
{
    exit('Invalid file request');
}

require_once PATH_THIRD.'login_count/config.php';

class Login_count_upd {

    var $version = LOGIN_COUNT_ADDON_VERSION;
    
    function __construct() { 
        // Make a local reference to the ExpressionEngine super object 
        $this->EE =& get_instance(); 
    } 
    
    function install() { 

        $data = array( 'module_name' => 'Login_count' , 'module_version' => $this->version, 'has_cp_backend' => 'n'); 
        $this->EE->db->insert('modules', $data); 
        
        $this->EE->db->query("ALTER TABLE `exp_members` ADD  `login_count` INT NOT NULL DEFAULT 0");
        
        return TRUE; 
        
    } 
    
    function uninstall() { 

        $this->EE->db->select('module_id'); 
        $query = $this->EE->db->get_where('modules', array('module_name' => 'Login_count')); 
        
        $this->EE->db->where('module_id', $query->row('module_id')); 
        $this->EE->db->delete('module_member_groups'); 
        
        $this->EE->db->where('module_name', 'Login_count'); 
        $this->EE->db->delete('modules'); 
        
        $this->EE->db->where('class', 'Login_count'); 
        $this->EE->db->delete('actions'); 
        
        $this->EE->db->query("ALTER TABLE `exp_members` DROP `login_count`");
        
        return TRUE; 
    } 
    
    function update($current='') { 
        if ($current < 2.0) { 
            // Do your 2.0 version update queries 
        } if ($current < 3.0) { 
            // Do your 3.0 v. update queries 
        } 
        return TRUE; 
    } 
	

}
/* END */
?>