<?php
// On récupère un objet de type article dans $articleToDetail
if (isset($articleToDetail)){
	echo "<h3>Id</h3><p>".$articleToDetail->getId()."</p>\n";
	echo "<h3>Titre</h3><p>".$articleToDetail->getTitle()."</p>\n";
	echo "<h3>Contenu</h3><p>".nl2br($articleToDetail->getContent())."</p>\n";
}
