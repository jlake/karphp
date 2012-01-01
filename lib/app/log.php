<?php
/**
 * ログ機能
 * @author ou
 */
class app_Log
{
    protected static $_logger = NULL;

    /**
     * ロガーオブエジェクト作成
     *
     * @return void
     */
    public static function setLogger()
    {
        $logConfig = app_Config::get('log');
        $logLevel = (!empty($logConfig) && isset($logConfig['level'])) ? $logConfig['level'] : mylib_Logger::DEBUG;
        self::$_logger = new mylib_Logger(APP_LOGDIR, $logLevel);
   }

    /**
     * ログ出力
     *
     * @param string  $msg ログ内容
     * @param string  $level Logのレベル
     * @return  void
     */
    public static function log($msg, $level=mylib_Logger::INFO)
    {
        if(self::$_logger == NULL) self::setLogger();
        if(is_array($msg)) {
            $msg = print_r($msg, 1);
        }
        self::$_logger->log($msg, $level);
    }
}