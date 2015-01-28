<?php
		$index=0;
		if (empty($listArticles)){
			$listArticles = Array();
		}
		foreach($listArticles as $article){
			if ($article['visible'] == 1){
				echo "<h3>".$article['title']."</h3>\n<p>".nl2br($article['content'])."</p>\n";
				$index+=1;
			}
			if ($index>4) {
				break;
			}
		}
