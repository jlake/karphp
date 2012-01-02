<?php
class components_Root extends k_Component {
    protected $_layout = 'templates/layout_default.tpl.php';

    protected function map($name) {
        switch ($name) {
            case 'user':
                return 'components_user_Top';
            case 'play':
                return 'components_play_Top';
            case 'dummy':
                return 'components_dummy_Top';
        }
    }

    function execute() {
        return $this->wrap(parent::execute());
    }

    function wrapHtml($content) {
        $t = new k_Template($this->_layout);
        $this->document->setTitle(core_Const::APP_NAME);
        return $t->render(
            $this,
            array(
                'content' => $content,
                'title' => $this->document->title(),
                'scripts' => $this->document->scripts(),
                'styles' => $this->document->styles(),
                'onload' => $this->document->onload(),
                'userInfo' => core_Session::getUserInfo()
            )
        );
    }

    function renderHtml() {
        $t = new k_Template("templates/root.tpl.php");
        return $t->render($this);
    }
}
