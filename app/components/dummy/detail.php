<?php
class components_dummy_Detail extends k_Component {
    const PAGE_SIZE = 5;
    const RANGE_SIZE = 10;

    private $_detail = '';

    function execute() {
        $id = $this->query('id', '');

        $this->_detail = Dummy::find($id);
        return parent::execute();
    }

    function renderHtml() {
        $t = new k_Template("views/dummy/detail.tpl.php");
        return $t->render($this, array(
            'detail' => $this->_detail,
        ));
    }

    function renderJson() {
        return array(
            'detail' => $this->_detail,
        );
    }
}
