<?php
/**
 * ログ機能
 * @author ou
 */
class applib_Logger
{
    protected static $_logger = NULL;

    /**
     * ロガーオブエジェクト作成
     *
     * @param string  $logFile ログファイル名
     * @return void
     */
    public static function setLogger($logFile = '')
    {
        $logConfig = applib_Config::get('log');
        $logLevel = (!empty($logConfig) && isset($logConfig['level'])) ? $logConfig['level'] : mylib_Logger::DEBUG;
        self::$_logger = new mylib_Logger(APP_LOGDIR, $logLevel, $logFile);
   }

    /**
     * ログ出力
     *
     * @param string  $msg ログ内容
     * @param string  $level ログレベル
     * @param string  $logFile ログファイル名
     * @return  void
     */
    public static function log($msg, $level=mylib_Logger::INFO, $logFile = '')
    {
        if(self::$_logger == NULL) self::setLogger($logFile);
        if(is_array($msg)) {
            $msg = print_r($msg, 1);
        }
        self::$_logger->log($msg, $level);
    }
}