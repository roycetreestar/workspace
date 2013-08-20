<?php
/* ==========================================================
 * Fluorish v1.0
 * index.php
 *
 * http://www.Fluorish.com
 * Copyright Fluorish, Inc.
 *
 * Built exclusively for Fluorish by Royce Cano
 * ========================================================== */

defined('APP_NAME') || define('APP_NAME', 'Fluorish');
defined('APP_VERSION') || define('APP_VERSION', 'v1.0');

/*
 * Config
 */

// Current / dashboard page
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// relative path to theme common resources (styles/images/etc)
// used for generating the final download package
// $_ROOT = "../../../../common/";
$_ROOT = "../common/";

// development / production
defined('DEV') || define('DEV', true);

// used to determine what resources to use in final package
defined('DEMO') || define('DEMO', false);

// toggle google analytics code in head section
defined('GA') || define('GA', false);

// default level / used for getURL paths (should't be modified)
defined('LEVEL') || define('LEVEL', 0);

// allow skin customization from the browser
defined('SKIN_JS') || define('SKIN_JS', false);

// 'fixed' or 'fluid'
defined('LAYOUT_TYPE') || define('LAYOUT_TYPE', ($page == 'landing_page' ? 'fluid' : (isset($_GET['layout_type']) ? $_GET['layout_type'] : 'fixed')));

// MAIN stylesheet
defined('STYLE') || define('STYLE', isset($_GET['style']) ? $_GET['style'] : 'style');

// filename without extension (eg. "brown") or false for default
defined('SKIN_CUSTOM') || define('SKIN_CUSTOM', false);

// edit SKIN_CUSTOM above
defined('SKIN') || define('SKIN', SKIN_JS ? false : SKIN_CUSTOM);

/*
 * Functions
 */

require_once 'functions.php';

/*
 * Colors
 */

$primaryColor = "#4a8bc2";
$dangerColor = "#b55151";
$successColor = "#609450";
$warningColor = "#ab7a4b";
$inverseColor = "#45484d";

/*
 * Pages
 */

switch ($page)
{
	default: 
		$page = 'error';
		
		// header
		require_once 'pages/header.php';
		
		// content
		require_once 'pages/error.php';
		break;
		
	case 'dashboard':
	case 'membership':
	case 'core_membership':
	case 'lab_membership':
	case 'my_account':
	case 'instruments':
	
		// header
		require_once 'pages/header.php';
		
		// content
		if (file_exists('pages/' . $page . '.php')) require_once 'pages/' . $page . '.php';
		break;
	
}

/*
 * Footer
 */

require_once 'pages/footer.php';