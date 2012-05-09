<?php
/**
 * アプリケーション設定
 * @author ou
 */
class applib_Config
{
    public static $config;

    public static function init()
    {
        // 本番(default)
        self::$config = array(
            'log' => array(
                'level' => mylib_Logger::INFO,
            ),
        );
        // 開発環境
        if(APP_ENV == 'development') {
            self::$config['log'] = array(
                'level' => mylib_Logger::DEBUG,
            );
        }
    }

    public static function get($id)
    {
        if(empty(self::$config)) {
            self::init();
        }
        return isset(self::$config[$id]) ? self::$config[$id] : null;
    }
}

