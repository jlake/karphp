<?php
/**
 * batch common 
 *
 */
ini_set('max_execution_time', '0');

defined('APP_ENV')
    || define('APP_ENV', 'production');

defined('APP_ROOT')
    || define('APP_ROOT', realpath(dirname(__FILE__).'/..'));

defined('APP_LOGDIR')
    || define('APP_LOGDIR', APP_ROOT . '/var/log');

set_include_path(implode(PATH_SEPARATOR, array(
    APP_ROOT.'/lib',
    get_include_path()
)));

spl_autoload_register('k_autoload');

/**
 * Resolves a filename according to the includepath.
 * Returns on the first match or false if no match is found.
 */
function k_search_include_path($filename) {
  if (is_file($filename)) {
    return $filename;
  }
  foreach (explode(PATH_SEPARATOR, ini_get("include_path")) as $path) {
    if (strlen($path) > 0 && $path{strlen($path)-1} != DIRECTORY_SEPARATOR) {
      $path .= DIRECTORY_SEPARATOR;
    }
    $f = realpath($path . $filename);
    if ($f && is_file($f)) {
      return $f;
    }
  }
  return false;
}

/**
 * A simple autoloader.
 */
function k_autoload($classname) {
  $filename = str_replace('_', '/', strtolower($classname)).'.php';
  if (k_search_include_path($filename)) {
    require_once($filename);
  }
}
