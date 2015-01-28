<?php
abstract class Controller{
	protected $_model;
	public function redirect($page,$params){
		$url="?page=$page";
		foreach ($params as $key=>$value){
			$url.="&$key=$value";
		}
		header('Location: '.$url);
	}
	public function renderView($page,$params){
		$view = new View($page,$params);
		$view->render();
	}
	public function __construct($repository){
		$this->_model = $repository;
	}
}