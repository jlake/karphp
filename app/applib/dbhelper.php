<?php
/**
 * DB用共通関数
 * @author ou
 */
class applib_DbHelper
{
    /**
     * SQL検索条件取得
     * @return string
     */
    public static function getSelectConditions($kvArr, $andOr = 'AND')
    {
        $conditons = array('');
        $prefix = '';
        foreach($kvArr as $k => $v) {
            $conditons[0] .= $prefix . " $k=" . (is_array($v) ? '(?)' : '?');
            $conditons[] = $v;
            $prefix = $andOr;
        }
        return $conditons;
    }
}