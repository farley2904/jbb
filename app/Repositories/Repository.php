<?php

namespace Jbb\Repositories;

use Config;

abstract class Repository {

	protected $model = FALSE;

	public function get($select = '*', $pagination = FALSE,$where = false) {

		 $builder = $this->model->select($select); //обьект конструктора запроса

		 if($pagination) {
		 	return $this->check($builder->paginate(Config::get('settings.paginate')));
		 }

		 if($where) {
		 	
			$builder->where($where[0],$where[1]);

		}
		 
		return $this->check($builder->get());
	}

	protected function check($result) {
		
		if($result->isEmpty()) {
			return FALSE;
		}
		
		$result->transform(function($item,$key) {
			
			if(is_string($item->img) && is_object(json_decode($item->img)) && (json_last_error() == JSON_ERROR_NONE)) {
				$item->img = json_decode($item->img);
			}
			
			

			return $item;
			
		});
		
		return $result;
		
	}
	

}


?>