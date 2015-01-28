<?php
// formulaire de validation de la suppression
echo '<form method="POST" action="?page=deleteArticle">
<input type="hidden" value="'.$articleToDelete->getId().'" name="id" />
<input type="hidden" value="valider" name="action" />
<input type="submit" value="supprimer" name="suppress" />
</form><br />
';
