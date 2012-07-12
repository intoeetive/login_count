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
 File: mcp.login_count.php
-----------------------------------------------------
 Purpose: Count and display number of logins
=====================================================
*/

if ( ! defined('BASEPATH'))
{
    exit('Invalid file request');
}

require_once PATH_THIRD.'login_count/config.php';

class Login_count_mcp {

    var $version = LOGIN_COUNT_ADDON_VERSION;
    
    var $settings = array();
    
    var $docs_url = "https://github.com/intoeetive/login_count/README";
    
    function __construct() { 
        // Make a local reference to the ExpressionEngine super object 
        $this->EE =& get_instance(); 
    } 
    
    function index()
    {
  
    }


}
/* END */
?>