<?php
/* définition des classes modèles */
require("model/Article.class.php");
require("model/ArticleRepository.class.php");
require("control/ArticleController.class.php");

require("includes/pdo.php");//recupere un objet PDO : $pdo


$articleController = new ArticleController(new ArticleRepository($pdo));
$articleController->index();