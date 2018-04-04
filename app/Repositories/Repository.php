<?php

namespace Jbb\Repositories;

use Config;
use Request;

abstract class Repository {

	protected $model = FALSE;

	public function get($select = '*', $pagination = FALSE,$where = false) {

		$builder = $this->model->select($select); //обьект конструктора запроса

		if($where) {
		 	
		$builder->where($where[0],$where[1]);

		}

		if($pagination){

			$pagination_settings = Config::get('settings.paginate');

			if (Request::is('admin/*')){
				$pagination_settings = Config::get('settings.admin_paginate');
			}

			return $this->check($builder->orderByDesc('created_at')->paginate($pagination_settings));
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

	public function one($alias,$attr = array()) {
		
		$result = $this->model->where('alias',$alias)->first();
		
		return $result;
	}

	public function transliterate($string){

		$str = mb_strtolower($string, 'UTF-8');

		$leter_array = array(
			'a' => 'а',
			'b' => 'б',
			'v' => 'в',
			'g' => 'г,ґ',
			'd' => 'д',
			'e' => 'е,є,э',
			'jo' => 'ё',
			'zh' => 'ж',
			'z' => 'з',
			'i' => 'и,і',
			'ji' => 'ї',
			'j' => 'й',
			'k' => 'к',
			'l' => 'л',
			'm' => 'м',
			'n' => 'н',
			'o' => 'о',
			'p' => 'п',
			'r' => 'р',
			's' => 'с',
			't' => 'т',
			'u' => 'у',
			'f' => 'ф',
			'kh' => 'х',
			'ts' => 'ц',
			'ch' => 'ч',
			'sh' => 'ш',
			'shch' => 'щ',
			'' => 'ъ',
			'y' => 'ы',
			'' => 'ь',
			'yu' => 'ю',
			'ya' => 'я',
		);

		foreach($leter_array as $leter => $kyr) {
			$kyr = explode(',',$kyr);
			
			$str = str_replace($kyr,$leter, $str);
			
		}
		
		//  A-Za-z0-9-
		$str = preg_replace('/(\s|[^A-Za-z0-9\-])+/','_',$str);
		
		$str = trim($str,'-');
		
		return $str;

	}
	

}


?>