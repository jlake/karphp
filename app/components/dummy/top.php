<?php
class components_dummy_Top extends k_Component {
    protected function map($name) {
        switch ($name) {
            case 'hello':
                return 'components_dummy_Hello';
            case 'list':
                return 'components_dummy_List';
            case 'detail':
                return 'components_dummy_Detail';
            case 'info':
                return 'components_dummy_Info';
            case 'test':
                return 'components_dummy_Test';
            default:
                return 'components_dummy_Top';
        }
    }

    function execute() {
        core_Session::set('test', array('msg' => 'セッションテスト1です'));
        //$this->session()->set('test', array('msg' => 'セッションテスト2です'));
        return parent::execute();
    }

    function renderHtml() {
        $t = new k_Template("templates/dummy/top.tpl.php");
        return $t->render($this);
    }
}
