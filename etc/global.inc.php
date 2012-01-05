<?php
error_reporting(E_ALL | E_STRICT);

defined('APP_ENV')
    || define('APP_ENV', (getenv('APP_ENV') ? getenv('APP_ENV') : 'production'));

defined('APP_ROOT')
    || define('APP_ROOT', realpath(dirname(__FILE__) . '/..'));

defined('APP_BASEURL')
    || define('APP_BASEURL',  '/');

defined('APP_LOGDIR')
    || define('APP_LOGDIR', APP_ROOT . '/var/log');

defined('APP_CACHEDIR')
    || define('APP_CACHEDIR',  APP_ROOT . '/var/cache');

set_include_path(implode(PATH_SEPARATOR, array(
    APP_ROOT.'/lib',
    APP_ROOT.'/app',
    get_include_path()
)));

require_once 'konstrukt/konstrukt.inc.php';
require_once('orm/ActiveRecord.php');
set_error_handler('k_exceptions_error_handler');
spl_autoload_register('k_autoload');
date_default_timezone_set('Asia/Tokyo');

ActiveRecord\Config::initialize(function($cfg) {
    $cfg->set_model_directory(APP_ROOT.'/app/models/orm');
    $cfg->set_connections(array(
        'development' => 'mysql://karuser:karpass@localhost/karphp;charset=utf8',
        'production' => 'mysql://karuser:karpass@localhost/karphp;charset=utf8',
    ));
    $cfg->set_default_connection(APP_ENV);
});
ActiveRecord\DateTime::$DEFAULT_FORMAT = 'Y-m-d H:i:s';
