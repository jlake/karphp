<?php
/**
 * App内共通関数
 * @author ou
 */
class app_Util
{
    /**
     * ヘッダからリモートIPアドレスの取得
     * @return string
     */
    public static function getRemoteAddr()
    {
        return $_SERVER['REMOTE_ADDR'];
    }


    /**
     * SQL検索条件取得
     * @return string
     */
    public static function getConditions($kvArr, $andOr = 'AND')
    {
        $condExpr = array();
        $condValues = array();
        foreach($kvArr as $k => $v) {
            $condExpr[] = $k . '=' . (is_array($v) ? '(?)' : '?';
            $condValues[] = $v;
        }
        return array(
	        'expr' => '(' . implode(" $andOr ", $condExpr) . ')',
	    	'values' => $condValues
	    );
    }
}