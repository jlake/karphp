<?php
class components_dummy_Add extends k_Component {
    private $_data = '';

    function POST() {
        $data = new Dummy();

        $data->inf1 = $this->body('inf1');
        $data->inf2 = $this->body('inf2');
        $data->set_nm = $this->body('set_nm');
        $data->save();

        return new k_SeeOther($this->url('../list'));
    }

    function renderHtml() {
        $t = new k_Template("views/dummy/add.tpl.php");
        return $t->render($this, array(
            'data' => $this->_data,
        ));
    }
}
