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
     * コンストラクタ
     */
    public function __construct()
    {
    }


    /**
     * バッチ実行メッソド
     */
    public function run()
    {
        try {
            //TO-DO
            $dummy = Dummy::find(1);
            echo $dummy->inf1;
            echo "\n";
        } catch(Exception $e) {
            $errMsg = $e->getMessage();
            core_Log::log($errMsg, mylib_Logger::ERR);
        }
    }
}


$batch = new Batch_Sample();
$batch->run();
