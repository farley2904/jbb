<?php

namespace Jbb\Repositories;

use Jbb\Permission;

class PermissionsRepository extends Repository {

	public function __construct(Permission $permission){
		$this->model = $permission;
	}
	
}


?>