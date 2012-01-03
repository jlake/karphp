<?php
//ユーザ登録処理TOP
class components_user_Regist extends k_Component {
    function execute() {
        $name = $this->body('name', '');
        $email = $this->body('email', '');
        if(empty($this->_userInfo['name'])) {
            return new k_ErrorResponse('ユーザ名を入力してください。');
        }
        if(empty($this->_userInfo['email'])) {
            return new k_ErrorResponse('メルアドレスを入力してください。');
        }
        $user = User::create();
        $user->name = $name;
        $user->email = $email;
        $user->save();
        return parent::execute();
    }

    function postForm() {
        return $this->render();
    }

    function renderHtml() {
        $t = new k_Template('views/user/regist.tpl.php');
        return $t->render($this, array(
            'userInfo' => $this->_userInfo
        ));
    }
}
