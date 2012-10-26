<?php
ini_set('max_execution_time', '0');

require_once __DIR__.'/../etc/global.inc.php';

/**
 * バッチログ出力
 *
 * @param string  $msg ログ内容
 * @param string  $level ログレベル
 * @return  void
 */
function batch_log($msg, $level=mylib_Logger::INFO)
{
  $logFile = 'batch_' . date('Ymd') . '.log';
  applib_Logger::log($msg, $level, $logFile);
}