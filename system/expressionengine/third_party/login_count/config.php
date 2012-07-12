<?php

if ( ! defined('LOGIN_COUNT_ADDON_NAME'))
{
	define('LOGIN_COUNT_ADDON_NAME',         'Login Count');
	define('LOGIN_COUNT_ADDON_VERSION',      '0.1.0');
}

$config['name']=LOGIN_COUNT_ADDON_NAME;
$config['version']=LOGIN_COUNT_ADDON_VERSION;

$config['nsm_addon_updater']['versions_xml']='http://www.intoeetive.com/index.php/update.rss/141';