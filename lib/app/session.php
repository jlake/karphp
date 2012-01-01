<?php
/**
 * セッション機能
 * @author ou
 */
class app_Session
{
    /**
     * セッションIDを取得
     *
     * @return string
     */
    public static function getId()
    {
        return session_id();
    }

    /**
     * 指定キーのセッション内容を取得
     *
     * @param string $key  キー
     * @param mixed $default  デフォールトバリュー
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    /**
     * 指定キーのセッション内容をセット
     *
     * @param string $key  キー
     * @param mixed $value  バリュー
     * @return void
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * 指定キーのセッション内容を削除
     *
     * @param string $key  キー
     * @return void
     */
    public static function delete($key)
    {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
    * セッション終了
    */
    public static function destory() {
        $_SESSION = array();
        return session_destroy();
    }

    /**
     * ユーザ情報を取得
     *
     * @return mixed
     */
    public static function getUserInfo()
    {
        return self::get('userInfo');
    }

    /**
     * ユーザ情報設定
     *
     * @param array $userInfo  ユーザ情報
     * @return void
     */
    public static function setUserInfo($userInfo)
    {
        self::set('userInfo', $userInfo);
    }

    /**
     * ユーザ情報削除
     *
     * @return void
     */
    public static function deleteUserInfo()
    {
        self::delete('userInfo');
    }

    /**
     * ユーザ情報追加
     *
     * @param array $infoList  ユーザ情報
     * @return void
     */
    public static function appendUserInfo($info)
    {
        if(!is_array($info)) {
            return;
        }
        $userInfo = self::get('userInfo', array());
        $userInfo = array_merge($userInfo, $info);
        self::set('userInfo', $userInfo);
    }

    /**
     * ユーザIDを取得
     *
     * @return mixed
     */
    public static function getUserId()
    {
        $userInfo = self::get('userInfo');
        if(!empty($userInfo) && isset($userInfo['user_id'])) {
            return $userInfo['user_id'];
        }
        return '';
    }

    /**
     * ログインチェック
     *
     * @param object $context  コンテキストオブジェクト
     * @return void
     */
    public static function checkLogin($context)
    {
        $userInfo = self::getUserInfo();
        //app_Log::log("checkLogin userInfo=".print_r($userInfo, 1), mylib_Logger::DEBUG);
        if(empty($userInfo)) {
            /*
            if(isset($_SERVER['HTTP_REFERER'])) {
                self::set('httpReferer', $_SERVER['HTTP_REFERER']);
            }
            */
            self::set('requestUri', $context->requestUri());
            return new k_TemporaryRedirect(APP_BASEURL.'/auth/login');
        }
        return NULL;
    }
}