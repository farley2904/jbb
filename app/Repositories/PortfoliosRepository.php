<?php

namespace Jbb\Repositories;

use Jbb\Portfolio;

class PortfoliosRepository extends Repository {

	public function __construct(Portfolio $portfolios){
		$this->model = $portfolios;
	}
	
}


?>