<?php
/**
 * メッセージ共通関数
 * @author ou
 */
class app_Message
{
    public static $msgList = array(
        'E000' => 'パラメータ不正。',
    );

    /**
     * 指定コードからメッセージの取得
     * @param string $code メッセージコード
     * @param string $replaceList メッセージコード
     * @return string
     */
    public static function get($code, $replaceList = array())
    {
        if(isset(self::$msgList[$code])) {
            $msgText = self::$msgList[$code];
            if(!empty($replaceList)) {
                $msgText = self::replace($msgText, $replaceList);
            }
            return $msgText;
        }
        return '';
    }

    /**
     * メッセージの文字列置換処理
     * @param     string  $msgText     メッセージテキスト
     * @param     array  $replaceList  置換文字列の配列
     * @return    string
    */
    public static function replace($msgText, $replaceList = array())
    {
        if(!$msgText) {
            return '';
        }
        foreach($replaceList as $key => $value) {
            $msgText = str_replace('%'.$key. '%', $value, $msgText);
        }
        return $msgText;
    }
}