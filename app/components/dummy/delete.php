<?php
class components_dummy_Delete extends k_Component {

    private $_data = '';

    function GET() {
        $id = $this->query('id', '');

        $this->_data = Dummy::find($id);
        return parent::GET();
    }

    function POST() {
        $id = $this->body('id');

        $data = Dummy::find($id);
        if(!empty($data)) {
            $data->delete();
        }
        return new k_SeeOther($this->url('../list'));
    }

    function renderHtml() {
        $t = new k_Template("views/dummy/delete.tpl.php");
        return $t->render($this, array(
            'data' => $this->_data,
        ));
    }
}
