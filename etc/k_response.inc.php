<?php
class k_PlainTextResponse extends k_BaseResponse {
    function contentType() {
        return 'text/plain';
    }
    function toContentType($content_type) {
        if(is_array($this->content)) {
            $content = '';
            foreach($this->content as $k => $v) {
                $content .= $k.'='.$v."\r\n";
            }
            return $content;
        }
        return $this->content;
    }
}

class k_ErrorResponse extends k_BaseResponse {
    function contentType() {
        return 'text/html';
    }
    function toContentType($content_type) {
        return '<div class="errortitle">エラー</div>'
            . '<div class="textblock">'
            . $this->content
            . '</div>';
    }
}