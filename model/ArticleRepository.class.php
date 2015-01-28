<?php
Class ArticleRepository{
	private $pdo;
	public function __construct(PDO &$pdo){
		$this->pdo=$pdo;
	}
	/**
	 * Liste de tous les articles
	 * @return multitype: tableau resultat du contenu de la base
	 */
	public function getAll(){
		//$localPdo = Article::getDbConnexion();
		$SQL = "SELECt * FROM article";
		try {
			$req = $this->pdo->query($SQL);
			$list = $req->fetchAll();
		}catch (Exception $e){
			echo 'erreur de lecture';
		}
		$req->closeCursor();
		return $list;
	}

	/**
	 *
	 * @param unknown_type $id : integer, id of an article to get
	 * @return Article
	 */
	public function get($id){
		$SQL = "SELECT * FROM article WHERE id=?;";
		$req = $this->pdo->prepare($SQL);
		/*PDOStatement::setFetchMode(PDO::FETCH_CLASS,"article");*/
		$params = array($id);
		try {
			$req->execute($params);
			$article = $req->fetch();
		}catch (Exception $e){
			echo 'erreur insertion';
		}
		/*$query->setFetchMode();*/
		/*PDOStatement::setFetchMode(PDO::FETCH_CLASS,"article");*/
		$returnedArticle = new Article();
		$returnedArticle->setId($id);
		$returnedArticle->setTitle($article['title']);
		$returnedArticle->setContent($article['content']);
		$returnedArticle->setVisible($article['visible']);
		$returnedArticle->setModificationDate($article['modificationDate']);
		$returnedArticle->setCreationDate($article['creationDate']);
		return $returnedArticle;
		//return $article;
	}

	public function persist(Article $article){
		//$localPdo = Article::getDbConnexion();
		$visible=$article->getVisible()==0 ? 'False' : 'True';
		if ($article->getId()<0){
			$SQL = "INSERT INTO article(title,content,creationDate,modificationDate,visible) VALUES(?,?,?,?,False);";
			$req = $this->pdo->prepare($SQL);
			$params = array( $article->getTitle(),$article->getContent(),$article->getCreationDate(),$article->getModificationDate());
			//$SQL = "INSERT INTO article(titre,contenu,creationDate,modificationDate,visible) VALUES('".$article->getTitle()."','".$article->getContent()."','";
			//$SQL .= $article->getCreationDate()."','".$article->getModificationDate()."',FALSE);";
		} else {
			//$article->setModificationDate(date('c'));
			$this->modificationDate = date('Y-m-d H:i:s');
			$article->setModificationDate(date('Y-m-d H:i:s'));
			$SQL = "UPDATE article SET title=? , content=? , modificationDate=? , visible=? WHERE id=?;";
			//$SQL = "UPDATE article SET titre=? , contenu=? , visible=? WHERE id=?;";
			$req = $this->pdo->prepare($SQL);
			//$SQL = "";
			$params = array($article->getTitle(),$article->getContent(),$article->getModificationDate(),$article->getVisible(),$article->getId());
					
		}
		$retour = print_r($params,True);
		$retour .= $SQL;
		try {
			$req->execute($params);
			//$this->pdo->query($SQL);
			$retour = "Article modifié";
		}catch (Exception $e){
			$retour .= ' - erreur insertion '. $e->getMessage();
		}
		return $retour;


	}
	public function remove(Article $article){
		//$localPdo = Article::getDbConnexion();
		$SQL = "DELETE FROM article WHERE id=?";
		$req = $this->pdo->prepare($SQL);
		$params = array($article->getId());
		try {
			$req->execute($params);
		}catch (Exception $e){
			echo 'erreur suppression';
		}
		return $SQL;

	}
}
