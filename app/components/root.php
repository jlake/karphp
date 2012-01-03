<?php
class components_Root extends k_Component {
    protected $_layout = 'views/layout_default.tpl.php';
    protected $_active = '';

    protected function map($name) {
        $this->_active = $name;
        switch ($name) {
            case 'user':
                return 'components_user_Top';
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
                'active' => $this->_active,
                'userInfo' => core_Session::getUserInfo()
            )
        );
    }

    function renderHtml() {
        $t = new k_Template("views/root.tpl.php");
        return $t->render($this);
    }
}
