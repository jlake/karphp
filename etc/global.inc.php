<?php
error_reporting(E_ALL | E_STRICT);
session_start();

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

defined('FQDN')
    || define('FQDN', $_SERVER['SERVER_NAME']);

set_include_path(implode(PATH_SEPARATOR, array(
    APP_ROOT.'/lib',
    get_include_path()
)));

require_once 'konstrukt/konstrukt.inc.php';
require_once('orm/ActiveRecord.php');
set_error_handler('k_exceptions_error_handler');
spl_autoload_register('k_autoload');
date_default_timezone_set('Asia/Tokyo');

class k_PlainTextResponse extends k_BaseResponse {
    function contentType() {
        return 'text/plain';
    }
    function toContentType($content_type) {
        if(is_array($this->content)) {
            $content = '';
            foreach($this->content as $k => $v) {
                $content .= $k.'='.$v."\r\n";
            }
            return $content;
        }
        return $this->content;
    }
}

class k_ErrorResponse extends k_BaseResponse {
    function contentType() {
        return 'text/html';
    }
    function toContentType($content_type) {
        return '<div class="errortitle">エラー</div>'
            . '<div class="textblock">'
            . $this->content
            . '</div>';
    }
}

ActiveRecord\Config::initialize(function($cfg) {
    $cfg->set_model_directory(APP_ROOT.'/models');
    $cfg->set_connections(array(
        'development' => 'mysql://mysql:mysql@localhost/dummy',
        'production' => 'mysql://mysql:mysql@localhost/dummy',
    ));
    $cfg->set_default_connection(APP_ENV);
});
