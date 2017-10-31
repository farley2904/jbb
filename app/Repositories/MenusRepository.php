<?php

namespace Jbb\Repositories;

use Jbb\Menu;

class MenusRepository extends Repository {

	public function __construct(Menu $menu){
		$this->model = $menu;
	}
	
}


?>