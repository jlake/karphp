<?php
class components_dummy_List extends k_Component {
    const PAGE_SIZE = 5;
    const RANGE_SIZE = 10;

    private $_baseUrl = '';
    private $_page = 0;
    private $_pageCount = 0;
    private $_pageItems = array();
    private $_startPage = 1;
    private $_endPage = 1;
    private $_totalItemCount = 0;
    private $_firstItemNumber = 0;
    private $_lastItemNumber = 0;

    private $_filter = '';
    private $_order = '';
    private $_dir = '';

    function execute() {
        $this->_page = $this->query('page', 1);
        $this->_filter = $this->query('filter', '');
        $this->_order = $this->query('order', '');
        $this->_dir = $this->query('dir', '');

        $url = $this->requestUri();
        $url = preg_replace('/([&\?]page=\d+)/i', '', $url);
        $url .= (strpos($url, '?') === FALSE) ? '?' : '&';
        $this->_baseUrl = $url;

        $options = array();
        if(!empty($this->_filter)) {
            $filter = json_decode($this->_filter);
            $options['conditions'] = core_Helper::getConditions($filter);
        }

        $this->_totalItemCount = Dummy::count($options);

        $options['limit'] = $this->query('limit', self::PAGE_SIZE);
        $options['offset'] = $this->query('start', ($this->_page - 1) * $options['limit']);

        if(!empty($this->_order)) {
            $options['order'] = ' ' . $this->_order . ' ' . $this->_dir;
        }
 
        $this->_pageItems = Dummy::all($options);

        $this->_pageCount = ceil($this->_totalItemCount / $options['limit']);
        if($this->_pageCount > self::RANGE_SIZE) {
            $halfRange = floor(self::RANGE_SIZE / 2);
            if($this->_page > ($this->_pageCount - $halfRange)) {
                $this->_startPage = $this->_pageCount - self::RANGE_SIZE;
                $this->_endPage = $this->_pageCount;
            } else {
                $this->_startPage = $this->_page - $halfRange;
                $this->_endPage = $this->_page + $halfRange;
            }
        } else {
            $this->_startPage = 1;
            $this->_endPage = $this->_pageCount;
        }

        $this->_firstItemNumber = $options['offset'] + 1;
        $this->_lastItemNumber = $this->_firstItemNumber + $options['limit'] - 1;
        if($this->_lastItemNumber > $this->_lastItemNumber) {
            $this->_lastItemNumber = $this->_totalItemCount;
        }
        return parent::execute();
    }

    function renderHtml() {
        $t = new k_Template("views/dummy/list.tpl.php");
        return $t->render($this, array(
            'baseUrl' => $this->_baseUrl,
            'page' => $this->_page,
            'pageItems' => $this->_pageItems,
            'pageCount' => $this->_pageCount,
            'startPage' => $this->_startPage,
            'endPage' => $this->_endPage,
            'totalItemCount' => $this->_totalItemCount,
            'firstItemNumber' => $this->_firstItemNumber,
            'lastItemNumber' => $this->_lastItemNumber,
        ));
    }

    function renderJson() {
        return array(
            'pageItems' => $this->_pageItems,
            'totalItemCount' => $this->_totalItemCount
        );
    }
}
