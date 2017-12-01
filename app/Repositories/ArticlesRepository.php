<?php

namespace Jbb\Repositories;

use Jbb\Article;
use Gate;
use Image;
use Config;

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

	public function addArticle($request){
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

		if ($request->hasFile('image')) {
			$image = $request->file('image');
			if ($image->isValid()) {
				$str = str_random(8);
				$obj = new \stdClass; //создаем пустой обьект
				$obj->path = $str.'.jpg';

				$img = Image::make($image);

				$img->fit(Config::get('settings.image')['width'], Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->path); // /images/articles тоже лучьше хранить в настройках

				$data['img'] = $obj->path;

				$this->model->fill($data);

				if ($request->user()->articles()->save($this->model)) {
					return ['status' =>'Материал успешно добавлен'];
				}
			}
		}
	}

	public function updateArticle($request, $article){
		//проверка прав на сохранение
		if(Gate::denies('edit', $this->model)){
			abort(403);
		}
		//исключение полей
		$data = $request->except('_token','image','_method');

		if(empty($data)) {
			return array('error' => 'Нет данных');
		}

		//если поле alias пустое
		if(empty($data['alias'])) {
			$data['alias'] = $this->transliterate($data['title']);
			
		}
		

		$result = $this->one($data['alias'],FALSE);

		if(isset($result->id) && ($result->id != $article->id)) {


			$request->merge(array('alias' => $data['alias']));	

			$request->flash();

			return ['error' => 'Данный псевдоним уже используется'];
		}

		if ($request->hasFile('image')) {
			$image = $request->file('image');

			if ($image->isValid()) {
				$str = str_random(8);
				$obj = new \stdClass; //создаем пустой обьект
				$obj->path = $str.'.jpg';

				$img = Image::make($image);

				$img->fit(Config::get('settings.image')['width'], Config::get('settings.image')['height'])->save(public_path().'/'.env('THEME').'/images/articles/'.$obj->path); // /images/articles тоже лучьше хранить в настройках

				$data['img'] = $obj->path;

			}
		}

		$article->fill($data);

		if ($article->update()) {
			return ['status' =>'Материал успешно обновлен'];
		}

	}

	public function deleteArticle($article)
	{
		if (Gate::denies('destroy', $article)) {
			abort(403);
		}

		// $article->commennts()->delete(); //удаление привязаных коментариев

		if ($article->delete()) {
			return ['status' => 'Материал успешно удален'];
		}
	}
	
}


?>