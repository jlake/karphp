<?php
class components_dummy_Test extends k_Component {
    function render() {
        applib_Logger::log('components_dummy_Test');
        $dummy = Dummy::find(1);
        $data = array(
            'id' => $dummy->id,
            'inf1' => $dummy->inf1,
            'inf2' => $dummy->inf2,
        );

        return new k_PlainTextResponse($data);
    }
}
