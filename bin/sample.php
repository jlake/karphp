<?php
/**
 * 日時送信処理バッチ
 *
 * @author ou 2011/12/15
 */

require_once '_common.php'; 

class Batch_Sample
{
    /*
     * 初期化
     */
    protected function _contruct() {
    }


    /**
     * バッチ実行メッソド
     */
    public function run() {
        try {
            //TO-DO
        } catch(Exception $e) {
            $errMsg = $e->getMessage();
            app_Log::log($errMsg, mylib_Logger::ERR);
        }
    }
}


$batch = new Batch_Sample();
$batch->run();
