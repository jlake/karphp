<?php
//ユーザ処理TOP
class components_user_Top extends k_Component {
    protected function map($name) {
        switch ($name) {
            case 'regist':
                return 'components_user_Regist';
            default:
                return 'components_user_Top';
        }
    }

    function execute() {
        return parent::execute();
    }

    function renderHtml() {
        $t = new k_Template("views/user/top.tpl.php");
        return $t->render($this);
    }
}
