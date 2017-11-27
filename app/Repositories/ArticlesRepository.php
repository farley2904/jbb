<?php

namespace Jbb\Repositories;

use Jbb\Article;
use Gate;

class ArticlesRepository extends Repository {

	public function __construct(Article $articles){
		$this->model = $articles;
	}

	public function one($alias,$attr = array()) {
		$article = parent::one($alias,$attr);
		
		if($article && !empty($attr)) {
			$article->load('comments');
			$article->comments->load('user');
		}
		
		return $article;
	}

	public function AddArticle($request){
		//проверка прав на сохранение
		if(Gate::denies('save', $this->model)){
			abort(403);
		}
		//исключение полей
		$data = $request->except('_token','image');

		if(empty($data)) {
			return array('error' => 'Нет данных');
		}

		//если поле alias пустое
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
			
		}
		

		if($this->one($data['alias'],FALSE)) {


			$request->merge(array('alias' => $data['alias']));	

			$request->flash();

			return ['error' => 'Данный псевдоним уже используется'];
		}
	}
	
}


?>