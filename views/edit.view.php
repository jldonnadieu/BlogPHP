<?php
/* parametre : un article $article */

echo '<form method="POST" action="?page=editArticle">
<input type="hidden" value="'.$article->getId().'" name="id" />
<input type="hidden" value="valider" name="action" />
Titre<br /><input type="text" value="'.$article->getTitle().'" name="title" /><br />';
if ($article->getId() >=0){
	echo 'Visibilité : <input type="checkbox" ';
	echo $article->getVisible()==1 ? 'checked="checked"' : '';
	echo ' name="visible" /><br />';
} else {
	echo '<input type="hidden" value="off" name="visible" /><br />';
}
echo 'Contenu<br />
<textarea name="comment">'.$article->getContent().'</textarea>
<input type="submit" value="enregistrer" name="save" />
</form>
';
