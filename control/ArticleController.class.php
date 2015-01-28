<?php
/* classe parente */
include 'control/Controller.class.php';
/* classe utilisée */
include 'views/View.class.php';

class ArticleController extends Controller{
	private $page;
	public function home(){		
		$this->renderView('header',Array('pageTitle'=>'Accueil'));
		$this->renderView('home',Array('listArticles'=>$this->_model->getAll()));
	}
	
	public function listArticles(){		
		$this->renderView('header',Array('pageTitle'=>'Liste des articles'));
		$this->renderView('listArticles',Array('listArticles'=>$this->_model->getAll()));
	}
	public function read(){
		$this->renderView('header',Array('pageTitle'=>'Détails d\'un article'));
		if (isset($_GET['id'])){
			$id = $_GET['id'];
		} else {
			if (isset($_POST['id'])){
				$id = $_POST['id'];
			} else {
				$id = 0;
			}
		}
		$this->renderView('read',Array('articleToDetail'=>$this->_model->get($id)));
	}
	public function edit(){
		if (isset($_GET['id'])){
			/* mode edition d'un article */
			$this->renderView('header',Array('pageTitle'=>'Modification d\'un article'));
			$this->renderView('edit', Array('article'=>$this->_model->get($_GET['id'])));
				
		} else {
			/* nouveau ou validation */
			if (isset($_POST['id'])){
				/* validation */
				//var_dump($_POST);
				$id=$_POST['id'];
				if ($id>=0){
					/* modification */
					$article=$this->_model->get($id);
					$article->setTitle($_POST['title']);
					$article->setContent($_POST['comment']);
					$article->setModificationDate(date('Y-m-d H:i:s'));
					if ($_POST['visible']=='on'){
						$article->setVisible(1);
					} else {
						$article->setVisible(0);
					}
					$this->redirect('listArticles',Array('msg'=>urlencode($this->_model->persist($article))));
				} else {
					$article = new Article();
					$article->setId($id);
					$article->setTitle($_POST['title']);
					$article->setContent($_POST['comment']);
					$article->setModificationDate(date('Y-m-d H:i:s'));
									if ($_POST['visible']=='on'){
						$article->setVisible(1);
					} else {
						$article->setVisible(0);
					}
					$article->setCreationDate(date('c'));
					$this->redirect('listArticles',Array('msg'=>urlencode($this->_model->persist($article))));
				}
			} else {
				/* nouveau */
				/* creation d'un article vide */
				$article = New Article();
				$article->setId(-1);
				$this->renderView('header',Array('pageTitle'=>'Nouvel article'));
				$this->renderView('edit', Array('article'=>$article));
			}
		}
	}
	public function delete(){
		if (isset($_GET['id'])){
			/* Formulaire de confirmation */
			$this->renderView('header',Array('pageTitle'=>'Suppression d\'un article'));
			$this->renderView('read',Array('articleToDetail'=>$this->_model->get($_GET['id'])));
			$this->renderView('delete',Array('articleToDelete'=>$this->_model->get($_GET['id'])));		
		} else {
			/* Suppression */
			$article = $this->_model->get($_POST['id']);
			$this->redirect('listArticles', Array('msg'=>$this->_model->remove($article)));
		}
	}
	public function index(){
		$this->page = isset($_GET['page']) ? $_GET['page'] : "home";
		//var_dump($_GET);
		//var_dump($this->page);
		switch ($this->page){
			case 'deleteArticle':
				$this->delete();
				break;
			case 'newArticle':
				$this->edit();
				break;
			case 'editArticle':
				$this->edit();
				break;
			case 'listArticles':
				$this->listArticles();
				break;
			case 'article':
			case 'afficher':
				$this->read();
				break;
			case 'home':
			default :
				$this->home();
		}
		$this->renderView('footer',Array());
	}
}