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
        self::$config['production'] = array(
            'dsn' => 'mysql://karuser:karpass@localhost/karphp;charset=utf8',
            'log' => array(
                'level' => mylib_Logger::INFO,
            ),
        );
        // 開発環境
        self::$config['development'] = array(
            'dsn' => 'mysql://karuser:karpass@localhost/karphp;charset=utf8',
            'log' => array(
                'level' => mylib_Logger::DEBUG,
            ),
        );
    }

    public static function get($id, $env = APP_ENV)
    {
        if(empty(self::$config)) {
            self::init();
        }
        return isset(self::$config[$env][$id]) ? self::$config[$env][$id] : NULL;
    }
}

