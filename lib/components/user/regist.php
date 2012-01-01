<?php
//ユーザ登録処理TOP
class components_user_Regist extends k_Component {
    private $_mobageId;
    private $_userName;

    function execute() {
        $this->_mobageId = $this->body('mobage_id', '.');
        $this->_userName = $this->body('user_nm', '.');
        if(empty($this->_mobageId)) {
            return new k_ErrorResponse('モバゲIDを入力してください。');
        }
        if(empty($this->_userName)) {
            return new k_ErrorResponse('お名前を入力してください。');
        }
        $userInfo = array(
            'mobage_id' => $this->_mobageId,
            'user_nm' => $this->_userName,
        );
        $key = array(
            'mobage_id' => $this->_mobageId,
        );
        app_User::saveUserInfo($userInfo, $key);
        return parent::execute();
    }

    function postForm() {
        return $this->render();
    }

    function renderHtml() {
        $t = new k_Template('templates/user/regist.tpl.php');
        return $t->render($this, array(
            'url' => "mailto:mobage@mkit.hlsys.net?subject=mobageID:".$this->_mobageId
        ));
    }
}
