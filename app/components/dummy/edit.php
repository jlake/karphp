<?php
class components_dummy_Edit extends k_Component {
    private $_data = '';

    function GET() {
        $id = $this->query('id', '');

        $this->_data = Dummy::find($id);
        return parent::GET();
    }

    function POST() {
        $id = $this->body('id');

        $data = Dummy::find($id);
        if(empty($data)) {
            $data->id = $id;
        }
        $data->inf1 = $this->body('inf1');
        $data->inf2 = $this->body('inf2');
        $data->set_nm = $this->body('set_nm');
        $data->save();
        return new k_SeeOther($this->url('../list'));
    }

    function renderHtml() {
        $t = new k_Template("views/dummy/edit.tpl.php");
        return $t->render($this, array(
            'data' => $this->_data,
        ));
    }
}
