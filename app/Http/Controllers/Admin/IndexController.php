<?php

namespace Jbb\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Jbb\Http\Controllers\Controller;

class IndexController extends AdminController
{
    public function __construct()
    {
    	parent::__construct();
    	$this->template = env('THEME').'.admin.index';
    }
    public function index()
    {
    	$this->title = 'Панель Администратора';
    	return $this->renderOutput();
    }
}
