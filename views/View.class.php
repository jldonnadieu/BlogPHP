<?php
class View{
	private $page;
	private $params;
	public function __construct($page,$params){
		$this->page = $page;
		$this->params = $params;
	}
	public function render(){
		//var_dump($this->params);
		foreach ($this->params as $key => $value){
			$$key = $value;
		}
		include "views/".$this->page.".view.php";
	}
}