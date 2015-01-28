<?php
class Article{
	private $id;
	private $title;
	private $content;
	private $creationDate;
	private $modificationDate;
	private $visible;

	/**
	 * Constructeur d'un nouvel article dont l'id est inconnu
	 * @param unknown_type $title
	 * @param unknown_type $content
	 */
	public function getTitle(){
		return $this->title;
	}
	public function getModificationDate(){
		return $this->modificationDate;
	}
	public function getCreationDate(){
		return $this->creationDate;
	}
	public function getVisible(){
		return $this->visible;
	}
	public function setVisible($visible){
		$this->visible=$visible;
	}
	public function setTitle($title){
		$this->title=$title;
	}
	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getContent(){
		return $this->content;
	}
	public function setContent($content){
		$this->content=$content;
	}
	public function setCreationDate($date){
		$this->creationDate=$date;
	}
	public function setModificationDate($date){
		$this->modificationDate=$date;
	}
}
