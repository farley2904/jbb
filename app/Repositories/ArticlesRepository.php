<?php

namespace Jbb\Repositories;

use Jbb\Article;

class ArticlesRepository extends Repository {

	public function __construct(Article $articles){
		$this->model = $articles;
	}
	
}


?>