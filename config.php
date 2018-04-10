<?php

/* CORE CONFIG */
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)).DS);
define('FRAMEWORK_FOLDER', 'Particle');
define('CORE_FOLDER', 'Core');
define('PARTICLE_PATH', ROOT.FRAMEWORK_FOLDER.DS);
define('PARTICLE_PATH_CORE', PARTICLE_PATH.CORE_FOLDER.DS);
define('APPS_FOLDER', 'Apps');
define('PARTICLE_PATH_APPS', PARTICLE_PATH.APPS_FOLDER.DS);

/* ROUTING */
define('DEFAULT_ROUTING', true);
define('MAPPING_ROUTING', false);
define('STRICT_ROUTING', false);

/* CACHE TPL AND OUTPUT BUFFER */
define('CACHE_TPL', false);
define('CACHE_TPL_TIME', 3600); // seconds
define('CACHE_TPL_LIMIT_MB', 1);
define('DEBUG_MODE', false);
define('OUTPUT_CONTROL', false);

/* CACHE DB FILE */
define('CACHE_DB', false);
define('CACHE_DB_TIME', 3600); // seconds
define('CACHE_DB_PATH', false); // false is default  - sys_get_temp_dir();

define('APPS_SETTINGS_PATH', PARTICLE_PATH_APPS.'Settings'.DS);

// Load configs Apps
require_once APPS_SETTINGS_PATH.'global.inc.php';
require_once APPS_SETTINGS_PATH.'database.inc.php';