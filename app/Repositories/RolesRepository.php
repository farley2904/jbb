<?php

namespace Jbb\Repositories;

use Jbb\Role;

class RolesRepository extends Repository {

	public function __construct(Role $role){
		$this->model = $role;
	}
	
}


?>