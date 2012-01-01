<?php
/**
 * アプリケーション設定
 * @author ou
 */
class app_Config
{
    public static function get($id)
    {
        // 本番(default)
        $configs = array(
            'log' => array(
                'level' => mylib_Logger::INFO,
            ),
        );
        // 開発環境
        if(APP_ENV == 'development') {
            $configs['log'] = array(
                'level' => mylib_Logger::DEBUG,
            );
        }
        if(isset($configs[$id])) {
            return $configs[$id];
        }
        return array();
    }
}

