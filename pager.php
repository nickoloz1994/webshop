<?php

class Pager{

	public $itemsPerPage;
	public $total;
	public $pages;
	public $currentPage;
	private $_navigation;
	private $_link;
	private $_pageHtml;
	
	function __construct()
	{
		$this->itemsPerPage = 6;
		$this->total = 0;
		$this->pages = 0;
		$this->currentPage = 1;
		$this->_navigation = array('next'=>'Next','pre'=>'Previous');
		$this->_link = filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_STRING);
		$this->_pageHtml = '';
	}

	public function paginate(){
		if (isset($_GET['page'])) {
			$this->currentPage = $_GET['page'];
		}
		$this->_pageHtml = $this->_getPageHtml();
	}

	public function pageNumbers(){
		
		return $this->_pageHtml;
	}

	private function _getPageHtml(){
		$html = '<ul class="pagination">';

		if ($this->currentPage > 1) {
			$html .= '<li><a href="'.$this->_link.'?page='.($this->currentPage-1).'"';
			$html .= '>'.$this->_navigation['pre'].'</a></li>';
		}

		for($i=1; $i<=ceil($this->total/$this->itemsPerPage); $i++){
			$class = ($this->currentPage == $i) ? "active" : "";
			$html .= '<li class="'.$class.'"><a href="'.$this->_link.'?page='.$i.'"';
			$html .= '>'.$i.'</a></li>';
		}

		if ($this->currentPage < $this->pages) {
			$html .= '<li><a href="'.$this->_link.'?page='.($this->currentPage+1).'"';
			$html .= '>'.$this->_navigation['next'].'</a></li>';
		}

		$html .= '</ul>';
		return $html;
	}

}

?>