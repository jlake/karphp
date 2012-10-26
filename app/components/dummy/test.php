<?php
class components_dummy_Test extends k_Component {
    private $_msg = '';
    private $_error = '';

    function execute() {
        applib_Logger::log('log message from components_dummy_Hello', mylib_Logger::INFO);
        $cache = new mylib_Filecache( APP_CACHEDIR );
        $key = 'cache_test';
        $dateTime = '';
        if($this->query('clearcache')) {
            $result = $cache->clear($key);
        } else {
            $dateTime = $cache->get($key);
        }
        if(empty($dateTime)) {
            $dateTime = date('Y-m-d H:i:s');
            $cache->set($key, $dateTime);
        }
        $this->_msg = 'Cache start at：'.$dateTime;
        $this->_error = $cache->getLastError();
        return parent::execute();
    }

    function renderHtml() {
        $t = new k_Template("views/dummy/test.tpl.php");
        $test = applib_Session::get('test');
        //$test = $this->session()->get('test');
        return $t->render($this, array(
            'msg' => $this->_msg . ' isMobile: ' . (mylib_UserAgent::isMobile() ? 'true' : 'false'),
            'test' => print_r($test, 1),
            'error' => $this->_error
        ));
    }
}
