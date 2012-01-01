<?php
/**
 * アクセス機能
 * @author ou
 */
class app_Access
{
    protected static $_db = NULL;

    /**
     * DB接続設定
     *
     * @return void
     */
    public static function setDb()
    {
        $db = app_Config::get('db');
        mylib_Db::setConnectionInfo($db['dbname'], $db['username'], $db['password'],  $db['database'],  $db['host'],  $db['charset']);
    }

    /**
     * アクセス履歴追加
     *
     * @param string $accessInfo  アクセス情報配列
     * @return mixed
     */
    public static function saveHistory($accessInfo)
    {
        if(self::$_db == NULL) self::setDb();
        return mylib_Db::saveData('access_history', $accessInfo);
    }
}