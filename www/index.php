<?php
require_once '../etc/global.inc.php';

k()->setComponentCreator(new k_DefaultComponentCreator())
  // Enable file logging
  //->setLog(APP_LOGDIR . '/debug.log')  // log ファイルに DEBUG 情報を出力
  //->setDebug()    // ブラザー内 DEBUG 情報を表示
  ->run('components_Root')
  ->out();
