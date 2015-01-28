
		<?php
		echo "<table>\n";
		foreach($listArticles as $article){
			echo $article['visible'] == 1 ? "<tr><td>V</td>" : "<tr><td></td>";
			echo "<td><a href=\"index.php?page=article&id=".$article[0]."\">".$article[1]."</a></td><td><a href=\"index.php?page=editArticle&id=".$article[0]."\">Éditer</a></td><td><a href=\"index.php?page=deleteArticle&id=".$article[0]."\">Supprimer</a></td></tr>\n";
		}
		echo "</table>\n";
